<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\user_capital_withdraw;
use App\user_plan_commission;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminWithdrawController extends Controller
{
    public function percentage_withdraw()
    {
        return view('admin.withdraw.percenategeWithdraw');
    }

    public function percentage_withdraw_get()
    {
        $per_with = user_plan_commission::where('status',3)->with('user')->get();
        return DataTables::of($per_with)
            ->addColumn('action', function ($per_with) {
                return ' <button id="' . $per_with->id . '" onclick="viewuserperwith(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#userperwithvidew"><i class="fas fa-eye"></i> </button>';
            })
            ->make(true);
    }

    public function percentage_withdraw_single(Request $request)
    {
        $single_per_with = user_plan_commission::where('id',$request->id)->with('user')->first();
        return response($single_per_with);
    }

    public function percentage_withdraw_save(Request $request)
    {
        $status = $request->status;
        if ($status == 1){
            $user_with_save = user_plan_commission::where('id',$request->com_id)->first();
            $user_with_save->status = 4;
            $user_with_save->save();

            return back()->with('success','Withdraw Approved');
        }else{
            $user_with_save = user_plan_commission::where('id',$request->com_id)->first();
            $user_with_save->status = 5;
            $user_with_save->save();

            return back()->with('success','Withdraw Rejected');
        }


    }

    public function percentage_withdraw_complete()
    {
        return view('admin.withdraw.percenategeWithdrawComplete');
    }

    public function percentage_withdraw_complete_get()
    {
        $com_with = user_plan_commission::where('status',4)->with('user')->get();
        return DataTables::of($com_with)
            ->addColumn('action', function ($com_with) {
                return ' <button id="' . $com_with->id . '" onclick="viewuserperwithcom(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#userperwithvidewcom"><i class="fas fa-eye"></i> </button>';
            })
            ->make(true);
    }

    public function percentage_withdraw_rejected()
    {
        return view('admin.withdraw.percenategeWithdrawRejected');
    }

    public function percentage_withdraw_rejected_get()
    {
        $com_with = user_plan_commission::where('status',5)->with('user')->get();
        return DataTables::of($com_with)
            ->addColumn('action', function ($com_with) {
                return ' <button id="' . $com_with->id . '" onclick="viewuserperwithreg(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#userperwithvidewreh"><i class="fas fa-eye"></i> </button>';
            })
            ->make(true);
    }

    public function capital_withdraw()
    {
        return view('admin.withdraw.capitalWithdraw');
    }

    public function capital_withdraw_get()
    {
        $com_with = user_capital_withdraw::where('status',0)->with('user')->get();
        return DataTables::of($com_with)
            ->addColumn('action', function ($com_with) {
                return ' <button id="' . $com_with->id . '" onclick="viewusercapwith(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#usercapwithvidewreh"><i class="fas fa-eye"></i> </button>';
            })
            ->make(true);
    }

    public function capital_withdraw_single(Request $request)
    {
        $single_cap_with = user_capital_withdraw::where('id',$request->id)->with('user')->first();
        return response($single_cap_with);
    }

    public function capital_withdraw_save(Request $request)
    {
        $status = $request->status;
        if ($status == 1)
        {
            $cap_with = user_capital_withdraw::where('id',$request->com_id)->first();
            $cap_with->status = 1;
            $cap_with->save();

            $user = User::where('id',$cap_with->user_id)->first();
            $user->balance = 0;
            $user->capital = 0;
            $user->save();

            return back()->with('success','User Capital Withdraw Success');

        }else{
            $cap_with = user_capital_withdraw::where('id',$request->com_id)->first();
            $cap_with->status = 2;
            $cap_with->save();


            return back()->with('success','User Capital Withdraw Rejected');
        }
    }

    public function capital_withdraw_complete()
    {
        return view('admin.withdraw.capitalWithdrawComplete');
    }

    public function capital_withdraw_complete_get()
    {
        $com_with = user_capital_withdraw::where('status',1)->with('user')->get();
        return DataTables::of($com_with)
            ->addColumn('action', function ($com_with) {
                return ' <button id="' . $com_with->id . '" onclick="viewusercapwith(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#usercapwithvidewreh"><i class="fas fa-eye"></i> </button>';
            })
            ->make(true);
    }

    public function capital_withdraw_rejected()
    {
        return view('admin.withdraw.capitalWithdrawRejected');
    }

    public function capital_withdraw_rejected_get()
    {
        $com_with = user_capital_withdraw::where('status',2)->with('user')->get();
        return DataTables::of($com_with)
            ->addColumn('action', function ($com_with) {
                return ' <button id="' . $com_with->id . '" onclick="viewusercapwith(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#usercapwithvidewreh"><i class="fas fa-eye"></i> </button>';
            })
            ->make(true);
    }
}
