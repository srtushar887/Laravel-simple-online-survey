<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mobile_recharge;
use App\Models\User;
use App\Models\withdraw_money;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AdminTransactionController extends Controller
{
    public function mobile_recharge()
    {
        return view('admin.transaction.mobileRecharge');
    }

    public function mobile_recharge_get()
    {
        $users = mobile_recharge::with('users')->get();
        return DataTables::of($users)
            ->addColumn('action',function ($users){
                return ' <button id="'.$users->id .'" onclick="mobilerechargeid(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#adminmobilerecharge"><i class="far fa-edit"></i> </button>';
            })
            ->make(true);
    }


    public function mobile_recharge_save(Request $request)
    {
        $recharge = mobile_recharge::where('id',$request->mobile_recharge_id)->first();

        if ($request->status == 0) {
            return back()->with('alert','please select status');
        }elseif ($request->status == 1) {
            $recharge->status = 2;
            $recharge->save();
            return back()->with('success','Recharge has been confirm');

        }else {
            $recharge->status = 3;
            $recharge->save();

            $user_bal = User::where('id',$recharge->user_id)->first();
            $user_bal->balance = $user_bal->balance + $recharge->amount;
            $user_bal->save();


            return back()->with('success','Recharge has been rejected');
        }


    }


    public function withdraw_money()
    {
        return view('admin.transaction.withdrawMoney');
    }

    public function withdraw_money_get()
    {
        $users = withdraw_money::with('users')->latest();
        return DataTables::of($users)
            ->addColumn('action',function ($users){
                return ' <button id="'.$users->id .'" onclick="withdrawmoneyid(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#adminwithdrawmoney"><i class="far fa-edit"></i> </button>';
            })
            ->make(true);
    }

    public function withdraw_money_status_change(Request $request)
    {
        $withid = withdraw_money::where('id',$request->withdraw_id)->first();

        if ($request->status == 0) {
            return back()->with('alert','please select status');
        }elseif ($request->status == 1){
            $withid->status = 2;
            $withid->save();
            return back()->with('success','Withdraw Money has been confirm');
        }else{
            $withid->status = 3;
            $withid->save();

            $user_bal = User::where('id',$withid->user_id)->first();
            $user_bal->balance = $user_bal->balance + $withid->amount;
            $user_bal->save();

            return back()->with('success','Withdraw Money has been rejected');
        }


    }





}
