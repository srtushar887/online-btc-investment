<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\deposit;
use App\gateway;
use App\general_setting;
use App\Http\Controllers\Controller;
use App\User;
use App\user_plan_commission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::count();
        $chart_options = [
            'chart_title' => 'Users',
            'report_type' => 'group_by_date',
            'model' => 'App\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
            'filter_field' => 'created_at',
            'filter_days' => 30, // show only last 30 days
        ];
        $chart1 = new LaravelChart($chart_options);
        $chart_options2 = [
            'chart_title' => 'Deposit',
            'report_type' => 'group_by_date',
            'model' => 'App\deposit',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
            'filter_field' => 'created_at',
            'filter_days' => 30, // show only last 30 days
        ];
        $chart2 = new LaravelChart($chart_options2);
        $dep = deposit::where('status','!=',0)->sum('amount');
        $comwith = user_plan_commission::where('status',4)->sum('amount');
        return view('admin.index',compact('user','chart1','chart2','dep','comwith'));
    }

    public function payment_gateway()
    {
        $gatewway = gateway::first();
        return view('admin.gateway.gateway',compact('gatewway'));
    }

    public function payment_gateway_save(Request $request)
    {
        $gateway_save = gateway::first();
        $gateway_save->main_name = $request->main_name;
        $gateway_save->rate = $request->rate;
        $gateway_save->name = $request->name;
        $gateway_save->minamo = $request->minamo;
        $gateway_save->maxamo = $request->maxamo;
        $gateway_save->fixed_charge = $request->fixed_charge;
        $gateway_save->percent_charge = $request->percent_charge;
        $gateway_save->val1 = $request->val1;
        $gateway_save->val2 = $request->val2;
        $gateway_save->save();

        return back()->with('success','Gateway Updated');
    }

    public function general_settings()
    {
        $gen_data = general_setting::first();
        return view('admin.page.general',compact('gen_data'));
    }

    public function general_settings_save(Request $request)
    {
        $gen = general_setting::first();
        if($request->hasFile('site_logo')){
            @unlink($gen->site_logo);
            $image = $request->file('site_logo');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('site_logo');
            $directory = 'assets/dashboard/images/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->site_logo = $imgUrl;
        }

        if($request->hasFile('site_icon')){
            @unlink($gen->site_icon);
            $image = $request->file('site_icon');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('site_icon');
            $directory = 'assets/dashboard/images/';
            $imgUrl2  = $directory.$imageName;
            Image::make($image)->save($imgUrl2);
            $gen->site_icon = $imgUrl2;
        }


        $gen->site_name = $request->site_name;
        $gen->site_email = $request->site_email;
        $gen->site_address = $request->site_address;
        $gen->site_phone = $request->site_phone;
        $gen->save();

        return back()->with('success','General Settings Updated');
    }


    public function profile()
    {
        $user = Admin::first();
        return view('admin.page.profile',compact('user'));
    }

    public function profile_save(Request $request)
    {
        $user_pro = Admin::first();
        if($request->hasFile('image')){
            @unlink($user_pro->image);
            $image = $request->file('image');
            $imageName = $user_pro->id.time().'.'.$image->getClientOriginalName('image');
            $directory = 'assets/dashboard/images/user/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $user_pro->image = $imgUrl;
        }
        $user_pro->name = $request->name;
        $user_pro->email = $request->email;
        $user_pro->phone = $request->phone;
        $user_pro->save();

        return back()->with('success','Profile Updated');

    }

    public function chnag_password()
    {
        return view('admin.page.changePass');
    }

    public function change_pass_save(Request $request)
    {
        $npass = $request->n_pass;
        $cpass = $request->c_pass;
        if ($npass != $cpass)
        {
            return back()->with('alert','Password Not Match');
        }else{
            $user = Admin::first();
            $user->password = Hash::make($npass);
            $user->save();
            return back()->with('alert','Password Changed');
        }
    }
}
