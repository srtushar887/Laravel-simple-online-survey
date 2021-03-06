<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\general_setting;
use App\Models\mobile_recharge;
use App\Models\transaction;
use App\Models\transfer_money;
use App\Models\User;
use App\Models\user_earning;
use App\Models\withdraw_money;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserTransactionController extends Controller
{
    public function mobile_recharge()
    {
        return view('user.transaction.mobileRescharge');
    }

    public function mobile_recharge_save(Request $request)
    {


        $this->validate($request,[
            'phone_number' => 'required',
            'amount' => 'required',
        ],[
            'phone_number.required' => 'Phone Number is required',
            'amount.required' => 'Amount is required',
        ]);


        $date = Carbon::now()->format('Y-m-d');
        $user_exists_recear = mobile_recharge::where('user_id',Auth::user()->id)
            ->where('create_date',$date)->count();

        $gen = general_setting::first();

        if (Auth::user()->balance < $request->amount) {
            return back()->with('alert','Insufficient Balance');
        }elseif (Auth::user()->is_veify ==1){
            return back()->with('alert','YOU ARE NOT ACTIVE MEMBER');
        }else{


            if ($user_exists_recear > $gen->mobile_limit){
                return back()->with('alert','Your limit has been over');
            }else{
                $id = Str::random(3).Auth::user()->id.rand(1,9).Str::random(3);

                $new_recharge = new mobile_recharge();
                $new_recharge->recharge_id = $id;
                $new_recharge->user_id = Auth::user()->id;
                $new_recharge->phone_number = $request->phone_number;
                $new_recharge->amount = $request->amount;
                $new_recharge->status = 1;
                $new_recharge->create_date = Carbon::now()->format('Y-m-d');
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



    }


    public function withdraw_money()
    {
        return view('user.transaction.withdrawMoney');
    }

    public function withdraw_money_save(Request $request)
    {


        $this->validate($request,[
            'amount' => 'required',
            'address' => 'required',
        ],[
            'amount.required' => 'Amount is required',
            'address.required' => 'Payment Address is required',
        ]);

        if (Auth::user()->balance < $request->amount) {
            return back()->with('alert','Insufficient Balance');
        }elseif (Auth::user()->is_veify ==1){
            return back()->with('alert','YOU ARE NOT ACTIVE MEMBER');
        }else {

            $gen = general_setting::first();
            $date = Carbon::now()->format('Y-m-d');
            $user_exists_recear = withdraw_money::where('user_id',Auth::user()->id)
                ->where('create_date',$date)->count();



            if ($user_exists_recear > $gen->withdraw_limit){
                return back()->with('alert','Your limit has been over');
            }else{
                $id = Str::random(3).Auth::user()->id.rand(1,9).Str::random(3);

                $new_with = new withdraw_money();
                $new_with->withdraw_id = $id;
                $new_with->user_id = Auth::user()->id;
                $new_with->amount = $request->amount;
                $new_with->payment_type = $request->payment_type;
                $new_with->address = $request->address;
                $new_with->status = 1;
                $new_with->create_date = Carbon::now()->format('Y-m-d');;
                $new_with->save();

                $user_bal = User::where('id',Auth::user()->id)->first();
                $user_bal->balance = $user_bal->balance - $request->amount;
                $user_bal->save();

                return back()->with('success','Withdraw Request Successfully Send');
            }



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
                $send_amount = Auth::user()->balance - $total_bal;
                if ($send_amount < $request->amount) {
                    return back()->with('alert','Insufficient Balance');
                }elseif (Auth::user()->is_veify ==1){
                    return back()->with('alert','YOU ARE NOT ACTIVE MEMBER');
                }else{


                    $id = Str::random(3).Auth::user()->id.rand(1,9).Str::random(3);

                    $new_transfer = new transfer_money();
                    $new_transfer->transfer_id = $id;
                    $new_transfer->user_id = Auth::user()->id;
                    $new_transfer->receiver_id = $receiver_user->id;
                    $new_transfer->amount = $request->amount;
                    $new_transfer->remark = $request->remark;
                    $new_transfer->status = 1;
                    $new_transfer->type = 1;
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


    public function earning_history()
    {
        $earnings = user_earning::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        return view('user.history.earningHistory',compact('earnings'));
    }

    public function withdraw_history()
    {
        $withraw = withdraw_money::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        return view('user.history.withdrawHistory',compact('withraw'));
    }

    public function send_money_history(Request $request)
    {
        $sendmoney = transfer_money::where('user_id',Auth::user()->id)
            ->orWhere('receiver_id',Auth::user()->id)
            ->orderBy('id','desc')->paginate(10);
        return view('user.history.sendmoneyHistory',compact('sendmoney'));
    }

    public function mobile_recharge_history()
    {
        $mobile_recharge = mobile_recharge::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        return view('user.history.mobileRechargeHistory',compact('mobile_recharge'));
    }











}
