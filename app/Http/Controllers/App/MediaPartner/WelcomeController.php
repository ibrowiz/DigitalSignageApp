<?php

namespace App\Http\Controllers\App\MediaPartner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class WelcomeController extends Controller
    {

    public function __construct()
    {

        //$this->middleware('guest');
    }
    

     public function index()
    {
        return view('app.mediapartner.welcome');
    }
  
}
