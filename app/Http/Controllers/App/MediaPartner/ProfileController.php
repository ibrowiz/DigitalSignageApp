<?php
namespace App\Http\Controllers\App\MediaPartner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\Operator;
use App\Models\Country;
use App\Models\Location;
use App\Scopes\Facade\TenantManagerFacade as TenantManager;

class ProfileController extends Controller {
	/*public function edit(Request $request) {
		$user_id = Auth::user()->id;

		$user = Admin::find($user_id);

		return view('app.profile.edit', compact('user'));
	}*/

	public function __construct()
    {
        $this->middleware('auth:operator');
    }

	  public function edit($id)
    {
         $operator = Operator::find(Auth::user()->id);
         $countries = Country::all();
        $locations = Location::all();       
       
            return view('app.mediapartner.profile', compact('operator','countries','locations'));
    }

	public function update(Request $request,$tenant,$id) {
		$this->validate($request, [
			'firstname' => 'required',
			'lastname'  => 'required',
			'email' => 'required|email|unique:users,email',
		]);

		$details = $request->all();

		$operator =Operator::find($id);

		$operator->first_name = $details['firstname'];
		$operator->last_name = $details['lastname'];
		$operator->email = $details['email'];

		$operator->update();

		return back()->with('flash_message', 'Profile Updated');
	}


	public function updateTenantProfile(Request $request,$tenant,$id) {
		$this->validate($request, [
			'phone'  => 'required|numeric|max:11',
			'email' => 'required|email|unique:users,email,'.$id,
			'address' => 'required|string|max:225',
		]);

		//$details = $request->all();

		//$operator =Operator::find($id);

		//return dd($operator);

		//$tenanProfile = $operator->tenant->get();
		$tenant = TenantManager::get();
		$tenantProfile = $tenant->tenantProfile->first();
		$tenantProfile->phone = $request->phone;
		$tenantProfile->contact_email = $request->email;
		$tenantProfile->address = $request->address;
		$tenantProfile->country_id = $request->country;
		$tenantProfile->location_id = $request->state;

		$tenantProfile->save();

		return back()->with('flash_message', 'Profile Updated');
	}

	public function updatePassword(Request $request,$tenant,$id) {

		$operator = Operator::find($id);

		$this->validate($request, [
			'password' => 'required|min:6|confirmed',
		]);

		if (Hash::check($request->old_password, $operator->password)) {
			$operator = Operator::find($id);
			$operator->password = Hash::make($request->password);
			$operator->update();

			return back()->with('flash_message', 'Password Updated');
		} else {
			return back()->with('danger_message', 'Password not correct');
		}
	}
}
