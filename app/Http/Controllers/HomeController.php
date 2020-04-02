<?php

namespace App\Http\Controllers;

use App\plan;
use App\User;
use App\user_plan;
use App\user_plan_commission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = \Carbon\Carbon::now('Asia/Dhaka');

            $user_plan_com = user_plan_commission::where('user_id',Auth::user()->id)->where('status',0)->get();
            foreach ($user_plan_com as $uplcm){
                $single_com = user_plan_commission::where('id',$uplcm->id)->first();

                if ( $date > $single_com->wek_date ){

                    $single_com->status = 1;
                    $single_com->save();


                    $plan = plan::where('id',$uplcm->main_plan)->first();
                    $am = ($uplcm->main_am * $plan->rep_per) / 100;


                    $new_com = new user_plan_commission();
                    $new_com->user_id = Auth::user()->id;
                    $new_com->amount = $am;
                    $new_com->main_am = $uplcm->main_am;
                    $new_com->percen = $uplcm->percen;
                    $new_com->main_plan = $uplcm->main_plan;
                    $new_com->wek_date = Carbon::now('Asia/Dhaka')->addDays(7);
                    $new_com->status = 0;
                    $new_com->save();
                }
            }

        $plan = user_plan::where('id',Auth::user()->id)->count();
         $ref_user = User::where('have_ref',Auth::user()->my_ref)->count();
        return view('user.index',compact('plan','ref_user'));
    }
}
