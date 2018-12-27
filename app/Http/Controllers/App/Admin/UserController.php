<?php

namespace App\Http\Controllers\App\Admin;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use auth;
use Email;



class UserController extends Controller
{

use RegistersUsers;

	 public function __construct()
    {
        $this->middleware('auth:admin');
    }


     public function index()
     {
        $admin = Admin::where('id',Auth::user()->id)->first();

        $admins = Admin::where('email','!=', Auth::user()->email)->get();
    
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
            'email' => 'required|string|max:255',
            /*'password' => 'required|string|max:8',*/

        ]);

             $rand1 = str_random(25);
             $rpass = str_random(7);
             $admin = Admin::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' =>$request->input('email'),
            'password' => bcrypt($rpass),
            'confirmed' => false,
            'super_admin' => false,
            'token' => $rand1,

            ]);


           $data = $admin->toArray();
           $data['unhashedpassword'] = $rpass;

            Mail::send('app.admin.mails.confirmation',$data, function($message) use($data){
                $message->to($data1['email']);
                $message->subject('Registration Confirmation');
            });
        


       /* $admin = new Admin;
        $admin->firstname = $request->input('firstname');
        $admin->lastname = $request->input('lastname');

        $admin->email = $request->input('email');
        $admin->password = bcrypt($request->input('password'));
        $admin->save();*/

        return redirect('/admin/users/index')->with('flash_message', 'User added');
    }


     public function edit($id)
    {
        return dd('in here');
        $admin = Admin::where('id',Auth::user()->id)->first(); 
        $roles = Role::all();
        return dd($roles);           
         $adminuser = Admin::find($id);
       
         return view('app.admin.edit-users', compact('adminuser','admin', 'roles'));

    }


    public function update(Request $request, $id)
    {
       $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            
        ]);

         $data = array(
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email')
         );
         
         Admin::where('id',$id)->update($data);
         
        return redirect('/admin/users/index')->with('flash_message', 'update Successful');
    }

     public function confirmation($token)
        {
            $admin = Admin::where('token', $token)->first();
            if(!is_null($admin)){
                $admin->confirmed = true;
                $admin->token = '';
                $admin->save();
                return redirect('/admin')->with('status', 'Your activation is completed.');
            }
            return redirect('/admin')->with('status','Something went wrong.');
        }

}
