<?php

namespace App\Http\Controllers\App\Client\Auth;

use App\Models\User;
use App\Models\ClientProfile;
use App\Models\Tenant;
use App\Models\ContentOwnerWallet;
use App\Models\Country;
use App\Models\Client;
use App\Models\ClientWallet;
use App\Models\ClientWalletLog;
use App\Models\TopUpTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use App\Scopes\Facade\TenantManagerFacade as TenantManager;

use Auth;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function showLoginForm(){

        //$tenant = Tenant::where('domain',$name) -> first();
        return view('auth.login2',compact('tenant'));
    }


      /*    public function store(Request $request)
    {
        //return dd($request->input('tenantDomain'));
        //$tenant = Tenant::where('domain',$name) -> first();
         $clientProfile = ClientProfile::create([
            'name' => $request->input('name'),
            'contact_email' => $request->input('contact'),
            'address' => $request->input('address'),
        ]);

        // Now you have a clientprofile object so we can use that for the contact model

        $user = User::create([
            'client_id' => $clientProfile->id, // Notice the clientprofile ID here
             'tenant_id' => $request->input('tenantId'),
                'tenant_domain' =>$request->input('tenantDomain'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' =>bcrypt($request->input('password')),
        ]);


        return redirect('/');   
         }*/

     public function showRegForm(){
        //$tenant = Tenant::where('domain',$name) -> first();
        $countries = Country::all();
        return view('app.client.register',compact('countries'));
    }

    
    protected function validator(array $data)
    {
        return $this->validate($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

     protected function register(Request $request)
    {
          
         /* $this->validate($request, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email|max:255',
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'mgr_firstname' => 'string|max:255',
            'mgr_lastname' => 'string|max:255',
            'mgr_email' => 'string|email|max:255',
        ]);*/
    $tenant = TenantManager::get();
    //
    //return dd($tenant->domain);
       
        if($request->has('manager'))

        {
            //return dd($request->input('mgr_firstname').' '.$request->input('mgr_lastname'));
            //
             $client = Client::create([
            'tenant_id' =>$tenant->id,
            'name' => $request->input('name'),
            'email' => $request->input('mgr_email'),
            'status' => '1',
        ]);

            $clientProfile = ClientProfile::create([
            'client_id' => $client->id, // Notice the Tenant ID here
            'phone' => $request->input('phone'),
            'contact_email' => $request->input('mgr_email'),
            'contact_person' => $request->input('mgr_firstname')." ". $request->input('mgr_lastname'),
            'address' =>$request->input('address'),
            'country_id' =>$request->input('country'),
            'location_id' =>$request->input('state'),
        
        ]);

            $rand2 = str_random(25);
             $user2 = User::create([
            'client_id' => $client->id, // Notice the Tenant ID here
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            'email' =>$request->input('email'),
            'password' => bcrypt($request->input('password')),
            'confirmed' => false,
            'super_admin' => false,
            'token' => $rand2,
        ]);

            $rand1 = str_random(25);
             $rpass = str_random(7);
             $user1 = User::create([
            'client_id' => $client->id, // Notice the Tenant ID here
            'first_name' => $request->input('mgr_firstname'),
            'last_name' => $request->input('mgr_lastname'),
            'email' =>$request->input('mgr_email'),
            'password' => bcrypt($rpass),
            'confirmed' => false,
            'super_admin' => true,
            'token' => $rand1,

            ]);


           $data1 = $user1->toArray();
           $data1['unhashedpassword'] = $rpass;
           $data2 = $user2->toArray();

          

            Mail::send('app.client.mails.mgr_confirmation',$data1, function($message) use($data1){
                $message->to($data1['email']);
                $message->subject('Registration Confirmation');
            });

             Mail::send('app.client.mails.confirmation',$data2, function($message) use($data2){
                $message->to($data2['email']);
                $message->subject('Registration Confirmation');
            });
                     }
         else
         {
            
             $client = Client::create(
              [
            'tenant_id' =>$tenant->id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'status' => '1',
               ]);

           $clientProfile = ClientProfile::create(
            [
              'client_id' => $client->id, // Notice the Tenant ID here
              'phone' => $request->input('phone'),
              'contact_email' => $request->input('email'),
              'contact_person' => $request->input('firstname')." ".$request->input('lastname'),
              'address' =>$request->input('address'),
              'country_id' =>$request->input('country'),
              'state_id' =>$request->input('state'),
            ]);

            $rand = str_random(25);
            $user = User::create(
            [
                'client_id' => $client->id, // Notice the Tenant ID here
                'first_name' => $request->input('firstname'),
                'last_name' => $request->input('lastname'),
                'email' =>$request->input('email'),
                'password' => bcrypt($request->input('password')),
                'confirmed' => false,
                'super_admin' => true,
                'token' => $rand,
            ]);



            $data = $user->toArray();

            Mail::send('app.client.mails.confirmation', $data, function($message) use($data){
                $message->to($data['email']);
                $message->subject('Registration Confirmation');
            });
            

         }

          $wallet = ClientWallet::create(
            [
                'client_profile_id' => $clientProfile->id, 
                'currency_id' =>1,
                'cash' => 0.00,
                'point' =>0.00,
                'bonus' =>0.00,
                'bonus_flag' => false,
                'point_flag' => false,
            ]);

            $walletLog = ClientWalletLog::all();
            $top = TopUpTransaction::all();

          if($top->count() == 0){
             $topUpTrans = TopUpTransaction::create(
            [
                'client_profile_id' => $clientProfile->id, 
                'currency_id' =>1,
                'cash' => 0.00,
                'point' =>0.00,
                'bonus' =>0.00,
                'bonus_flag' => false,
                'point_flag' => false,
            ]);
           }else
           {}

            if($walletLog->count() == 0)
              {

             $wallet = ClientWalletLog::create(
            [
                'client_wallet_id' =>0,
                'action' =>null,
                'transaction_id' =>0,
                'type' =>null,
                'amount'=>0.00,
                'status'=>null,
                'wallet_worth'=>0.00,
                'last_wallet_log'=>0,
                'operation' => '{"type": " ", "amount": " "}',
            ]);
              }
              else
              {}
             



          return redirect('client/'.$tenant->domain.'/login')->with('status', 'Confirmation email has been sent. Please check your email.' );
     
     }
   
        public function confirmation($token)
        {
            $user = User::where('token', $token)->first();

            if(!is_null($user)){
                
                $user->confirmed = true;
                $user->token = '';
                $user->update();
                return redirect('client/'.$user->client->tenant->domain.'/login')->with('status', 'Your activation is completed.');
            }
                return redirect('client'.$user->client->tenant->domain.'/login')->with('status','Something went wrong.');
        }
}
