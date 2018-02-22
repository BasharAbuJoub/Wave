<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function __construct()
    {  
        return $this->middleware(['auth', 'admin']); 
    }

    
    public function index(){
        return view('pages.overview');
    }
}
