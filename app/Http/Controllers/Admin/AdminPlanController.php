<?php

namespace App\Http\Controllers\Admin;

use App\deposit;
use App\Http\Controllers\Controller;
use App\plan;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminPlanController extends Controller
{
    public function plan()
    {
        $plans = plan::all();
        return view('admin.plan.plan',compact('plans'));
    }

    public function plan_save(Request $request)
    {
        $plan = new plan();
        $plan->plan_name = $request->plan_name;
        $plan->min_am = $request->min_am;
        $plan->max_am = $request->max_am;
        $plan->rep_per = $request->rep_per;
        $plan->status = $request->status;
        $plan->save();

        return back()->with('success','Plan Created');
    }

    public function plan_update(Request $request)
    {
        $plan_update = plan::where('id',$request->plan_id)->first();
        $plan_update->plan_name = $request->plan_name;
        $plan_update->min_am = $request->min_am;
        $plan_update->max_am = $request->max_am;
        $plan_update->rep_per = $request->rep_per;
        $plan_update->status = $request->status;
        $plan_update->save();

        return back()->with('success','Plan Updated');
    }

    public function plan_delete(Request $request)
    {
        $plan_delete = plan::where('id',$request->plan_delete_id)->first();
        $plan_delete->delete();
        return back()->with('success','Plan Deleted');
    }

    public function deposit_histiory()
    {
        return view('admin.payment.Deposit');
    }

    public function deposit_histiory_get()
    {
        $all_dep = deposit::with('user')->get();
        return DataTables::of($all_dep)
            ->addColumn('action', function ($all_dep) {

            })
            ->make(true);
    }


}
