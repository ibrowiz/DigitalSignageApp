<?php
namespace App\Http\Controllers\App\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\user;
use App\Models\ClientProfile;
use App\Models\Country;
use App\Models\Location;

class ProfileController extends Controller {
	/*public function edit(Request $request) {
		$user_id = Auth::user()->id;

		$user = Admin::find($user_id);

		return view('app.profile.edit', compact('user'));
	}*/

	public function __construct()
    {
        $this->middleware('auth');
    }

	  public function edit($id)
    {
         $user = User::find(Auth::user()->id);   

         $countries = Country::all();
         $locations = Location::all();    
       
         return view('app.client.profile', compact('user','countries','locations'));
    }

	public function update(Request $request,$tenant,$id) {


		$this->validate($request, [
			/*'firstname' => 'required',
			'lastname'  => 'required',
			'email' => 'required|email|unique:users,email,'.$id,*/
		]);

		//return dd($request->all());

		$details = $request->all();

		$user = User::find($id);

		$user->first_name = $details['firstname'];
		$user->last_name = $details['lastname'];
		//$user->email = $details['email'];

		$user->update();

		return back()->with('flash_message', 'Profile Updated');
	}

	public function updateClientProfile(Request $request,$tenant,$id) {

		$this->validate($request, [
			//'firstname' => 'required',
			//'lastname'  => 'required',
			'email' => 'required',
		]);

		//return dd('in here');

		$clientProfile = ClientProfile::where('client_id',$id)->first();

		$clientProfile->phone = $request->phone;
		$clientProfile->contact_email = $request->email;
		$clientProfile->address = $request->address;
		$clientProfile->country_id = $request->country;
		$clientProfile->location_id = $request->state;

		$clientProfile->update();

		return back()->with('flash_message', 'Profile Updated');
	}

	public function updatePassword(Request $request,$tenant,$id) {

		$user = User::find($id);

		$this->validate($request, [
			'password' => 'required|min:6|confirmed',
		]);

		if (Hash::check($request->old_password, $user->password)) {
			$user = User::find($id);
			$user->password = Hash::make($request->password);
			$user->update();

			return back()->with('flash_message', 'Password Updated');
		} else {
			return back()->with('danger_message', 'Password not correct');
		}
	}
}
