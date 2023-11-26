<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use Auth;
use Session;

class WalletController extends Controller
{
    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_all_offline_wallet_recharges'])->only('offline_recharge_request');
    }

    public function index()
    {
        $wallets = Wallet::where('user_id', Auth::user()->id)->latest()->paginate(10);
        return view('frontend.user.wallet.index', compact('wallets'));
    }

    public function recharge(Request $request)
    {
        // $data['amount'] = $request->amount;
        // $data['payment_method'] = $request->payment_option;

        // $request->session()->put('payment_type', 'wallet_payment');
        // $request->session()->put('payment_data', $data);

        // $request->session()->put('payment_type', 'wallet_payment');
        // $request->session()->put('payment_data', $data);

        // $decorator = __NAMESPACE__ . '\\Payment\\' . str_replace(' ', '', ucwords(str_replace('_', ' ', $request->payment_option))) . "Controller";
        // if (class_exists($decorator)) {
        //     return (new $decorator)->pay($request);
        // }

        $request->validate([
            'amount' => 'required',
            'bank_name' => 'required',
            'deposit_slip' => 'required|file'
        ]);

        $deposit_slip = null;

         // save "deposit_slip" file
         if($request->hasFile("deposit_slip")){
            if($request->file('deposit_slip')->isValid()){
               $deposit_slip = time().'-'.rand(11111,99999).'.'.$request->file('deposit_slip')->getClientOriginalExtension();    
               $request->file('deposit_slip')->move(public_path('uploads/deposit_slip'), $deposit_slip);
            }
        }

        $wallet = new Wallet;
        $wallet->user_id = Auth::user()->id;
        $wallet->amount = $request->amount;
        $wallet->bank_name = $request->bank_name;
        $wallet->status = 0;
        $wallet->deposit_slip = $deposit_slip;
        // $wallet->payment_details = $request->trx_id;
        // $wallet->payment_method = $request->payment_option;
        // $wallet->offline_payment = 1;
        // $wallet->reciept = $request->photo;
        $wallet->save();
        flash(translate('Recharge has been done. Please wait for response.'))->success();
        return redirect()->route('wallet.index');
    }

    public function wallet_payment_done($payment_data, $payment_details)
    {
        $user = Auth::user();
        $user->balance = $user->balance + $payment_data['amount'];
        $user->save();

        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->amount = $payment_data['amount'];
        $wallet->payment_method = $payment_data['payment_method'];
        $wallet->payment_details = $payment_details;
        $wallet->save();

        Session::forget('payment_data');
        Session::forget('payment_type');

        flash(translate('Recharge completed'))->success();
        return redirect()->route('wallet.index');
    }

    public function offline_recharge(Request $request)
    {
        $wallet = new Wallet;
        $wallet->user_id = Auth::user()->id;
        $wallet->amount = $request->amount;
        $wallet->payment_method = $request->payment_option;
        $wallet->payment_details = $request->trx_id;
        $wallet->approval = 0;
        $wallet->offline_payment = 1;
        $wallet->reciept = $request->photo;
        $wallet->save();
        flash(translate('Offline Recharge has been done. Please wait for response.'))->success();
        return redirect()->route('wallet.index');
    }

    public function offline_recharge_request()
    {
        $wallets = Wallet::where('offline_payment', 1)->paginate(10);
        return view('manual_payment_methods.wallet_request', compact('wallets'));
    }

    public function updateApproved(Request $request)
    {
        $wallet = Wallet::findOrFail($request->id);
        $wallet->approval = $request->status;
        if ($request->status == 1) {
            $user = $wallet->user;
            $user->balance = $user->balance + $wallet->amount;
            $user->save();
        } else {
            $user = $wallet->user;
            $user->balance = $user->balance - $wallet->amount;
            $user->save();
        }
        if ($wallet->save()) {
            return 1;
        }
        return 0;
    }
}
