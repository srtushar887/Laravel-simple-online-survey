<?php

namespace App\Http\Controllers;

use App\Mail\AccountVeirifyMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class VisitorController extends Controller
{
    public function referral_join($refid)
    {
        $user_ref = $refid;
        return view('auth.userRegeralRegister',compact('user_ref'));
    }


    public function verify_account($ocde)
    {
        $user = User::where('verify_code',$ocde)->first();
        if ($user) {
            $user->verify_code = null;
            $user->account_type = 2;

            $user->save();
            return redirect(route('login'))->with('account_veiry_success','Success! Your account has been successfully verified. Please login . ');
        }else{
            return redirect(route('login'))->with('account_veiry_success','Sorry! link has been expire .');
        }
    }


    public function forgot_password()
    {
        return view('auth.userForgotPassword');
    }


    public function reset_pass_send_link(Request $request)
    {
        $email = $request->email;
        $user = User::where('email',$email)->first();
        if ($user) {
            $code = Str::random(5).$user->id.rand(1,9).Str::random(3);
            $url = route('user.reset.pass.verify',$code);
            $to = $user->email;

            $user_code = User::where('id',$user->id)->first();
            $user_code->verify_code = $code;
            $user_code->save();

            $msg = [
                'code' => $url,
            ];
            Mail::to($to)->send(new AccountVeirifyMail($msg));
            return redirect(route('login'))->with('reset_pass_mail_send','We have send a link in your mail .');
        }else{
            return back()->with('email_not_match','Sorry! We can not find your account');
        }

    }


    public function reset_pass_verify($code)
    {
        $user = User::where('verify_code',$code)->first();
        if ($user) {
            $ver_code = $user->verify_code;
            return view('auth.resetPassChange',compact('ver_code'));
        }else{
            return redirect(route('login'))->with('account_veiry_success','Sorry! Link has been expire .');
        }
    }

    public function reset_pass_chnage_save(Request $request)
    {
        $user = User::where('verify_code',$request->ver_code_check)->first();

        if ($request->npass != $request->cpass) {
            return back()->with('pass_error','Sorry! Password not match.');
        }else{
            $user->password = Hash::make($request->npass);
            $user->verify_code = null;
            $user->save();
            return redirect(route('login'))->with('pass_success','Success! Password successfully changed.');
        }

    }





}
