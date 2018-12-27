<?php

namespace App\Http\Controllers\App\Admin\Auth;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Auth;



class ConfirmationController extends Controller
{
    
     public function confirmation($token)
        {

             $admin = Admin::where('token', $token)->first();
             $admin->confirmed = true;
             $admin->token = '';
             $admin->update();
             return redirect('/admin/login')->with('status', 'Your activation is completed.');
        
        }


}
