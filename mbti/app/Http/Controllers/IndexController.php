<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepribadian;

class IndexController extends Controller
{
    public function index()
    {
        $data = [
            'kepribadian' => Kepribadian::limit(4)->get(),
        ];
        return view('index',compact('data'));
    }
}
