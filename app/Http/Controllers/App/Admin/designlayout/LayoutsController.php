<?php

namespace App\Http\Controllers\App\Admin\designlayout;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Redirect;

use App\Models\Layout;
use App\Models\Resource;
use App\Models\Content;
use App\Models\LayoutResource;
use Auth;

class LayoutsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:admin', 'cors'])->except('preview');
    }
    
    public function create($domain,Request $request){
        header("Access-Control-Allow-Origin: *");

    	$this->validate(request(),[
    		'title' => 'required', 
            'aspect_ratio'=>'required',
            // 'content_type'=>'required',
            'orientation'=>'required',
            // 'category'=>'required'
    	]);

        $user = Auth::id();


        $layout = layout::create(['screen' => $request->canvas, 'assignable_id'=>'0', 'assignable_type' => 'App\Models\Admin', 'orientation'=>$request->orientation,'background_color'=>$request->background_color, 'title'=>$request->title, 'aspect_ratio'=>$request->aspect_ratio]);
        //\Log::info($user);


        $encode =( $request->canvas );
        $decode = json_decode( $encode, true );
       //\Log::info( $decode['objects'][0]);
        foreach($decode['objects'] as $object){

            layoutResource::create([
                'layout_id'=>$layout->id, 
                'type'=>$object['type'], 
                'name'=>$object['name'], 
                'weblink'=>$object['weblink'], 
                'left'=>$object['left'], 
                'top'=>$object['top'], 
                'width'=>$object['width'], 
                'height'=>$object['height'], 
                'tag'=>$object['tag'], 
                'content_id'=>$object['content_id'],
                'scalex'=>$object['scaleX'], 
                'scaley'=>$object['scaleY'],
                'object'=>json_encode($object)
            ]);
        } 

        $layouts = Layout::all();

        return 'validation pass';
    }

    public function show(){
        header("Access-Control-Allow-Origin: *");
    	$layouts = Layout::where('assignable_id',0)->get();
        // $layouts = Layout::order_by('title','desc')->paginate(5);
        return view ('app.admin.layouts.welcome', ['layouts'=>$layouts]);
    }

    public function read($domain,$id, Request $request){
        
    	$layout = Layout::find($id);
        $resources = Resource::where('assignable_id', Auth::user()->tenant->id)->get();
        $contents = Content::all();
        //dd($contents);
    	return view('app.admin.layouts.view', ['layout'=>$layout, 'resources'=>$resources, 'contents'=>$contents]);
    }

    public function edit($id, Request $request){

        $data = array('screen' => $request->canvas, 'assignable_id'=>'0', 'assignable_type' => 'App\Models\Admin', 'orientation'=>$request->orientation,'background_color'=>$request->background_color, 'title'=>$request->title, 'aspect_ratio'=>$request->aspect_ratio);

        $layout = Layout::where('id',$id)->update($data);

        layoutResource::where('layout_id', $id)->delete();

        $encode =( $request->canvas );
        $decode = json_decode( $encode, true );
            foreach($decode['objects'] as $object){
                $objects = array(
                    'layout_id'=>$id, 
                    'type'=>$object['type'], 
                    'name'=>$object['name'], 
                    'weblink'=>$object['weblink'], 
                    'left'=>$object['left'], 
                    'top'=>$object['top'], 
                    'width'=>$object['width'], 
                    'height'=>$object['height'], 
                    'tag'=>$object['tag'], 
                    'content_id'=>$object['content_id'], 
                    'scalex'=>$object['scaleX'], 
                    'scaley'=>$object['scaleY'],
                    'object'=>json_encode($object),
                );

                layoutResource::create([
                    'layout_id'=>$id, 
                    'type'=>$object['type'], 
                    'name'=>$object['name'], 
                    'weblink'=>$object['weblink'], 
                    'left'=>$object['left'], 
                    'top'=>$object['top'], 
                    'width'=>$object['width'], 
                    'height'=>$object['height'], 
                    'tag'=>$object['tag'], 
                    'content_id'=>$object['content_id'],
                    'scalex'=>$object['scaleX'], 
                    'scaley'=>$object['scaleY'],
                    'object'=>json_encode($object)
                ]);
            }
            
        // layoutResource::where('id', $id)->updateorCreate($objects);
         //return redirect()-route('welcome')->with(['layouts'=>$layouts]);
    }

    public function upload(Request $request){

         if($request->hasFile('file')){

        //     $file = $request::file('file');
        //     $filename = $file->getClientOriginalName();
        //     $path = public_path().'/uploads/';
        //     $file->move($path, $filename);
        //     echo '<img src="uploads/'.$filename.'"  />';

           $request->file('file');
           $file =  $request->file->store('uploads');

            return view('Resources.index', ['file'=>$file]);

        }else {
            return "no file selected";
        }


    } 

    public function showResources(){
        $resources = Resource::where('assignable_id',0)->get();
         $contents = Content::all();
        return view('home', ['resources'=>$resources, 'contents'=>$contents]);
    }

    public function destroy($id){
        Layout::where('id',$id)->delete();
        return redirect('admin/layout/welcome')->with('info', 'Layout deleted successfully');
    }


    public function preview(Request $request){
        if (!$request->has('id')) return response()->json(['Invalid request. Id not found'], 400);

        $layout = Layout::findOrFAIL($request->id);

        return response()->json(['data' => $layout], 200);
    }

    public function screenShot(Request $request){

        // shell_exec("phantomjs  C:\xampp\htdocs\DigitalSign\public\images\web.js");

        return dd(true);
    }
    

    public function webContent(Request $request){

        set_time_limit(200);
        return file_get_contents($request->source);
    }


    public function ajaxSearch(Request $request)
    {
        $this->validate($request, [
            'query'=>'required|max:1000'
        ]);

        $layouts = Layout::where('title', 'like', '%'.$request['query'].'%')
                            ->get(['id', 'title', 'aspect_ratio']);

        return response()->json(['layouts' => $layouts], 200);
    }


}
