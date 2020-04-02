<?php

namespace App\Http\Controllers\User;

use App\deposit;
use App\gateway;
use App\Http\Controllers\Controller;
use App\Lib\BlockIo;
use App\Lib\CoinPaymentHosted;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserDepositController extends Controller
{
    public function user_Deposit()
    {
        return view('user.deposit.deposit');
    }

    public function user_Deposit_save(Request $request)
    {
        if ($request->amount <= 0){
            return back()->with('alert','Enter Valid Amount');
        }else{
            $gate = gateway::where('id',1)->first();
            $charge = $gate->fixed_charge + ($request->amount*$gate->percent_charge/100);
            $usdamo = ($request->amount + $charge)/$gate->rate;

            $deposit = new deposit();
            $deposit->user_id = Auth::user()->id;
            $deposit->gateway_id = 1;
            $deposit->custom = Str::random(20);
            $deposit->amount = $request->amount;
            $deposit->usd_amo = $usdamo;
            $deposit->btc_amo = "";
            $deposit->btc_wallet = "";
            $deposit->net_amount = $usdamo;
            $deposit->charge = round($charge,2);;
            $deposit->trx = Str::random(12);
            $deposit->status = 0;
            $deposit->try = 0;
            $deposit->vsent = 0;
            $deposit->save();
            Session::put('Track',$deposit->trx);

            return redirect(route('btc.send'));
        }
    }

    public function send_btc()
    {
        $track_id = Session::get('Track');
       $deposit = deposit::where('trx',$track_id)->orderBy('id','desc')->first();

       $gateway = gateway::where('id',1)->first();

       if ($deposit->btc_amo == "" && $deposit->btc_wallet == ""){
           $cps = new CoinPaymentHosted();
           $cps->Setup($gateway->val2,$gateway->val1);

           $callbackUrl = route('ipn.coinPay.btc');

           $req = array(
               'amount' => $deposit->amount,
               'currency1' => 'USD',
               'currency2' => 'BTC',
               'custom' => $deposit->custom,
               'ipn_url' => $callbackUrl,
           );

           $result = $cps->CreateTransaction($req);
           if ($result['error'] == 'ok') {

               $bcoin = sprintf('%.08f', $result['result']['amount']);
               $sendadd = $result['result']['address'];

               $deposit->btc_amo = $bcoin;
               $deposit->btc_wallet = $sendadd;
               $deposit->save();
           }
           else
           {
               return back()->with('alert', 'Failed to Process');
           }

           $data = deposit::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->first();
           $wallet = $data['btc_wallet'];
           $bcoin = $data['btc_amo'];
           $qrurl =  "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=bitcoin:$wallet&choe=UTF-8\" title='' style='width:300px;' />";
           return view('user.payment.coinpaybtc', compact('bcoin','wallet','qrurl','track_id','deposit'));
       }


    }

    public function ipnCoinPayBtc(Request $request)
    {

        $track = $request->custom;
        $status = $request->status;
        $amount2 = floatval($request->amount2);
        $currency2 = $request->currency2;

        $data = gateway::where('custom',$track)->orderBy('id', 'DESC')->first();
        $bcoin = $data->btc_amo;
        if ($status == 0 )
        {
            if ($currency2 == "BTC" && $data->status == '0' && $data->btc_amo<=$amount2)
            {
                $data->status = 1;
                $data->save();

                $user = User::where('id',$data->user_id)->first();
                $user->capital = $user->capital + $data->amount;
                $user->balance = $user->balance + $data->amount;
                $user->save();

                return redirect('home')->with('success','Deposit Success');
            }
        }
    }
}
