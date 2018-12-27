<?php

namespace App\Http\Controllers\App\MediaPartner\Auth;
use App\Models\Tenant;
use App\Models\Operator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Scopes\Facade\TenantManagerFacade as TenantManager;

class LoginController extends Controller
{   
    protected $redirectTo = '/home';
    
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
        //$this->tenant = TenantManager::get();
    }

     public function showLoginForm(){
        return view('app.mediapartner.login');
    }

     public function showLoginForm2(){
        return view('app.mediapartner.login2');
    }

    public  function login(Request $request){
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email|exists:operators,email',
            'password' =>'required|min:6'
            ]);

        $tenant = TenantManager::get();

       // return dd($tenant);

        //Attempt to log the user in
        if(Auth::guard('operator')->attempt(['email' => $request->email, 'password' => $request->password, 'confirmed' => true,'tenant_id' => $tenant->id], $request->remember)){
            //if successful, then redirect to their intended location
        
            return redirect('mediapartner/'.$tenant->domain.'/dashboard');
        }
        
        
        //if unsuccessful, then redirect back to the login with form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }


     public  function login2(Request $request){
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email|exists:operators,email',
            'password' =>'required|min:6|exists:operators,password'
            ]);

        //$tenant = TenantManager::get();

       // return dd($tenant);
         //return dd('in here');
        //Attempt to log the user in
        $operator = Operator::where('email',$request->email)->where('password',bcrypt($request->password));

        if(count($operator)>0){
            return dd('in here');
        }

       /* if(Auth::guard('operator')->attempt(['email' => $request->email, 'password' => $request->password, 'confirmed' => true], $request->remember)){
           

            return dd('in here');
        
            return redirect('mediapartner/'.$tenant->domain.'/dashboard');
        }
        */
        
        //if unsuccessful, then redirect back to the login with form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }


     public function showRegForm($name){
        //$tenant = Tenant::where('domain',$name) -> first();

        //return view('auth.registeruser-via-tenant',compact('tenant'));
    }

    public function logout(Request $request,$domain)
    {
            
        //Auth::guard('operator')->logout();

        //return redirect('mediapartner/'.$tenant->domain);
        // $tenant = Auth::user()->tenant;
        
        Auth::guard('operator')->logout();
        Session::forget('tenant');

        $request->session()->flush();
        $request->session()->regenerate();

        
        return redirect('mediapartner/'.$domain );
    
    }
}