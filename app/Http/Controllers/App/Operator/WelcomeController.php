<?php

namespace App\Http\Controllers\App\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant;

class WelcomeController extends Controller
{

    public function __construct(){

        $this->middleware('guest:operator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index($name)
    {
        $tenant = Tenant::where('domain',$name) -> first();

         //$tenant = Tenant::find($name);
       
        return view('app.mediapartner.welcome', compact('tenant'));
    }

     
}
