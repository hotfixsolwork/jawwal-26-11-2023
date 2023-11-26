<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\BusinessSetting;
use Auth;
use Hash;
use App\Notifications\EmailVerificationNotification;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware('user', ['only' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = Auth::user()->shop;
        return view('seller.shop', compact('shop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//         if (Auth::check()) {
// 			if((Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'customer')) {
// 				flash(translate('Admin or Customer can not be a seller'))->error();
// 				return back();
// 			} if(Auth::user()->user_type == 'seller'){
// 				flash(translate('This user already a seller'))->error();
// 				return back();
// 			}
            
//         } else {
//             return view('frontend.seller_form');
//         }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name'      => 'required|string|max:255',
        //     'email'     => 'required|email|unique:users|max:255',
        //     'password'  => 'required|string|min:6|confirmed',
        //     'company_name'  => 'required|max:255',
        //     'company_name_ar'  => 'required|max:255',
        //     'phone'  => 'required|max:255',
        //     'bank_account'  => 'required|max:255',
        //     'tax_registration'  => 'required|max:255',
        //     'business_details'  => 'required|max:255',
        //     'business_certificate' => 'required',
        //     'tax_certificate' => 'required'
        // ]);
        
        // $user = null;
        // if (!Auth::check()) {
        //     if (User::where('email', $request->email)->first() != null) {
        //         flash(translate('Email already exists!'))->error();
        //         return back();
        //     }
        //     if ($request->password == $request->password_confirmation) {
        //         $user = new User;
        //         $user->name = $request->name;
        //         $user->phone = $request->phone;
        //         $user->email = $request->email;
        //         $user->user_type = "seller";
        //         $user->password = Hash::make($request->password);
        //         $user->save();
        //     } else {
        //         flash(translate('Sorry! Password did not match.'))->error();
        //         return back();
        //     }
        // } else {
        //     $user = Auth::user();
        //     if ($user->customer != null) {
        //         $user->customer->delete();
        //     }
        //     $user->user_type = "seller";
        //     $user->save();
        // }

        // if (Shop::where('user_id', $user->id)->first() == null) {
        //     $shop = new Shop;
        //     $shop->user_id = $user->id;
        //     $shop->auto_supplier_acc_num = 'S0000'. $user->id;
        //     $shop->name = $request->company_name;
        //     $shop->name_ar = $request->company_name_ar;
        //     $shop->slug = preg_replace('/\s+/', '-', str_replace("/"," ", $request->company_name));
        //     $shop->bank_acc_no = $request->bank_account;
        //     $shop->tax_reg_no = $request->tax_registration;
        //     $shop->business_details = $request->tax_reg_no;
            
        //     $business_certificate = null;
        //     $tax_certificate = null;
            
        //     // save "business_certificate" file
        //     if($request->hasFile("business_certificate")){
        //         if($request->file('business_certificate')->isValid()){
        //           $business_certificate = time().'-'.rand(11111,99999).'.'.$request->file('business_certificate')->getClientOriginalExtension();    
        //           $request->file('business_certificate')->move(public_path('uploads/business_certificates'), $business_certificate);
        //         }
        //     }
        //     // save "tax_certificate" file
        //     if($request->hasFile("tax_certificate")){
        //          if($request->file('tax_certificate')->isValid()){
        //           $tax_certificate = time().'-'.rand(11111,99999).'.'.$request->file('tax_certificate')->getClientOriginalExtension();    
        //           $request->file('tax_certificate')->move(public_path('uploads/tax_certificate'), $tax_certificate);
        //         }
        //     }
            
        //     $shop->business_reg_cert_file = $business_certificate;
        //     $shop->tax_reg_cert_file =  $tax_certificate;
            
        //     if ($shop->save()) {
        //         auth()->login($user, false);
        //         // if (BusinessSetting::where('type', 'email_verification')->first()->value != 1) {
        //             $user->email_verified_at = date('Y-m-d H:m:s');
        //             $user->save();
        //         // } else {
        //             // $user->notify(new EmailVerificationNotification());
        //         // }

        //         // sendSMSOTP($user->phone); 
        //         sendEmailOTP($user->email); 
                
        //         // flash(translate('Your Shop has been created successfully!'))->success();
        //         // return redirect()->route('seller.shop.index');
        //         return redirect()->route('seller.mobile-otp.form');
        //     } else {
        //         $user->user_type == 'customer';
        //         $user->save();
        //     }
        // }

        // flash(translate('Sorry! Something went wrong.'))->error();
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
