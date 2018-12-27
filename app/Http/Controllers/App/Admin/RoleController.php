<?php

namespace App\Http\Controllers\App\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller {

	public function __construct()
    {
        $this->middleware('auth:admin');
    }

	public function index() {
		$roles = Role::paginate(10);

		return view('app.admin.role.index', compact('roles'));
	}

	public function create() {

		$permissions = Permission::get();

		return view('app.admin.role.create', compact('permissions'));
	}

	public function store(Request $request) {
		$this->validate($request, [
            'name' => 'required|string|max:255|unique:roles',
            'label' => 'required|string|max:255|unique:roles',
            'description' => 'required|string|max:255',
        ]);

		$data = $request->all();

		$role = Role::create([
			'name' => $data['name'],
			'label' => $data['label'],
			'description' => $data['description'],
        ]);

        if($request->has('permission')){

        	// foreach($request->permission as $perm){
        	// 	$perm = Permission::find($perm);
        	// 	$role->give($perm);

        	// }

        	$role->Permissions()->sync($request->permission);

        }

		return redirect('admin/role')->with('flash_message', 'Roles created');
	}


	public function show($id) {

		$permissions = Permission::get();

		$role = Role::with('permissions')->find($id);

		// dd($role->hasPermission('create'));

		return view('app.admin.role.show', compact('role','permissions'));

	}

	public function edit($id) {

		$permissions = Permission::get();

		$role = Role::with('Permissions')->find($id);

		// dd($role->hasPermission('create'));

		return view('app.admin.role.edit', compact('role','permissions'));

	}

	public function update(Request $request, $id)
    {
         $this->validate($request,[
            'name' => 'required',
            'label' => 'required',
            'description' => 'required',
            
                ]);
                 /*$data = array(
                    'device_name' => $request->input('deviceName'),
                    'room_id' => $request->input('roomName'),
                    'platform' => $request->input('platform'),
                    'description' => $request->input('description')
                 );
                 Device::where('id',$id)->update($data);
                 
            return redirect('/device')->with('info', 'Device updated Successfully');*/
            $details = $request->all();

		$role = Role::find($id);

		$role->name = $details['name'];
		$role->label = $details['label'];
		$role->description = $details['description'];
		//$role->isAdmin = isset($details['isAdmin']) ? 1 : 0;
		$role->update();
		if($request->has('permission')){


        	$role->Permissions()->sync($request->permission);

        } 
        else{
        	$role->Permissions()->detach();
        }

		return redirect('admin/role')->with('flash_message', 'role Updated');

    }

	public function delete(Request $request) {

	}
}
