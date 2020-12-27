<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomLoginController extends Controller
{
    public function custom_register(Request $request)
    {
        $new_user = new User();
        $new_user->ref_id = $request->ref_id;
        $new_user->balance = 0.00;
        $new_user->total_earning = 0.00;
        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->phone = $request->phone;
        $new_user->password = Hash::make($request->password);
        $new_user->account_type = 1;
        $new_user->is_veify = 1;
        $new_user->save();


        $myrefid = rand(1,9).rand(1,9).rand(1,9).$new_user->id.rand(1,9).rand(1,9).rand(1,9);
        $user_balance = User::where('id',$new_user->id)->first();

        if ($user_balance->balance == null) {
            $user_balance->balance = 0.00;
        }
        $user_balance->my_ref_id = $myrefid;
        $user_balance->save();

        return redirect(route('login'));

    }


    public function custom_login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect(route('dashboard'));
        }

        return redirect()->back();
    }






}
