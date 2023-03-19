<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hasil;

class AdminController extends Controller
{
    public function admin()
    {
    	return view('admin');
    }

    public function tesrekap()
    {
    	if (Auth()->User()->role=='Admin') {
    		$data = [
    			'hasil' => Hasil::all(),
    		];
    		return view('tesrekap',compact('data'));
    	}
    	return redirect('/');
    }
}
