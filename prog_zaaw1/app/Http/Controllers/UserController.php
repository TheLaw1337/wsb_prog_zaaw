<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        echo "test";
    }
    
    function account(Request $req){
        return $req->input();
    }
}
