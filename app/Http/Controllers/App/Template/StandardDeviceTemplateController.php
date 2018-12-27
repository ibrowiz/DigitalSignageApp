<?php

namespace App\Http\Controllers\App\Template;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StandardDeviceTemplate;
use App\Models\Admin;
use Auth;
class StandardDeviceTemplateController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:admin');
    }
    

	public function index()
	{
		$standardDeviceTemplates = StandardDeviceTemplate::all();
		$admin = Admin::where('id',Auth::user()->id)->first();
		return view('app.standardtemplate.index',compact('standardDeviceTemplates','admin'));
	} 


	 public function edit($id)
    {
        $standardDeviceTemplate = StandardDeviceTemplate::find($id);
		$admin = Admin::where('id',Auth::user()->id)->first();
        return view('app.standardtemplate.edit', compact('standardDeviceTemplate','admin'));
    }


}
