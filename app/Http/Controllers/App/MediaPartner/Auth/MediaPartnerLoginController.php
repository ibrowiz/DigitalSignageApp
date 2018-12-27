<?php

namespace App\Http\Controllers\App\MediaPartner\Auth;
 use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class MediaPartnerLoginController extends Controller
{

	public function __construct(){
		$this->middleware('guest:operator',['except'=>['logout']]);
	}

    public function showLoginForm(){
        //$tenant = Tenant::where('domain',$name) -> first();

    	return view('auth.operator-login');
    }


    public function showRegForm($name){
        $tenant = Tenant::where('domain',$name) -> first();

        return view('auth.registeruser-via-tenant',compact('tenant'));
    }



    public  function login(Request $request){
    	//validate the form data
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' =>'required|min:6'
    		]);

        $domain = $request->input('tenantDomain');

        $tenant = Tenant::where('domain', $domain) -> first();
    	//Attempt to log the user in
        //
    	if(Auth::guard('operator')->attempt(['email' => $request->email, 'password' => $request->password,], $request->remember) && $tenant->status == '1' ){
    		//if successful, then redirect to their intended location
        
    		return redirect($domain.'/operator/dashboard');
    	}
    	
    	
    	//if unsuccessful, then redirect back to the login with form data
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    /* public function logout()
    {
            $domain = Auth::guard('operator')->user()->tenant->domain;
        

        return redirect($domain.'/operator/login');
        //return redirect()->route('operator/login');
    }*/

    public function logout()
    {
            
        Auth::guard('operator')->logout();

        return redirect(route( 'operator.login' ));
    
    }

}
