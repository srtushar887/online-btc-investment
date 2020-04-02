<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function profile()
    {
        $user = User::where('id',Auth::user()->id)->first();
        return view('user.page.profile',compact('user'));
    }

    public function profile_save(Request $request)
    {
        $user_pro = User::where('id',Auth::user()->id)->first();
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
        $user_pro->with_wallet = $request->with_wallet;
        $user_pro->save();

        return back()->with('success','Profile Updated');

    }

    public function change_pass()
    {
        return view('user.page.changePass');
    }

    public function change_pass_save(Request $request)
    {
        $npass = $request->n_pass;
        $cpass = $request->c_pass;
        if ($npass != $cpass)
        {
            return back()->with('alert','Password Not Match');
        }else{
            $user = User::Where('id',Auth::user()->id)->first();
            $user->password = Hash::make($npass);
            $user->save();
            return back()->with('alert','Password Changed');
        }
    }

    public function my_referral_user()
    {
        $user = User::where('have_ref',Auth::user()->my_ref)->paginate(20);
        return view('user.page.myReferral',compact('user'));
    }

    public function data ()
    {

    }
}
