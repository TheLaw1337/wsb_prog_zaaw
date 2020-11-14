<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController1 extends Controller
{
    function index(Request $req)
    {
        // echo "Kontroler";
        // return $req->input();
        // return $req->path();
        // return $req->url();
        // return $req->method();
        // return $req->input('address');
        
        
        $req->validate(
            [
                'address' => 'required|string|min:5',
                'email' => 'required|email'
            ],
            [
                'address.required' => 'Adres jest wymagany',
                'address.min' => 'Adres powinien mieć minimum 5 znaków',
                'email.required' => 'Adres email jest wymagany',
                'email.email' => 'Proszę wprowadzić prawidłowy adres email'
            ]  
        );
        
        return $req->input();
    }
}
