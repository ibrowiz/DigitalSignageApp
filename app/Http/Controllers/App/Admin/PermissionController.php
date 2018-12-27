<?php

namespace App\Http\Controllers\App\Admin;


use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller {

	public function __construct()
    {
        $this->middleware('auth:admin');
    }


	public function index() {
		$permissions = Permission::all();

		return view('app.admin.permission.index', compact('permissions'));
	}

	public function create() {
		return view('app.admin.permission.create');
	}

	public function store(Request $request) {
		$this->validate($request, [
            'name' => 'required|string||max:25|unique:permissions,name',
            'label' => 'required|string|max:25|unique:permissions,label',
            'description' => 'required|string|max:255',
        ]);

		$data = $request->all();

		Permission::create([
			'name' => $data['name'],
			'label' => $data['label'],
			'description' => $data['description'],
        ]);

		return redirect('admin/permission')->with('flash_message', 'Permission created');
	}

	public function show($id) {

	}

	public function edit($id) {

	}

	public function delete(Request $request) {

	}
}
