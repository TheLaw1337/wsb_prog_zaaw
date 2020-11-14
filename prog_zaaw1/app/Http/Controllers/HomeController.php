<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($age){
        //echo 'dane z kontrolera HomeController';
        
        return view('welcome1', ['age' => $age]);
    }
}
