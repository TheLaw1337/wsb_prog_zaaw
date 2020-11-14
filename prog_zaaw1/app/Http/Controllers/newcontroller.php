<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newcontroller extends Controller
{
    public function showAge(){
        echo $data['wiek'];
    }
}
