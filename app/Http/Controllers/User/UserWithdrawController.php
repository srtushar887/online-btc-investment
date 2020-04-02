<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\user_capital_withdraw;
use App\user_plan_commission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserWithdrawController extends Controller
{
    public function withdraw_percentage()
    {
        $with = user_plan_commission::orderBy('id','desc')->where('user_id',Auth::user()->id)->paginate(20);
        return view('user.withdraw.withdtaw',compact('with'));
    }

    public function withdraw_percentage_save(Request $request)
    {
        $per_with_save = user_plan_commission::where('id',$request->wid)->first();
        $per_with_save->status = 3;
        $per_with_save->save();

        return back()->with('success','Withdraw Successfull');
    }

    public function withdraw_capital(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();


        $new_cap_with = new user_capital_withdraw();
        $new_cap_with->user_id = Auth::user()->id;
        $new_cap_with->amount = $user->capital;
        $new_cap_with->status = 0;
        $new_cap_with->save();

        return back()->with('success','Capital Withdraw Send Success');
    }
}
