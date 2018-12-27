<?php
namespace App\Http\Controllers\App\Client;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Redirect;

use App\Models\Resource;
use App\Models\Content;
use App\Models\LayoutTemplate;
use Auth;

class LayoutTemplateController extends Controller
{

	public function __construct() 
	{
        $this->middleware('auth');
    }

 	public function index(Request $request){

    	$templates = LayoutTemplate::all();

    	// dd($templates);

    	return view('app.client.layout-template.index', ['templates'=>$templates]);
    }

    public function Create(Request $request){
    	$resources = Resource::all();
         $contents = Content::all();

        

        return view('app.client.layout-template.home', ['resources'=>$resources, 'contents'=>$contents]);
    }


	public function save(Request $request){

		 LayoutTemplate::create(['file_name'=>$request->file_name,'layout'=>$request->canvas, 'image' => $request->image,  'category'=>'Adult', 'type'=>'Telecommunication', 'orientation'=>$request->orientation]);
    	\Log::info($request);

        $template = LayoutTemplate::all();

        // return view('app.templates.index');
	}     

	public function edit($domain,$id){

    	$resources = Resource::all();
        $contents = Content::all();
        $template = LayoutTemplate::find($id);      

        return view('app.client.layout-template.edit', ['resources'=>$resources, 'contents'=>$contents, 'template'=>$template]);
    }

}