<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AdminUserController extends Controller
{
    public function active_users()
    {
        return view('admin.users.activeUsers');
    }


    public function active_users_get()
    {
        $active_users = DB::table('users')->where('account_type',2)->get();
        return DataTables::of($active_users)
            ->addColumn('action',function ($active_users){
                return ' <button id="'.$active_users->id .'" onclick="deleteuser(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deleteuser"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }

    public function inactive_users()
    {
        return view('admin.users.inactiveUsers');
    }


    public function inactive_users_get()
    {
        $inactive_users = DB::table('users')->where('account_type',1)->get();
        return DataTables::of($inactive_users)
            ->addColumn('action',function ($inactive_users){
                return ' <button id="'.$inactive_users->id .'" onclick="deleteuserin(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deleteuserin"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }

    public function edit_user($id)
    {
        return view('admin.users.editUser');
    }


    public function delete_user(Request $request)
    {
        $user = User::where('id',$request->deleteuserid)->first();

        DB::table('survey_questions')->where('user_type',2)->where('user_id',$user->id)->delete();
        DB::table('post_comments')->where('user_type',2)->where('user_id',$user->id)->delete();
        DB::table('post_likes')->where('user_type',2)->where('user_id',$user->id)->delete();
        DB::table('withdraw_moneys')->where('user_id',$user->id)->delete();
        DB::table('user_pins')->where('user_id',$user->id)->delete();
        DB::table('mobile_recharges')->where('user_id',$user->id)->delete();
        DB::table('referral_earnings')->where('user_id',$user->id)->delete();
        $user->delete();
        return back()->with('success','User Successfully Deleted');
    }




}
