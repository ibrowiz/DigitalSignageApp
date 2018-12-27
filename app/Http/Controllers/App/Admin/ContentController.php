<?php
namespace App\Http\Controllers\App\Admin;
use App\Models\Content;

use App\Models\ContentCategory;
use App\Models\flaggedContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Auth;
 
class ContentController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }




    public function index()
    {
        $admin = Admin::where('id',Auth::user()->id)->first();
         $contents = Content::all();

        return view('app.allowedcontent.index',compact('contents','admin'));
    }

  


    public function create()
    {
        $admin = Admin::where('id',Auth::user()->id)->first();
        $contentCategories = ContentCategory::all();

        return view('app.allowedcontent.add',compact('contentCategories','admin'));
    }

   


    public function store(Request $request)
    {
      $this->validate($request, [
            'name' => 'required|string|max:30|unique:contents,name',
            'contentCategory' => 'required|string|max:255',
            'description' => 'required|string|max:255',

        ]);

        
        $content = new Content;
        $content->name = $request->input('name');
        $content->content_category_id = $request->input('contentCategory');
        $content->description = $request->input('description');
        $content->save();
         return redirect('/admin/allowedcontent/index')->with('flash_message', 'record added');
    }




    public function edit($id)
    {
        $admin = Admin::where('id',Auth::user()->id)->first();
         $contentCategories = ContentCategory::all();       
         $content = Content::find($id);
       
            return view('app.allowedcontent.edit', compact('content','contentCategories','admin'));
    }

    


    public function update(Request $request, $id)
    {
      $this->validate($request,[
            'name' => 'required|string|max:50',
            'contentCategory' => 'required|string|max:50',
            'description' => 'required|string|max:250',
        ]);

         $data = array(
            'name' => $request->input('name'),
            'content_category_id' => $request->input('contentCategory'),
            'description' => $request->input('description'),
         );
         Content::where('id',$id)->update($data);
         
        return redirect('/admin/allowedcontent/index')->with('flash_message', 'update Successful');
    }

    


    public function destroy(Content $content)
    {
        //
    }
}
