<?php

namespace App\Http\Controllers\Auth;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class UserLoginController extends Controller
{

	public function __construct(){
		$this->middleware('guest',['except'=>['logout']]);
	}

    public function showLoginForm(){
        return view('auth.user.login');
    }

    public  function login(Request $request){
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' =>'required|min:6'
            ]);

        //Attempt to log the user in
        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            //if successful, then redirect to their intended location
            // return dd(auth::user());
            return redirect()->intended( url('/home'));
        }
        
        
        //if unsuccessful, then redirect back to the login with form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

     
      public function showRegForm(){
        //$tenant = Tenant::where('domain',$name) -> first();

        return view('auth.register');
    }

     public function logout()
    {
        $domain = Auth::guard('web')->user()->tenant_domain;
        Auth::guard('web')->logout();

        return redirect('/'.$domain);
    }

}
