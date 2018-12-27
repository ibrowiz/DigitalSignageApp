<?php

namespace App\Http\Controllers\App\Template;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessType;
use App\Models\BusinessCategory;
use App\Models\ContentCategory;
use App\Models\Admin;
use App\Models\Content;
use App\Models\StandardDeviceTemplate;
use App\Models\Template;
use Auth;
//use App\Scopes\Facade\TenantManagerFacade as TenantManager;

class TemplateController extends Controller
{

 public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $templates = Template::all();
        $admin = Admin::where('id',Auth::user()->id)->first();
        return view('app.template.index',compact('templates','admin'));
    } 

    public function create()
    {
        $contentCategories = ContentCategory::all();
        $contents = Content::all();
        return view('app.template.create',compact('contents','contentCategories'));
    }


     public function store(Request $request) {

    	$template = Template::create([
    		'name' => $request->input('name'),
    		'admin_id' =>Auth::user()->id,
            'content_category_id' => $request->input('contentCategory'),
            'content_id' => $request->input('contents'),
            'public_content_allowed' => $request->has('publicContent'),
    		]);
    	

        foreach ($request->content as $index => $content) {
            $template->contents()->save(Content::find($content), ['status' => $request->status[$index]]);
        }

        return redirect('/admin/template/index')->with('flash_message', 'Template Saved');
    }

 public function edit($id)
    {
        $template = Template::find($id);
        $admin = Admin::where('id',Auth::user()->id)->first();
        $contents = Content::all();  
        $contentCategories = ContentCategory::all();
        return view('app.template.edit', compact('template','admin','contents','contentCategories'));
    }


    public function updateSetting(Request $request,$id)
    {

 
         $template = Template::find($id);
          
         $template->content_category_id = $request->contentCategory;
         
         $template->content_id = $request->contents;

         $template->public_content_allowed = $request->has('publicContent');
         
         $template->update();
        
        $template->contents()->detach();

        foreach ($request->content as $index => $content) {
            $template->contents()->save(Content::find($content), ['status' => $request->status[$index]]);
        }

       
         // $tenant = TenantManager::get();
        return redirect('/admin/template/index')->with('flash_message', 'Updated');
    }


    public function getBusinessTypeLists(Request $request)
    {
        $business = BusinessType::where("business_category_id",$request->business_category_id)
                    ->pluck("name","id");
        return response()->json($business);
    }
}
