<?php

namespace App\Http\Controllers\Auth;
use App\Models\Tenant;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
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
        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'tenant_domain' =>  $request->tenantDomain], $request->remember)){
            //if successful, then redirect to their intended location
            return redirect('/users/home');
        }
        
        
        //if unsuccessful, then redirect back to the login with form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }


     public function showRegForm($name){
        $tenant = Tenant::where('domain',$name) -> first();

        return view('auth.registeruser-via-tenant',compact('tenant'));
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
