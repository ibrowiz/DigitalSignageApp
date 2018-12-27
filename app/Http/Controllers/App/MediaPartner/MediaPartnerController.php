<?php

namespace App\Http\Controllers\App\MediaPartner;

use App\Http\Controllers\Controller;
use App\Models\Operator;
use App\Models\TenantProfile;
use App\Models\MediaPartnerWallet;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Country;
use App\Models\Wallet;
use App\Models\Point;
//use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
class MediaPartnerController extends Controller
{
    
    //use RegistersUsers;

    

    public function index($name)
    {

         $tenant = Tenant::where('domain',$name) -> first();
        return view('app.operatorindex',compact('tenant'));
    }

  


    /* protected function create(array $data)
    {
        return Operator::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }*/

    protected function validator(array $data)
    {
       return $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

protected function register(Request $request)
    {
       $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            //'phone' => 'required|integ|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            //'mgr_firstname' => 'string|max:255',
           // 'mgr_lastname' => 'string|max:255',
            'mgr_email' => 'string|email|max:255',
            'mgr_phone' => 'integer|email|max:255',
            'mgr_password' => 'string|min:6|confirmed',
        ]);

        $tenant = Tenant::create([
            'name' => $request->input('name'),
            'domain' => $request->input('domain'),
            'email' => $request->input('email'),
        ]);

        $tenantProfile = TenantProfile::create([
            'tenant_id' => $tenant->id, // Notice the Tenant ID here
            'phone' => $request->input('phone'),
            'contact_email' => $request->input('mgr_email'),
            'contact_person' => $request->input('mgr_firstname')." ". $request->input('mgr_firstname'),
            'address' =>$request->input('address'),
            'country' =>$request->input('country'),
            'state' =>$request->input('state'),
        
        ]);

        

        if($request->has('manager'))

        {
            //return dd($request->input('mgr_firstname').' '.$request->input('mgr_lastname'));

             $rand = str_random(25);
             $rpass = str_random(7);
             $operator = Operator::create([
            'tenant_id' => $tenant->id, // Notice the Tenant ID here
            'first_name' => $request->input('mgr_firstname'),
            'last_name' => $request->input('mgr_lastname'),
            'email' =>$request->input('mgr_email'),
            'password' => bcrypt('password'),
            'super_admin' => '1',
            'token' => $rand,

            ]);


             $operator = Operator::create([
            'tenant_id' => $tenant->id, // Notice the Tenant ID here
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            'email' =>$request->input('email'),
            'password' => bcrypt($request->input('password')),
            'token' => $rand,
        ]);

           /* $data = $operator->toArray();

            Mail::send('app.mediapartner.mails.confirmation', $data, function($message) use($data){
                $message->to($data['email']);
                $message->subject('Registration Confirmation');
            });*/
                     }
         else
         {

            $rand = str_random(25);
  
            $operator = Operator::create([
            'tenant_id' => $tenant->id, // Notice the Tenant ID here
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            'email' =>$request->input('email'),
            'password' => bcrypt($request->input('password')),
            'token' => $rand,
        ]);

          /*  $data = $operator->toArray();

            Mail::send('app.mediapartner.mails.confirmation', $data, function($message) use($data){
                $message->to($data['email']);
                $message->subject('Registration Confirmation');
            });*/
            

         }
            

         

          /*$wallet = Wallet::create([
            'assignable_id' => $tenant->id, 
            'assignable_type' => 'App\Models\MediaPartner',
            'amount' => 0,
            'last_transaction' => 0,
            'last_transaction_type' => NULL,
        ]);*/

           

         /*$rand = str_random(25);

        //$tenant = Operator::where('tenant_domain','telvida')->first();    
         $operator = Operator::create([
            'tenant_id' => $tenant->id, // Notice the Tenant ID here
            'tenant_domain' => $tenant->domain,
            'name' => $request->input('name'),
            'email' =>$request->input('email'),
            'password' => bcrypt($request->input('password')),
            'token' => $rand,
        ]);*/
           
           //$data = $operator->toArray();

            /*Mail::send('app.tenant.operator.mails.confirmation', $data, function($message) use($data){
                $message->to($data['email']);
                $message->subject('Registration Confirmation');
            });*/
            
            
             return back()->with('flash_message', "saved");
     
    }

        public function confirmation($token)
        {
            $operator = Operator::where('token', $token)->first();
            if(!is_null($operator)){
                $operator->confirmed = 1;
                $operator->token = '';
                $operator->save();
                return redirect($operator->tenant_domain.'/operator/login')->with('status', 'Your activation is completed.');
            }
            return redirect($operator->tenant_domain.'/operator/login')->with('status','Something went wrong.');
        }


    
}
