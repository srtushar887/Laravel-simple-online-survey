<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\general_setting;
use App\Models\mobile_recharge;
use App\Models\transaction;
use App\Models\transfer_money;
use App\Models\User;
use App\Models\withdraw_money;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTransactionController extends Controller
{
    public function mobile_recharge()
    {
        return view('user.transaction.mobileRescharge');
    }

    public function mobile_recharge_save(Request $request)
    {


        if (Auth::user()->balance < $request->amount) {
            return back()->with('alert','Insufficient Balance');
        }else{
            $new_recharge = new mobile_recharge();
            $new_recharge->user_id = Auth::user()->id;
            $new_recharge->phone_number = $request->phone_number;
            $new_recharge->amount = $request->amount;
            $new_recharge->status = 1;
            $new_recharge->save();



            $user_tran = new transaction();
            $user_tran->user_id = Auth::user()->id;
            $user_tran->amount = $request->amount;
            $user_tran->message = "Mobile Recharge";
            $user_tran->type = 3;
            $user_tran->status = 1;
            $user_tran->save();

            $user_bal = User::where('id',Auth::user()->id)->first();
            $user_bal->balance = $user_bal->balance - $request->amount;
            $user_bal->save();


            return back()->with('success','Mobile Recharge Request Successfully Send');
        }



    }


    public function withdraw_money()
    {
        return view('user.transaction.withdrawMoney');
    }

    public function withdraw_money_save(Request $request)
    {
        if (Auth::user()->balance < $request->amount) {
            return back()->with('alert','Insufficient Balance');
        }else {
            $new_with = new withdraw_money();
            $new_with->user_id = Auth::user()->id;
            $new_with->amount = $request->amount;
            $new_with->status = 1;
            $new_with->save();

            $user_bal = User::where('id',Auth::user()->id)->first();
            $user_bal->balance = $user_bal->balance - $request->amount;
            $user_bal->save();

            return back()->with('success','Withdraw Request Successfully Send');

        }
    }

    public function transfer_money()
    {
        return view('user.transaction.transferMoney');
    }

    public function transfer_money_save(Request $request)
    {
        $receiver_user = User::where('my_ref_id',$request->userid)->first();

        if ($receiver_user) {

            if ($receiver_user->my_ref_id == Auth::user()->my_ref_id) {
                return back()->with('alert','User not found');
            }else{
                $gen = general_setting::first();

                $total_bal = (Auth::user()->balance * $gen->transfer_amount_percentage) / 100;

                if ($total_bal < $request->amount) {
                    return back()->with('alert','Insufficient Balance');
                }else{
                    $new_transfer = new transfer_money();
                    $new_transfer->user_id = Auth::user()->id;
                    $new_transfer->receiver_id = $receiver_user->id;
                    $new_transfer->amount = $request->amount;
                    $new_transfer->status = 1;
                    $new_transfer->save();

                    $receiver_user->balance = $receiver_user->balance + $request->amount;
                    $receiver_user->save();

                    $auth_user = User::where('id',Auth::user()->id)->first();
                    $auth_user->balance = $auth_user->balance - $request->amount;
                    $auth_user->save();

                    return back()->with('success','Transfer Successfully Created');
                }

            }


        }else{
            return back()->with('alert','User not found');
        }

    }







}
