<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Resource;
use App\Models\Content;
use App\Models\LayoutTemplate;

class TemplateController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){

    	$templates = LayoutTemplate::all();

    	// dd($templates);

    	return view('app.templates.index', ['templates'=>$templates]);
    }

    public function Create(Request $request){
    	$resources = Resource::all();
         $contents = Content::all();

        

        return view('app.templates.home', ['resources'=>$resources, 'contents'=>$contents]);
    }


	public function save(Request $request){

		 LayoutTemplate::create(['file_name'=>$request->file_name,'layout'=>$request->canvas, 'image' => $request->image,  'category'=>'Adult', 'type'=>'Telecommunication', 'orientation'=>$request->orientation]);
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
