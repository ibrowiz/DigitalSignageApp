<?php

namespace App\Http\Controllers\App\Client\Auth;
use App\Models\Tenant;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Scopes\Facade\TenantManagerFacade as TenantManager;

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

    public  function login(Request $request)
    {
        //validate the form data
        $this->validate($request, [
            'email' => 'required|string|exists:users,email',
            'password' =>'required|min:6'
            ]);

        $user = User::where('email',$request->email)->first();

        $tenant = TenantManager::get();


        //Attempt to log the user in
        if(($tenant->id == $user->client->tenant->id) && Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'confirmed' => true, 'client_id' => $user->client_id], $request->remember))
        {
            //if successful, then redirect to their intended location
            
            return redirect('client/'.$tenant->domain.'/dashboard');
        }
        
        
        //if unsuccessful, then redirect back to the login with form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }


     public function showRegForm($name){
        $tenant = Tenant::where('domain',$name) -> first();

        return view('auth.registeruser-via-tenant',compact('tenant'));
    }

    public function logout()
    {
         $tenant = TenantManager::get();
        Auth::guard('web')->logout();
        return redirect('client/'.$tenant->domain);
    }
}
