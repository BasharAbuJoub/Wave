<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\LectureResource;
use Illuminate\Support\Facades\Auth;
class MainController extends Controller
{
    //

    public function __construct()
    {  
        return $this->middleware(['auth']); 
    }

    
    public function index(){
        return view('pages.overview');
    }

    public function lobby(){
        return view('pages.lobby');
    }


}
