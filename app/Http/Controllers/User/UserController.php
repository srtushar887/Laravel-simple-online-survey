<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\referral_earning;
use App\Models\survey_question;
use App\Models\User;
use App\Models\user_earning;
use App\Models\user_pin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index()
    {

        $user_today_exist_data = referral_earning::where('earning_date',Carbon::now()->format('Y-m-d'))->count();

        if ($user_today_exist_data == 0) {
            $downline_user = User::where('ref_id',Auth::user()->ref_id)->get();

        }

        return view('user.index');
    }


    public function account_verify()
    {
        return view('user.page.accountVerify');
    }

    public function account_verify_submit(Request $request)
    {
        $pin = $request->pin_number;

        $user_pin = user_pin::where('user_pin',$pin)->where('status',1)->first();
        if ($user_pin) {
            $user_pin->status = 2;
            $user_pin->save();

            $user = User::where('id',Auth::user()->id)->first();
            $user->account_type = 2;
            $user->save();

            return back()->with('success','Account Successfully Active');

        }else{
            return back()->with('alert','Pin is incorrect');
        }



    }


    public function profile()
    {
        return view('user.page.profile');
    }


    public function profile_update(Request $request)
    {
        $profile = User::where('id',Auth::user()->id)->first();
        if($request->hasFile('profile_image')){
            @unlink($profile->profile_image);
            $image = $request->file('profile_image');
            $imageName = time().uniqid().'.'."png";
            $directory = 'assets/frontend/img/user/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $profile->profile_image = $imgUrl;
        }

        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->save();

        return back()->with('success','Profile Successfully Updated');


    }


    public function change_password()
    {
        return view('user.page.changePassword');
    }

    public function change_password_save(Request $request)
    {
        $new_pass = $request->npass;
        $con_pass = $request->cpass;

        if ($new_pass != $con_pass) {
            return back()->with('alert','Password not match');
        }else{
            $user_pass = \auth()->user();
            $user_pass->password = Hash::make($new_pass);
            $user_pass->save();

            Auth::guard('web')->logout();
            Session::flush();
            \auth()->guard('web')->login($user_pass);
            return redirect(route('user.change.password'))->with('success','Password Successfully Changed');
        }

    }








}
