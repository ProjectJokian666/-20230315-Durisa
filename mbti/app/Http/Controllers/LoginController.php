<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
	public function login(){
		if (Auth::check()) {
			return view('index');
		}
		else{
			return view('login');
		}
	}
	public function p_login(Request $request)
	{
		// dd($request);
		$data = User::where('email',$request->email)->first();
		// dd($data);
		if ($data==null) {
			if (Auth::check()) {
				Auth::logout();
			} 
			elseif (Auth::check()) {
				Auth::logout();
			}
			return redirect('login');	
		}
		if ($data->role=='Admin') {
			// dd(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>'Admin']));
			if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>'Admin'])){
				$request->session()->regenerate();
				return redirect()->intended('admin');
			}
			Auth::logout();
			return 'login-admin';
		}
		elseif($data->role=='User'){
			// dd(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>'User']));
			if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>'User'])){
				$request->session()->regenerate();
				return redirect()->intended('user');
			}
			Auth::logout();
			return 'login-user';
		}
		else{
			if (Auth::guard('admin')->check()) {
				Auth::guard('admin')->logout();
			} elseif (Auth::guard('user')->check()) {
				Auth::guard('user')->logout();
			}
			return redirect('login');
		}
	}
	public function daftar()
	{	
		if(Auth()->User()!=null){
			if (Auth()->User()->role=='Admin') {
				return redirect('admin');
			}
			else if (Auth()->User()->role=='User') {
				return redirect('user');
			}
		}
		return view('daftar');
	}
	public function p_daftar(Request $request)
	{
    	// dd($request);
		$request->validate([
			'name' => 'required|max:255',
			'email' => 'required|email:dns|unique:users',
			'password' => 'required|max:255',
		]);
		$data = User::create([
			'name' =>$request->name,
			'email' =>$request->email,
			'password' =>Hash::make($request->password),
		]);
		// dd($data);
		return view('login');
	}
	public function logout()
	{
		Auth::logout();
		return redirect('login');
	}
}
