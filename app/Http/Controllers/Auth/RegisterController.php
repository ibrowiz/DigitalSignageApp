<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\ClientProfile;
use App\Models\Tenant;
use App\Models\ContentOwnerWallet;
use App\Models\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;


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

    public function showLoginForm($name){
        $tenant = Tenant::where('domain',$name) -> first();

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
        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contact' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $input = $request->all();
        // $validator = $this->validator($input);
        $clientProfile = ClientProfile::create([
            'name' => $request->input('name'),
            'contact_email' => $request->input('contact'),
            'address' => $request->input('address'),
        ]);

        $data = $this->create($input)->toArray();
        $data['token'] = str_random(25);
        $data['client_id'] =  $clientProfile->id;
        $data['tenant_id'] = $request->input('tenantId');
        $data['tenant_domain'] = $request->input('tenantDomain');


        $user = User::find($data['id']);
        $user->token = $data['token'];
        $user->client_id = $data['client_id'];
        $user->tenant_id = $data['tenant_id'];
        $user->tenant_domain = $data['tenant_domain'];

        $user->save();

        $wallet = Wallet::create([
            'assignable_id' => $clientProfile->id, 
            'assignable_type' => 'App\Models\ContentOwner',
            'amount' => 0,
            'last_transaction' => 0,
            'last_transaction_type' => NULL,
        ]);

         $point = Point::create([
            'user_id' => $tenant->id, 
            'type' => 'ContentOwner',
            'last_added_point' => 0,
            'total_point' => 0,
        ]);

        Mail::send('auth.mails.confirmation', $data, function($message) use($data){
            $message->to($data['email']);
            $message->subject('Registration Confirmation');
        });
            //return dd($request->input('tenantDomain'));
        //return redirect(route('login'))->with('status', 'Confirmation email has been sent. Please check your email.' );
        return redirect($user->tenant_domain.'/login')->with('status', 'Confirmation email has been sent. Please check your email.' );
    
        
    }

        public function confirmation($token)
        {
            $user = User::where('token', $token)->first();
            if(!is_null($user)){
                $user->confirmed = 1;
                $user->token = '';
                $user->save();
                return redirect($user->tenant_domain.'/login')->with('status', 'Your activation is completed.')->with('error_code', 5);
            }
            return redirect($user->tenant_domain.'/login')->with('status','Something went wrong.');
        }
}
