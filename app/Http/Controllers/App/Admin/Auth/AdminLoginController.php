<?php

namespace App\Http\Controllers\App\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{

	public function __construct(){
		$this->middleware('guest:admin',['except'=>['logout']]);
	}

    public function showLoginForm(){
    	return view('app.admin.login');
    }

    public  function login(Request $request){
    	//validate the form data
    	$this->validate($request, [
    		'email' => 'required|email|max:50|exists:admins,email',
    		'password' =>'required|min:6'
    		]);

    	//Attempt to log the user in
    	if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password,'confirmed' => true], $request->remember)){
    		//if successful, then redirect to their intended location
    		return redirect('/admin/dashboard');
    	}
    	
    	
    	//if unsuccessful, then redirect back to the login with form data
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }

     public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin/login');
    }

}
