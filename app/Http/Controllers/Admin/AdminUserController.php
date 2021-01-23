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
                return ' <button id="'.$active_users->id .'" onclick="deleteuser(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deleteuser"><i class="far fa-trash-alt"></i> </button>
                         <button id="'.$active_users->id .'" onclick="userblock(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#blockuser"><i class="fas fa-lock"></i> </button>
                         <button id="'.$active_users->id .'" onclick="viewprofile(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#profileview"><i class="fas fa-house-user"></i> </button>';
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
                return ' <button id="'.$inactive_users->id .'" onclick="deleteuser(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deleteuser"><i class="far fa-trash-alt"></i> </button>
                         <button id="'.$inactive_users->id .'" onclick="userblock(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#blockuser"><i class="fas fa-lock"></i> </button>
                         <button id="'.$inactive_users->id .'" onclick="viewprofile(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#profileview"><i class="fas fa-house-user"></i> </button>';
            })
            ->make(true);
    }



    public function blocked_user()
    {
        return view('admin.users.blockedUsers');
    }


    public function blocked_user_get()
    {
        $blocked_users = DB::table('users')->where('account_type',3)->get();
        return DataTables::of($blocked_users)
            ->addColumn('action',function ($blocked_users){
                return ' <button id="'.$blocked_users->id .'" onclick="deleteuser(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deleteuser"><i class="far fa-trash-alt"></i> </button>
                         <button id="'.$blocked_users->id .'" onclick="userblock(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#blockuser"><i class="fas fa-lock"></i> </button>
                         <button id="'.$blocked_users->id .'" onclick="viewprofile(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#profileview"><i class="fas fa-house-user"></i> </button>';
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


    public function block_user(Request $request)
    {

        if ($request->unstatus == 0){
            return back()->with('alert','Please selected status');
        }elseif ($request->unstatus == 1){
            $user_block = User::where('id',$request->delete_block_id)->first();
            $user_block->account_type = 3;
            $user_block->save();
            return back()->with('success','User Successfully Blocked');
        }elseif ($request->unstatus == 2){
            $user_block = User::where('id',$request->delete_block_id)->first();
            $user_block->account_type = 2;
            $user_block->save();
            return back()->with('success','User Successfully Un-Blocked');
        }

        else{

            return back()->with('alert','Please selected status');
        }


    }


    public function user_profile_view(Request $request)
    {
        $user = User::where('id',$request->view_user_id)->first();

        if ($user->show_pass == null || $user->show_pass == ''){
            return back()->with('alert','Password not get');
        }else{
            return view('auth.userProfileView',compact('user'));
        }





    }






}
