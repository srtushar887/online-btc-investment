<?php

namespace App\Http\Controllers\Admin;

use App\deposit;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminUserController extends Controller
{
    public function users()
    {
        return view('admin.users.users');
    }

    public function users_get()
    {
        $all_users = User::all();
        return DataTables::of($all_users)
            ->addColumn('action', function ($all_users) {
                return ' <a href="'.route('edit.user',$all_users->id).'"> <button  class="btn btn-success btn-info btn-sm" ><i class="fas fa-eye"></i> </button></a>
               <button id="' . $all_users->id . '" onclick="admindeluser(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#admindeleteuser"><i class="fas fa-trash"></i> </button>';
            })
            ->make(true);
    }

    public function edit_user($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.users.userEdit',compact('user'));
    }

    public function edit_user_save(Request $request)
    {
        $user = User::where('id',$request->user_id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->with_wallet = $request->with_wallet;
        $user->balance = $request->balance;
        if ($request->password != "" || $request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return back()->with('success','User Information Updated');
    }

    public function delete_user(Request $request)
    {
        $deposits = deposit::where('user_id',$request->user_delete_id)->get();
        if (count($deposits) > 0){

        foreach ($deposits as $dep)
        {
            $dep_data = deposit::where('id',$dep->id)->first();
            $dep_data->delete();
        }
        }

        $user = User::where('id',$request->user_delete_id)->first();
        $user->delete();

        return back()->with('success','User Deleted');



    }
}
