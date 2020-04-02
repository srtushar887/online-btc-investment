<?php

namespace App\Http\Controllers\Frontend;

use App\all_static;
use App\contact;
use App\general_setting;
use App\how_it_work_data;
use App\Http\Controllers\Controller;
use App\our_feature_data;
use App\plan;
use App\testimonials;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
{
    public function index()
    {
        $all_static = all_static::first();
        $how_data = how_it_work_data::all();
        $f_data = our_feature_data::all();
        $plans = plan::where('status',1)->get();
        $test = testimonials::all();
        return view('frontend.index',compact('all_static','how_data','f_data','plans','test'));
    }

    public function about_us()

    {
        $about = all_static::first();
        return view('frontend.aboutUs',compact('about'));
    }

    public function plans()
    {
        $plans = plan::where('status',1)->get();
        return view('frontend.plans',compact('plans'));
    }

    public function faq()
    {
        return view('frontend.faq');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contact_save(Request $request)
    {
        $con = new contact();
        $con->name = $request->name;
        $con->email = $request->email;
        $con->subject = $request->subject;
        $con->message = $request->message;
        $con->status = 0;
        $con->save();

        return back()->with('success','Message Send');
    }

    public function reset_pass()
    {
        return view('frontend.resetPass');
    }

    public function reset_pass_send(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if ($user)
        {
            $code = $user->id.Str::random(6).uniqid();

            $user->email_code = $code;
            $user->save();

            $gen = general_setting::first();
            $site = $gen->site_name;
            $to = $user->email;
            $url = route('login');
            $subject ="Account Information";
            $fname = $user->name;
            $message = "
Hey {$fname} !

This email is confirmation that your password reset code.

Registered email: {$to}
Code: {$code}

Thanks,
$site.
";
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
            $headers .= 'From: <webmaster@example.com>' . "\r\n";
            $headers .= 'Cc: myboss@example.com' . "\r\n";

            mail($to,$subject,$message);
            Session::put('Code',$code);
            return redirect(route('enter.code'))->with('success','Email Send . Please check your email');

        }else{
            return back()->with('alert','Email Not Found');
        }
    }

    public function reset_pass_enter_code()
    {
        return view('frontend.PassEnterCode');
    }

    public function reset_pass_enter_code_ver(Request $request)
    {
        $cod = Session::get('Code');
        $user = User::where('email_code',$cod)->first();
        if ($user)
        {
            return view('frontend.ChangePass',compact('user'));
        }else{
            return back()->with('alert','Code Not Match');
        }
    }

    public function reset_pass_save(Request $request)
    {
        $npass = $request->npass;
        $cpass = $request->cpass;

        if ($npass != $cpass)
        {
            return back()->with('alert','Password Not Match');
        }else{
            $user = User::where('id',$request->user)->first();
            $user->email_code = "code used";
            $user->password = Hash::make($npass);
            $user->save();

            return redirect('login')->with('success','Password Change Successfully');
        }
    }
    
    
    public function privacy_policy()
    {
        return view('frontend.privacy');
    }
    
   
}
