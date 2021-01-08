<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\general_setting;
use App\Models\survey_question;
use App\Models\User;
use App\Models\user_pin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::count();
        $survey_question = survey_question::count();

//        user_pin::truncate();

        return view('admin.index',compact('users','survey_question'));
    }


    public function general_settings()
    {
        $gen = general_setting::first();
        return view('admin.page.generalSettings',compact('gen'));
    }

    public function general_settings_update(Request $request)
    {
        $gen = general_setting::first();

        if($request->hasFile('logo')){
            @unlink($gen->logo);
            $image = $request->file('logo');
            $imageName = time().'.'."png";
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->logo = $imgUrl;
        }
        if($request->hasFile('icon')){
            @unlink($gen->icon);
            $image = $request->file('icon');
            $imageName = time().'.'."png";
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->icon = $imgUrl;
        }

        $gen->site_name = $request->site_name;
        $gen->site_email = $request->site_email;
        $gen->site_phone_number = $request->site_phone_number;
        $gen->site_currency = $request->site_currency;
        $gen->per_post_money = floatval($request->per_post_money);
        $gen->per_like_money = floatval($request->per_like_money);
        $gen->create_post = floatval($request->create_post);
        $gen->active_commission = floatval($request->active_commission);
        $gen->transfer_amount_percentage = $request->transfer_amount_percentage;
        $gen->get_money_created_post_user = $request->get_money_created_post_user;
        $gen->withdraw_limit = $request->withdraw_limit;
        $gen->mobile_limit = $request->mobile_limit;
        $gen->site_address = $request->site_address;
        $gen->save();

        return back()->with('success','General Settings Successfully Updated');


    }



    public function profile()
    {
        return view('admin.page.profile');
    }


    public function profile_update(Request $request)
    {
        $profile = Admin::where('id',Auth::user()->id)->first();
        if($request->hasFile('profile_image')){
            @unlink($profile->profile_image);
            $image = $request->file('profile_image');
            $imageName = time().'.'."png";
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $profile->profile_image = $imgUrl;
        }


        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->save();

        return back()->with('success','Profile Successfully Updated');





    }



    public function password_change()
    {
        return view('admin.page.passwordChange');
    }


    public function password_change_update(Request $request)
    {


        $this->validate($request,[
           'npass' => 'required|min:8' ,
           'cpass' => 'required|min:8'
        ],[
            'npass.required' => 'New password is required',
            'cpass.required' => 'Confirm password is required',
        ]);

        $new_pass = $request->npass;
        $con_pass = $request->cpass;

        if ($new_pass != $con_pass) {
            return back()->with('alert','Password not match');
        }else{
            $user_pass = Admin::where('id',Auth::user()->id)->first();
            $user_pass->password = Hash::make($new_pass);
            $user_pass->save();

//            Auth::guard('web')->logout();
//            Session::flush();
//            \auth()->guard('web')->login($user_pass);
            return back()->with('success','Password Successfully Changed');
        }
    }







}
