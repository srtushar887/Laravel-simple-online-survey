<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
                return ' <a href="'.route('admin.edit.survey',$active_users->id).'"> <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </button></a>
                         <button id="'.$active_users->id .'" onclick="surveydelete(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#delsurvey"><i class="far fa-trash-alt"></i> </button>';
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
                return ' <a href="'.route('admin.edit.survey',$inactive_users->id).'"> <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </button></a>
                         <button id="'.$inactive_users->id .'" onclick="surveydelete(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#delsurvey"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }



}
