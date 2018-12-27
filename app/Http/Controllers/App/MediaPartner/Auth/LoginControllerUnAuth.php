<?php

namespace App\Http\Controllers\App\MediaPartner\Auth;
use App\Models\Operator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Scopes\Facade\TenantManagerFacade as TenantManager;

class LoginControllerUnAuth extends Controller
{   
    

     public function showLoginForm(){
        return view('app.mediapartner.loginunauth');
    }

    

    /*public  function login(Request $request){
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email',
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
    }*/


     public  function login(Request $request){
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email|exists:operators,email',
            'password' =>'required|min:6'
            ]);

        if(Auth::guard('operator')->attempt(['email' => $request->email, 'password' => $request->password, 'confirmed' => true], $request->remember)){

            return redirect('mediapartner/'.Auth::guard('operator')->user()->tenant->domain.'/dashboard');
        }
        
        
        
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