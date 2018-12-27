<?php
namespace App\Http\Controllers\App\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\Admin;

class ProfileController extends Controller {
	/*public function edit(Request $request) {
		$user_id = Auth::user()->id;

		$user = Admin::find($user_id);

		return view('app.profile.edit', compact('user'));
	}*/

	public function __construct()
    {
        $this->middleware('auth:admin');
    }

	  public function edit($id)
    {
         $admin = admin::find(Auth::user()->id);       
       
            return view('app.admin.profile', compact('admin'));
    }

	public function update(Request $request, $id) {
		$this->validate($request, [
			'firstname' => 'required',
			'lastname'  => 'required',
			//'email' => 'required|email|unique:users,email',
		]);

		$details = $request->all();

		$user =Admin::find($id);

		$user->firstname = $details['firstname'];
		$user->lastname = $details['lastname'];
		//$user->email = $details['email'];

		$user->update();

		return back()->with('flash_message', 'Profile Updated');
	}

	public function updatePassword(Request $request, $id) {

		$user = Admin::find($id);

		$this->validate($request, [
			'password' => 'required|min:5|confirmed',
		]);

		if (Hash::check($request->old_password, $user->password)) {
			$user = Admin::find($id);
			$user->password = Hash::make($request->password);
			$user->update();

			return back()->with('flash_message', 'Password Updated');
		} else {
			return back()->with('danger_message', 'Password not correct');
		}
	}
}
