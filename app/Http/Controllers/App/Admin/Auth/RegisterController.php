<?php

namespace App\Http\Controllers\App\Admin\Auth;

use App\Models\User;
use App\Models\Admin;
use App\Models\Role;
use App\Models\ClientProfile;
use App\Models\Tenant;
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



    protected $redirectTo = '/home';



     public function __construct()
    {
        $this->middleware('auth:admin');
    }


     public function index()
     {
        $admin = Admin::where('id',Auth::user()->id)->first();

        $admins = Admin::where('email','!=', Auth::user()->email)->where('super_admin',0)->get();
    
        return view('app.admin.users-index', compact('admins','admin'));

    }

        

        public function create()
        
    {
        $admin = Admin::where('id',Auth::user()->id)->first();
        return view('app.admin.create-users',compact('admin'));
    }


     public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'email' => 'required|string|email|max:30|unique:admins,email',
    

        ]);

             $rand1 = str_random(25);
             $rpass = str_random(7);
             $admin = Admin::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' =>$request->input('email'),
            'password' => bcrypt($rpass),
            'confirmed' => false,
            'super_admin'=> false,
            'token' => $rand1,
            ]);

             //return dd($admin->token.' '.$rand1);

         


       /* $admin = new Admin;
        $admin->firstname = $request->input('firstname');
        $admin->lastname = $request->input('lastname');

        $admin->email = $request->input('email');
        $admin->password = bcrypt($request->input('password'));
        $admin->save();*/

        $data = $admin->toArray();
           $data['unhashedpassword'] = $rpass;

            Mail::send('app.admin.mails.confirmation',$data, function($message) use($data){
                $message->to($data['email']);
                $message->subject('Registration Confirmation');
            });
        
       // return redirect('admin/login')->with('status', 'Confirmation email has been sent. Please check your email.');

        return redirect('/admin/users/index')->with('flash_message', 'User added');
    }


     public function edit($id)
    {
        $admin = Admin::where('id',Auth::user()->id)->first();             
         $adminuser = Admin::find($id);
          //$roles = Role::all();
       
         return view('app.admin.edit-users', compact('adminuser','admin'));

    }


    public function update(Request $request, $id)
    {
       $this->validate($request,[
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            //'email' => 'required|string|email|max:30',
            
        ]);

         $data = array(
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            //'email' => $request->input('email')
         );
          
          $user = Admin::find($id);

         $user->update($data);


            /*if($request->has('role')){


                 $user->adminRoles()->sync($request->role);

                } 
                else{
                  $user->adminRoles()->detach();
                }*/
         
        return redirect('/admin/users/index')->with('flash_message', 'update Successful');
    }

     public function confirmation($token)
        {
        
             $admin = Admin::where('token', $token)->first();
             //if(!is_null($admin)){
             $admin->confirmed = true;
             $admin->token = '';
             $admin->update();
             //return dd($admin);
             return redirect('/admin/login')->with('status', 'Your activation is completed.');
         //}
            /*$admin = Admin::where('token', $token)->first();
            return dd($admin);
            if(!is_null($admin)){
                $admin->confirmed = true;
                $admin->token = '';
                $admin->update();
                return redirect('/admin/login')->with('status', 'Your activation is completed.');
            }
            return redirect('/admin/login')->with('status','Something went wrong.');*/
            //return redirect('/admin/login')->with('status','Something went wrong.');
        }


  /*  public function __construct()
    {
        $this->middleware('guest');
    }




    public function showLoginForm($name){
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





    protected function validator(array $data)
    {
        return Validator::make($data, [
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
    }*/
}
