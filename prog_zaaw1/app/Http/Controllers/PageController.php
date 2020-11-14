<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($drive)
    {
        $drives = [
            'fdd' => "Dyskietka",
            'hdd' => "Dysk twardy",
            'ssd' => "Dysk SSD"
        ];

        return $drives[$drive];
    }

    public function index()
    {
        $drives = [
            'fdd' => "Dyskietka",
            'hdd' => "Dysk twardy",
        ];

        dd($drives);
    }
}
