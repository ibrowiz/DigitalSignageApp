<?php

namespace App\Http\Controllers\App\content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content;


class ContentController extends Controller
{

    public function getContent(Request $request)
    {

         $content = Content::where("content_category_id",$request->content_category_id)
                    ->pluck("name","id");
        return response()->json($content);

    }

    
}
