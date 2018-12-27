<?php

namespace App\Http\Controllers\App\Admin;

use App\Models\ContentCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Auth;

class ContentCategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }



    public function index()

    {
        $admin = Admin::where('id',Auth::user()->id)->first();

        $contentCategories = ContentCategory::all();

        return view('app.contentcategory.index',compact('contentCategories','admin'));
    }

    
    public function create()

    {
        $admin = Admin::where('id',Auth::user()->id)->first();

        return view('app.contentcategory.add',compact('admin'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:content_categories,name',
            'description' => 'required|string|max:255',
        ]);

        //$data = $request->all();
        //
        $contentCategory = new ContentCategory;
        $contentCategory->name = $request->input('name');
        $contentCategory->description = $request->input('description');
        $contentCategory->save();

        return redirect('/admin/contentcategory/index')->with('flash_message', 'record added');
    }



    

    public function edit($id)
    {
        $admin = Admin::where('id',Auth::user()->id)->first();
         $contentCategory = ContentCategory::find($id);
       
        return view('app.contentcategory.edit', compact('contentCategory','admin'));
    }

  


    public function update(Request $request, $id)
    {
       $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            
        ]);

         $data = array(
            'name' => $request->input('name'),
            'description' => $request->input('description')
         );
         ContentCategory::where('id',$id)->update($data);
         
        return redirect('/admin/contentcategory/index')->with('flash_message', 'update Successful');
    }

    
    public function destroy(ContentCategory $contentCategory)
    {
        //
    }
}
