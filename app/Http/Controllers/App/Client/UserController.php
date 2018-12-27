<?php

namespace App\Http\Controllers\App\Client;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use Auth;


class UserController extends Controller
{

    use RegistersUsers;

     public function __construct()
    {
        $this->middleware('auth');
    }

      public function index()
     {

        $users = User::where('email','!=', Auth::user()->email)->where('client_id', Auth::user()->client_id)->get();

        //$client = Client::find(Auth::user()->client_id);
        //$users = $client->users()->get();
    
        return view('app.client.users-index', compact('users'));

    }

    public function create()
        
    {
        return view('app.client.create-users');
    }


    public function storeUsers(Request $request)
    {


        $this->validate($request,[
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'email' => 'required|string|max:255',   
        ]);

             $rand1 = str_random(25);
             $rpass = str_random(7);
             $user = User::create([
            'client_id' => Auth::user()->client_id, // Notice the Tenant ID here
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => bcrypt($rpass),
            'confirmed' => false,
            'super_admin' => false,
            'token' => $rand1,
        ]);


           $data = $user->toArray();
           $data['unhashedpassword'] = $rpass;

            Mail::send('app.client.mails.usr_confirmation',$data, function($message) use($data){
                $message->to($data['email']);
                $message->subject('Registration Confirmation');
            });
        
        
             
        return redirect('client/'.$user->client->tenant->domain.'/users')->with('flash_message', 'User added');
    }

   /*  public function confirmation($token)
        {
            $operator = Operator::where('token', $token)->first();
            if(!is_null($operator)){
                $operator->confirmed = true;
                $operator->token = '';
                $operator->save();
                return redirect('mediapartner/'.$operator->tenant->domain.'/login')->with('status', 'Your activation is completed.');
            }
            return redirect('mediapartner'.$operator->tenant->domain.'/login')->with('status','Something went wrong.');
        }


}


/*class UserController extends Controller
{
   
     public function __construct()
    {
        $this->middleware('auth');
    }

      public function index()
     {

        $users = User::where('email','!=', Auth::user()->email)->where('tenant_domain', Auth::user()->tenant_domain)->get();
    
        return view('app.client.users-index', compact('users'));

    }

  public function create()
        
    {
        return view('app.client.create-users');
    }


 public function getBusinessTypeList(Request $request)
    {
        $business = BusinessType::where("business_category_id",$request->business_category_id)
                    ->pluck("name","id");
        return response()->json($business);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
           
        ]);

        $user = User::create([
            'client_id' => Auth::user()->client_id,
            'tenant_id' => Auth::user()->tenant_id,
            'tenant_domain' => Auth::user()->tenant_domain,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' =>bcrypt($request->input('password')),
        ]);
           
        return redirect('/contentowner/index');
    }
*/
}
