<?php

namespace App\Http\Controllers\App\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Auth;
use File;
use App\Models\Resource;
use App\Models\ContentCategory;
use App\Models\Content;


class ResourceController extends Controller
{
public function __construct() 
	{
        $this->middleware('auth:admin');
    }
    
    public function index(){

    	$resources = Resource::where('assignable_id',0)->get();
    	$contentCategories = Content::all();
    	

	    return view('app.admin.resources.index', ['contents'=>$contentCategories,'resources'=>$resources]);
	}

	public function upload(Request $request){
		//dd(Auth::user()->tenant->domain);

		$this->validate($request, ['file' => 'required|mimes:jpg,gif,jpeg,png,mp4,mpga']);

		if($request->hasFile('file') ){

			$now = new \DateTime();

			$file = $request->file;
			$content = Content::find($request->content);

			//dd($content);
			$tag = $content->name;
			$ext = $file->getClientOriginalExtension();
			$temp  = md5($file->getFileName() . time() );
			$path = "resources/EndUser/".Auth::id() ."/".$now->format('Y/M/D_d') ."/";

			Storage::put("public/".$path.$temp.".".$ext, File::get($file));


			$resource = Resource::create([
				'file_name' => $temp.".".$ext,
				'label' => $file->getClientOriginalName(),
				'tag' =>$tag,
				'content_id' => $content->id,
				'file_ext' => $ext,
				'checksum' => md5($file),
				'error' => $file->getError()?1:0,
				'file_type'  => $file->getMimeType(),
				'file_size' => $file->getClientSize(),
				'path' => $path,
				'assignable_type' => 'App\Models\Admin',
				'assignable_id' => '0',
			]);



			return redirect('admin/resource');
		}


	}

	public function delete($id){
    	 $resource = Resource::find($id);
		 $filename = $resource->file_name;
		 $filepath = $resource->path;
		 Storage::delete('public/'.$filepath.$filename);
		 $resource->delete();
    	return redirect('admin/resource');
    }

    public function show(){
		$resources = Resource::all();
		return $resources;
    }
}
