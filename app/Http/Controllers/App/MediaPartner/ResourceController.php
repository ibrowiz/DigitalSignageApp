<?php

namespace App\Http\Controllers\App\MediaPartner;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Auth;
use File;
use App\Models\Resource;
use App\Models\Content;

class ResourceController extends Controller
{
public function __construct() 
	{
        $this->middleware('auth:operator');
    }
    
    public function index(){

    	$resources = Auth::user()->tenant->resources;
    	$contents = Content::all();
    	

	    return view('app.mediapartner.resources.index', ['contents'=>$contents,'resources'=>$resources]);
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
				'assignable_type' => 'App\Models\Tenant',
				'assignable_id' => Auth::user()->tenant->id,
			]);



			return redirect('/mediapartner/'.Auth::user()->tenant->domain.'/resource');
		}


	}

	public function delete($domain,$id){
    	 $resource = Resource::find($id);
		 $filename = $resource->file_name;
		 $filepath = $resource->path;
		 Storage::delete('public/'.$filepath.$filename);
		 $resource->delete();
    	return redirect('/mediapartner/'.Auth::user()->tenant->domain.'/resource');
    }

    public function show(){
		$resources = Resource::all();
		return $resources;
    }
}
