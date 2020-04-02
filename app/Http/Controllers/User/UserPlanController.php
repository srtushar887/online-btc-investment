<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\plan;
use App\User;
use App\user_plan;
use App\user_plan_commission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPlanController extends Controller
{
    public function all_plan()
    {
        $plans = plan::where('status',1)->get();
        return view('user.plan.plan',compact('plans'));
    }

    public function choose_plan_save(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();
        if ($user->balance <= 0 ){
            return back()->with('alert','Invalid Amount 1');
        }elseif ($user->balance <= $request->am){
            return back()->with('alert','Invalid Amount 2');
        }elseif ($request->am < $request->plan_minam){
            return back()->with('alert','Invalid Amount 3');
        }elseif ($request->am > $request->plan_manam){
            return back()->with('alert','Invalid Amount 4');
        }
        else{

            $plan = new user_plan();
            $plan->user_id = Auth::user()->id;
            $plan->plan_id = $request->planid;
            $plan->amount = $request->am ;
            $plan->status = 0;
            $plan->save();



            $planid = plan::where('id',$request->planid)->first();

            $am = ($request->am * $planid->rep_per) / 100;

            $new_com = new user_plan_commission();
            $new_com->user_id = Auth::user()->id;
            $new_com->plan_id = $plan->id;
            $new_com->amount = $am;
            $new_com->main_am = $request->am;
            $new_com->percen = $planid->rep_per;
            $new_com->main_plan = $request->planid;
            $new_com->wek_date = Carbon::now('Asia/Dhaka')->addMinutes(7);
            $new_com->status = 0;
            $new_com->save();

            $user_bal = User::where('id',Auth::user()->id)->first();
            $user_bal->balance = $user->balance - $request->am;
            $user_bal->save();

            return back()->with('success','Plan Choose Successfull');
        }
    }

    public function my_plan()
    {
        $plans = user_plan::where('user_id',Auth::user()->id)->with('plan')->paginate(20);
        return view('user.plan.myPlan',compact('plans'));
    }
}
