<?php

namespace App\Http\Controllers\App\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Admin;


use App\Models\Resource;
use App\Models\Content;
use App\Models\LayoutTemplate;

class LayoutTemplateController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){

    	$templates = LayoutTemplate::all();
    	return view('app.admin.layout-template.index', ['templates'=>$templates]);
    }

    public function create(){

    	$resources = Resource::all();
        $contents = Content::all();

        // print_r($resources); die;

        return view('app.admin.layouttemplate.create', ['resources'=>$resources, 'contents'=>$contents]);
    }


	public function save(Request $request){

		 LayoutTemplate::create(['file_name'=>$request->file_name,'layout'=>$request->canvas, 'image' => $request->image,  'category'=>$request->category, 'type'=>$request->type, 'orientation'=>$request->orientation]);
    	\Log::info($request);

        $template = LayoutTemplate::all();

        // return view('app.templates.index');
	}     

	public function edit($id){
    	$resources = Resource::all();
        $contents = Content::all();
        $template = LayoutTemplate::find($id);

        

        return view('app.templates.edit', ['resources'=>$resources, 'contents'=>$contents, 'template'=>$template]);
    }
}
