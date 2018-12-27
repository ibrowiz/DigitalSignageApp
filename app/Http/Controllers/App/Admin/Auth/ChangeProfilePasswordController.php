<?php

namespace App\Http\Controllers\App\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;
use Auth;
class ChangeProfilePasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    protected function broker()
    {
      return Password::broker('admins');
    }

    public function showLinkRequestForm()
    {
      //Auth::guard('admin')->logout();
        return view('admin.passwords.profile.email-admin');
    }

   
}
