<?php

namespace App\Http\Controllers\Admin;

use App\all_static;
use App\contact;
use App\how_it_work_data;
use App\Http\Controllers\Controller;
use App\our_feature_data;
use App\testimonials;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;
use function GuzzleHttp\Promise\all;

class AdminFrontendController extends Controller
{
    public function home()
    {
        $home = all_static::first();
        return view('admin.frontend.home',compact('home'));
    }

    public function home_save(Request $request)
    {
        $home = all_static::first();
        if($request->hasFile('home_backgorund_image')){
//            @unlink($home->home_backgorund_image);
//            $image = $request->file('home_backgorund_image');
//            $imageName = uniqid().time().'.'.$image->getClientOriginalName('home_backgorund_image');
//            $directory = 'assets/dashboard/images/static/';
//            $imgUrl2  = $directory.$imageName;
//            Image::make($image)->save($imgUrl2);
//            $home->home_backgorund_image = $imgUrl2;
            Image::make($request->home_backgorund_image)->save('assets/frontend/img/banner.jpg');
        }

        $home->home_title = $request->home_title;
        $home->home_sub_title = $request->home_sub_title;
        $home->save();

        return back()->with('success','Home Content Updated');
    }

    public function home_how_it_works()
    {
        $home = all_static::first();
        $data = how_it_work_data::all();
        return view('admin.frontend.howItWorks',compact('home','data'));
    }

    public function home_how_it_works_save(Request $request)
    {
        $how = all_static::first();
        $how->home_how_it_title = $request->home_how_it_title;
        $how->home_how_it_sub_title = $request->home_how_it_sub_title;
        $how->save();

        return back()->with('success','How It Works Update');
    }

    public function home_how_it_works_data_save(Request $request)
    {
        $dataupdate = how_it_work_data::where('id',$request->edit_id_how)->first();
        $dataupdate->icon = $request->icon;
        $dataupdate->title = $request->title;
        $dataupdate->sub_title = $request->sub_title;
        $dataupdate->save();
        return back()->with('success','How It Data Updated');

    }

    public function home_our_features()
    {
        $home = all_static::first();
        $data = our_feature_data::all();
        return view('admin.frontend.ourFeatures',compact('home','data'));
    }

    public function home_our_features_header_save(Request $request)
    {
        $our_f_header = all_static::first();
        $our_f_header->home_our_feature_title = $request->home_our_feature_title;
        $our_f_header->home_our_feature_subtitle = $request->home_our_feature_subtitle;
        $our_f_header->save();

        return back()->with('success','Our Feature Header Updated');
    }

    public function home_our_features_header_data_save(Request $request)
    {
        $dataupdate = our_feature_data::where('id',$request->edit_o_f_data)->first();
        $dataupdate->icon = $request->icon;
        $dataupdate->title = $request->title;
        $dataupdate->sub_title = $request->sub_title;
        $dataupdate->save();
        return back()->with('success','How It Data Updated');
    }

    public function testiminials()
    {
        $home = all_static::first();
        $tests = testimonials::paginate(10);
        return view('admin.frontend.testimonials',compact('home','tests'));
    }

    public function testiminials_save(Request $request)
    {
        $test = new testimonials();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image');
            $directory = 'assets/dashboard/images/static/';
            $imgUrl2  = $directory.$imageName;
            Image::make($image)->save($imgUrl2);
            $test->image = $imgUrl2;
        }
        $test->name = $request->name;
        $test->desg = $request->desg;
        $test->comment = $request->comment;
        $test->save();
        return back()->with('success','Testimonials Created');
    }

    public function testiminials_update(Request $request)
    {
        $test_up = testimonials::where('id',$request->testeditid)->first();
        if($request->hasFile('image')){
            @unlink($test_up->image);
            $image = $request->file('image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image');
            $directory = 'assets/dashboard/images/static/';
            $imgUrl2  = $directory.$imageName;
            Image::make($image)->save($imgUrl2);
            $test_up->image = $imgUrl2;
        }
        $test_up->name = $request->name;
        $test_up->desg = $request->desg;
        $test_up->comment = $request->comment;
        $test_up->save();
        return back()->with('success','Testimonials Updated');
    }

    public function testiminials_delete(Request $request)
    {
        $del_test = testimonials::where('id',$request->testdeleteid)->first();
        @unlink($del_test->image);
        $del_test->delete();
        return back()->with('success','Testimonials Deleted');
    }

    public function contact_us_data()
    {
        return view('admin.frontend.contactus');
    }

    public function contact_us_get()
    {
        $con = contact::where('status',0)->get();
        return DataTables::of($con)
            ->addColumn('action', function ($con) {
                return '<button id="' . $con->id . '" onclick="adminviewcon(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#adminviewcontact"><i class="fas fa-eye"></i> </button>';
            })
            ->make(true);
    }

    public function contact_us_single(Request $request)
    {
        $con = contact::where('id',$request->id)->first();
        return response($con);
    }

    public function contact_us_reply(Request $request)
    {
        $con = contact::where('id',$request->conod)->first();
        $con->status = 1;
        $con->save();

        return back()->with('success','Contact Reply Send');
    }

    public function about_us_page()
    {
        $aboutpage = all_static::first();
        return view('admin.frontend.aboutUsPage',compact('aboutpage'));
    }

    public function about_us_page_save(Request $request)
    {
        $aboutussave = all_static::first();
        $aboutussave->about_us_page_title = $request->about_us_page_title;
        $aboutussave->about_us_page_des = $request->about_us_page_des;
        $aboutussave->save();

        return back()->with('success','About Us Page Updated');

    }
}
