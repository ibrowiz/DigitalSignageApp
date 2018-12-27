<?php

namespace App\Http\Controllers\App\Client\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Auth;




class ConfirmationController extends Controller
{
    
     public function confirmation($token)
        {

             $user = User::where('token', $token)->first();
             $user->confirmed = true;
             $user->token = '';
             $user->update();

              return redirect('client/'.$user->client->tenant->domain.'/login')->with('status', 'Your activation is completed.');
        
        }


}
