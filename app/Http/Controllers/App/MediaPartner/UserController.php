<?php

namespace App\Http\Controllers\App\MediaPartner;
use App\Models\Operator;
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
        $this->middleware('auth:operator');
    }

      public function index()
     {

        //$tenant = Tenant::where('email','!=', Auth::user()->email)->where('tenant_domain', Auth::user()->tenant_domain)->get();
    
        return view('app.mediapartner.operator.index');

    }

    public function create()
        
    {
    	return view('app.mediapartner.operator.create');
    }


    public function storeOperator(Request $request)
    {


        $this->validate($request,[
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'email' => 'required|string|email|max:30|unique:operators,email',   
        ]);

             $rand1 = str_random(25);
             $rpass = str_random(7);
             $operator = Operator::create([
            'tenant_id' => Auth::user()->tenant_id, // Notice the Tenant ID here
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => bcrypt($rpass),
            'confirmed' => false,
            'super_admin' => false,
            'token' => $rand1,
        ]);


           $data = $operator->toArray();
           $data['unhashedpassword'] = $rpass;

            Mail::send('app.mediapartner.mails.usr_confirmation',$data, function($message) use($data){
                $message->to($data['email']);
                $message->subject('Registration Confirmation');
            });
        
        
             
        return redirect('mediapartner/'.Auth::user()->tenant->domain.'/operators')->with('flash_message', 'User Added.' );
    }

      public function edit($domain,$id)
    {
        //$operator = Auth::user()->first();
        
        $operator= Operator::where('id',$id)->first(); 
               
         //$adminuser = Admin::find($id);
          //$roles = Role::all();
       
         return view('app.mediapartner.operator.edit', compact('operator'));

    }


    public function update(Request $request,$domain, $id)
    {
       $this->validate($request,[
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            //'email' => 'required|string|email|max:30',
            
        ]);

         $data = array(
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            //'email' => $request->input('email')
         );
          
          $operator = Operator::find($id);

         $operator->update($data);
 
        return redirect('mediapartner/'.Auth::user()->tenant->domain.'/operators')->with('flash_message', 'update Successful');
    }

     public function confirmation($token)
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
