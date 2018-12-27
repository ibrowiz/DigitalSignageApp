<?php

namespace App\Http\Controllers\App\MediaPartner\Auth;

use App\Models\User;
use App\Models\ClientProfile;
use App\Models\Tenant;
use App\Models\Country;
use App\Models\TenantProfile;
use App\Models\Operator;
use App\Models\Wallet;
use App\Models\WalletLog;
use App\Models\TopUpTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
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

    public function showRegForm()
    {

        $countries = Country::all();
        return view('app.mediapartner.register',compact('countries'));
    }


     public function create()
        
    {
      return view('app.mediapartner.operator.create');
    }


    protected function register(Request $request)
    {
          
          $this->validate($request, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email|max:30|unique:operators,email',
            'phone' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
            'mgr_firstname' => 'string|max:20',
            'mgr_lastname' => 'string|max:20',
            'mgr_email' => 'string|email|max:30|unique:operators,email',
        ]);
  
       
        if($request->has('manager'))

        {
            //return dd($request->input('mgr_firstname').' '.$request->input('mgr_lastname'));
            //
             $tenant = Tenant::create([
            'name' => $request->input('name'),
            'domain' => $request->input('domain'),
            'email' => $request->input('mgr_email'),
            'status' => '1',
        ]);

            $tenantProfile = TenantProfile::create([
            'tenant_id' => $tenant->id, // Notice the Tenant ID here
            'phone' => $request->input('phone'),
            'contact_email' => $request->input('mgr_email'),
            'contact_person' => $request->input('mgr_firstname')." ". $request->input('mgr_lastname'),
            'address' =>$request->input('address'),
            'country_id' =>$request->input('country'),
            'location_id' =>$request->input('state'),
        
        ]);

            $rand2 = str_random(25);
             $operator2 = Operator::create([
            'tenant_id' => $tenant->id, // Notice the Tenant ID here
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
             $operator1 = Operator::create([
            'tenant_id' => $tenant->id, // Notice the Tenant ID here
            'first_name' => $request->input('mgr_firstname'),
            'last_name' => $request->input('mgr_lastname'),
            'email' =>$request->input('mgr_email'),
            'password' => bcrypt($rpass),
            'confirmed' => false,
            'super_admin' => true,
            'token' => $rand1,

            ]);


           $data1 = $operator1->toArray();
           $data1['unhashedpassword'] = $rpass;
           $data2 = $operator2->toArray();

          

            Mail::send('app.mediapartner.mails.mgr_confirmation',$data1, function($message) use($data1){
                $message->to($data1['email']);
                $message->subject('Registration Confirmation');
            });

             Mail::send('app.mediapartner.mails.confirmation',$data2, function($message) use($data2){
                $message->to($data2['email']);
                $message->subject('Registration Confirmation');
            });
                     }
         else
         {
            
             $tenant = Tenant::create(
              [
                'name' => $request->input('name'),
                'domain' => $request->input('domain'),
                'email' => $request->input('email'),
                'status' => '1',
               ]);

           $tenantProfile = TenantProfile::create(
            [
              'tenant_id' => $tenant->id, // Notice the Tenant ID here
              'phone' => $request->input('phone'),
              'contact_email' => $request->input('email'),
              'contact_person' => $request->input('firstname')." ".$request->input('lastname'),
              'address' =>$request->input('address'),
              'country_id' =>$request->input('country'),
              'state_id' =>$request->input('state'),
            ]);

            $rand = str_random(25);
            $operator = Operator::create(
            [
                'tenant_id' => $tenant->id, // Notice the Tenant ID here
                'first_name' => $request->input('firstname'),
                'last_name' => $request->input('lastname'),
                'email' =>$request->input('email'),
                'password' => bcrypt($request->input('password')),
                'confirmed' => false,
                'super_admin' => true,
                'token' => $rand,
            ]);



            $data = $operator->toArray();

            Mail::send('app.mediapartner.mails.confirmation', $data, function($message) use($data){
                $message->to($data['email']);
                $message->subject('Registration Confirmation');
            });
            

         }


            $wallet = Wallet::create(
            [
                'tenant_profile_id' => $tenantProfile->id, 
                'currency_id' =>1,
                'cash' => 0.00,
                'point' =>0.00,
                'bonus' =>0.00,
                'bonus_flag' => false,
                'point_flag' => false,
            ]);

            $walletLog = WalletLog::all();
            $top = TopUpTransaction::all();

          if($top->count() == 0){
             $topUpTrans = TopUpTransaction::create(
            [
                'tenant_profile_id' => $tenantProfile->id, // Notice the Tenant ID here
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

             $wallet = WalletLog::create(
            [
                'wallet_id' =>0,
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
             




            
            return redirect('mediapartner/'.$request->input('domain').'/login')->with('status', 'Confirmation email has been sent. Please check your email.' );
     

    }

        public function confirmation($token)
        {
            $operator = Operator::where('token', $token)->first();
            if(!is_null($operator)){
                $operator->confirmed = true;
                $operator->token = '';
                $operator->update();
                return redirect('mediapartner/'.$operator->tenant->domain.'/login')->with('status', 'Your activation is completed.');
            }
            return redirect('mediapartner'.$operator->tenant->domain.'/login')->with('status','Something went wrong.');
        }



    /*public function showLoginForm($name){
        $tenant = Tenant::where('domain',$name) -> first();

        return view('auth.login2',compact('tenant'));
    }

          public function store(Request $request)
    {
        //$tenant = Tenant::where('domain',$name) -> first();
         $clientProfile = ClientProfile::create([
            'name' => $request->input('name'),
            'contact_email' => $request->input('contact'),
            'address' => $request->input('address'),
        ]);

        // Now you have a clientprofile object so we can use that for the contact model

        $user = User::create([
            'client_id' => $clientProfile->id, // Notice the clientprofile ID here
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'tenant' => $request->input('tenant'),
            'password' =>bcrypt($request->input('password')),
        ]);


        return redirect('/');   
         }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
  /*  protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
*/
    
}

