<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use Auth;
use Hash;
use Session;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function registration()
    {
        return view('supplier.registration');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users|max:255',
            'mobile' => 'required',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $code = $request->input('code');
        $mobile = $request->input('mobile');
        $password = $request->input('password');

        $user = new user();
        $user->name = $name;
        $user->email = $email;
        $user->phone = $code . '' . $mobile;
        $user->user_type = 'seller';
        $user->password = Hash::make($password);
        $user->form_step = 1;
        $user->save();
        session()->put('NEW-USER-ID', $user->id);

        // sendSMSOTP($mobile); 
        sendEmailOTP($email);

        return redirect()->route('supplier.otp-verification');
    }

    public function otpVerificationForm()
    {
        $user_id = session()->get('NEW-USER-ID');
        $newUser = User::findOrFail($user_id);

        if ($newUser->form_step != 1) {
            abort(401);
        }
        return view('supplier.otp-verification', compact('newUser'));
    }

    public function verifyOTP(Request $request)
    {
        $user_id = session()->get('NEW-USER-ID');
        $newUser = User::findOrFail($user_id);

        if ($request->input('otp.0') == '' || $request->input('otp.1') == '' || $request->input('otp.2') == '' || $request->input('otp.3') == '') {
            throw ValidationException::withMessages([
                "otp" => ["OTP is required"],
            ]);
        }
        $locale = 'en';
        if (Session::has('locale')) {
            $locale = Session::get('locale');
        }
        $otp = implode('', $request->input('otp'));
        if ($locale == 'sa') {
            $otp = implode('', array_reverse($request->input('otp')));
        }
        if ($otp == session('sms_verification_opt')) {
            if ($newUser->user_type == 'seller') {
                $newUser->phone_verified = 1;
                $newUser->form_step = 2;
                $newUser->save();
                return redirect()->route('supplier.required-documents');
            }
        } else {
            throw ValidationException::withMessages([
                "otp" => ["OTP is not valid"],
            ]);
        }
    }

    public function resendOTP()
    {
        $user_id = session()->get('NEW-USER-ID');
        $newUser = User::findOrFail($user_id);

        // sendSMSOTP($newUser->phone);
        sendEmailOTP($newUser->email);
        flash(translate('OTP resend successfully!'))->success();
        return back();
    }


    public function requiredDocuments()
    {
        $user_id = session()->get('NEW-USER-ID');
        $newUser = User::findOrFail($user_id);

        if ($newUser->form_step != 2) {
            abort(401);
        }

        return view('supplier.required-documents');
    }


    public function businessInformation()
    {
        $user_id = session()->get('NEW-USER-ID');
        $newUser = User::findOrFail($user_id);
        if ($newUser->form_step != 2) {
            abort(401);
        }

        $countries = Country::select('id', 'name')->where('status', 1)->get();
        $headquarterCities = City::select('id', 'name')->whereIn('state_id', [3155, 3163])->get();
        $branchCities = City::select('id', 'name')->whereIn('state_id', [3155, 3163])->get();
        return view('supplier.business-information', compact('countries', 'headquarterCities', 'branchCities'));
    }

    public function submitBusinessInformation(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'company_name_ar' => 'required',
            'company_type' => 'required',
            'country' => 'required',
            'headquarter_city' => 'required',
            'branch_cities' => 'required'
        ]);

        $user_id = session()->get('NEW-USER-ID');
        $newUser = User::findOrFail($user_id);

        if (Shop::where('user_id', $newUser->id)->first() == null) {
            $shop = new Shop;
            $shop->user_id = $newUser->id;
            $shop->auto_supplier_acc_num = 'S0000' . $newUser->id;
            $shop->name = $request->company_name;
            $shop->name_ar = $request->company_name_ar;
            $shop->company_type = $request->company_type;
            $shop->country = $request->country;
            $shop->headquarter_city = $request->headquarter_city;
            $shop->branch_cities = implode(',', $request->branch_cities);
            $shop->slug = preg_replace('/\s+/', '-', str_replace("/", " ", $request->company_name));
            $shop->save();

            // step 3 complete
            $newUser->form_step = 3;
            $newUser->save();
        }

        return redirect()->route('supplier.legal-information.form');
    }


    public function legalInformation()
    {
        $user_id = session()->get('NEW-USER-ID');
        $newUser = User::findOrFail($user_id);
        if ($newUser->form_step != 3) {
            abort(401);
        }

        return view('supplier.legal-information');
    }

    public function submitlegalInformation(Request $request)
    {
        $request->validate([
            'licence_number' => 'required',
            'licence_issue_date' => 'required',
            'licence_expiry_date' => 'required',
            'licence_scan_img' => 'required',
            'registration_number' => 'required',
            'vat_proof' => 'required'
        ]);

        $user_id = session()->get('NEW-USER-ID');
        $newUser = User::findOrFail($user_id);
        $shop = $newUser->shop()->firstOrFail();

        $licence_scan_img = null;
        $vat_proof = null;


        // verify registration number using an api

        // $reg_number = 1010873595;
        $reg_number = $request->input('registration_number');
        $headers = [
            'Accept: application/json',
            'apiKey: g3hVAT2YFYgiFiuJGhUZCYB73vkmpgbA'
        ];

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, "https://api.wathq.sa/v5/commercialregistration/status/" . $reg_number);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($handle);
        curl_close($handle);

        $data = json_decode($response, true);
        if (is_array($data)) {
            if (array_key_exists('code', $data) || array_key_exists('message', $data)) {
                throw ValidationException::withMessages([
                    "registration_number" => ["Invalid Tax Registration Number"],
                ]);
            }
        } else {
            throw ValidationException::withMessages([
                "registration_number" => ["Invalid Tax Registration Number"],
            ]);
        }

        // save "licence_scan_img" file
        if ($request->hasFile("licence_scan_img")) {
            if ($request->file('licence_scan_img')->isValid()) {
                $licence_scan_img = time() . '-' . rand(11111, 99999) . '.' . $request->file('licence_scan_img')->getClientOriginalExtension();
                $request->file('licence_scan_img')->move(public_path('uploads/licence_scans'), $licence_scan_img);
            }
        }
        // save "vat_proof" file
        if ($request->hasFile("vat_proof")) {
            if ($request->file('vat_proof')->isValid()) {
                $vat_proof = time() . '-' . rand(11111, 99999) . '.' . $request->file('vat_proof')->getClientOriginalExtension();
                $request->file('vat_proof')->move(public_path('uploads/vat_proofs'), $vat_proof);
            }
        }

        $shop->licence_number = $request->input('licence_number');
        $shop->licence_issue_date = $request->input('licence_issue_date');
        $shop->licence_expiry_date = $request->input('licence_expiry_date');
        $shop->registration_number = $reg_number;
        $shop->licence_scan_img = $licence_scan_img;
        $shop->vat_proof =  $vat_proof;
        $shop->save();

        $newUser->form_step = 4;
        $newUser->email_verified_at = date('Y-m-d H:m:s');
        $newUser->save();

        return redirect()->route('supplier.bank-information.form');
    }


    public function bankInformtion()
    {
        $user_id = session()->get('NEW-USER-ID');
        $newUser = User::findOrFail($user_id);
        if ($newUser->form_step != 4) {
            abort(401);
        }
        return view('supplier.bank_information');
    }


    public function submitBankInformtion(Request $request)
    {
        $request->validate([
            'bank_name' => 'required',
            'bank_acc_name' => 'required',
            'bank_acc_number' => 'required',
            'bank_certificate_pdf' => 'required|file|mimes:pdf'
        ]);

        $bank_certificate_pdf = null;

        // save "bank_certificate_pdf" file
        if ($request->hasFile("bank_certificate_pdf")) {
            if ($request->file('bank_certificate_pdf')->isValid()) {
                $bank_certificate_pdf = time() . '-' . rand(11111, 99999) . '.' . $request->file('bank_certificate_pdf')->getClientOriginalExtension();
                $request->file('bank_certificate_pdf')->move(public_path('uploads/bank_certificate_pdf'), $bank_certificate_pdf);
            }
        }

        $user_id = session()->get('NEW-USER-ID');
        $newUser = User::findOrFail($user_id);
        $shop = $newUser->shop()->firstOrFail();
        $shop->bank_name = $request->input('bank_name');
        $shop->bank_acc_name = $request->input('bank_acc_name');
        $shop->bank_acc_no = $request->input('bank_acc_number');
        $shop->bank_certificate_pdf =  $bank_certificate_pdf;
        $shop->save();

        $newUser->form_step = 5;
        $newUser->save();

        flash(translate('Your Shop has been created successfully!'))->success();
        return redirect()->signedRoute('registration.status', ['user_id' => $newUser->id]);
    }


    public function registrationStatus($user_id)
    {
        $user = User::findOrFail($user_id);
        if ($user->form_step != 5) {
            abort(401);
        }
        return view('supplier.supplier_reg_status', compact('user'));
    }
}
