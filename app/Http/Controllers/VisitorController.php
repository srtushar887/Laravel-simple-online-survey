<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function referral_join($refid)
    {
        $user_ref = $refid;
        return view('auth.userRegeralRegister',compact('user_ref'));
    }
}
