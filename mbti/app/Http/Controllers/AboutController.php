<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutmbti()
    {
        $data = [];
        return view('about',compact('data'));
    }
}
