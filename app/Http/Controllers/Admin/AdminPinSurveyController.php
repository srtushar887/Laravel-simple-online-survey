<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_pin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AdminPinSurveyController extends Controller
{
    public function user_pin()
    {
        return view('admin.pin.userPinList');
    }


    public function user_pin_get()
    {
        $user_pin = user_pin::with('user')->get();
        return DataTables::of($user_pin)
            ->addColumn('action',function ($user_pin){
            })
            ->editColumn('created_at',function ($user_pin){
                return Carbon::parse($user_pin->created_at)->format('Y-m-d');
            })
            ->make(true);
    }

    public function create_pin()
    {
        $users = User::all();
        return view('admin.pin.userPinCreate',compact('users'));
    }


    public function create_pin_save(Request $request)
    {
        if ($request->user_id == 0) {
            return back()->with('alert','Please Select User');
        }else{
            $user = User::where('id',$request->user_id)->first();


            $pin_count = $request->pin_count;

            for ($i=0;$i<$pin_count;$i++){
                $pin = rand(1,9).rand(1,9).rand(1,9).$user->id.rand(1,9).rand(1,9).rand(1,9);

                $user_pin = new user_pin();
                $user_pin->user_id = $user->id;
                $user_pin->user_pin =$pin;
                $user_pin->status =1;
                $user_pin->save();
            }

            return back()->with('success','User Pin Successfully Created');


        }
    }


}
