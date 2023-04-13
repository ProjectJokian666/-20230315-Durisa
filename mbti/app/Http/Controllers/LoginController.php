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
			return redirect('login');	
		}
		if ($data->role=='SuperAdmin') {
			// dd(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>'Admin']));
			if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>'SuperAdmin'])){
				$request->session()->regenerate();
				return redirect()->intended('superadmin');
			}
			Auth::logout();
			return 'login-admin';
		}
		elseif ($data->role=='Admin') {
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
			'email' => 'required|unique:users',
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
	
	public function profil(Request $request)
	{	
		// dd(isset($request));
		if ($request->name!=null&&$request->email!=null) {

			$cek_email = User::where('email','=',$request->email)->first();
			if($cek_email->email==null||$request->email==Auth()->user()->email){
				if ($request->password==null) {
					$ubah_data = User::where('id_user',Auth()->user()->id_user)->update([
						'name' => $request->name,
						'email' => $request->email,
					]);
					// dd($ubah_data,Auth()->user()->id_user);
					if ($ubah_data) {
						$kirim_data = [
							'email' => $request->email,
							'password' => Auth()->user()->password,
						];
						$this->getlogin($kirim_data);
						return redirect('profil')->with('sukses','data profil sudahh diubah');
					}
					else{
						return redirect('profil')->with('gagal','data profil gagal diubah');
					}
					// dd($cek_email,$request->email==Auth()->user()->email,$request->password==null);
				}
				if ($request->password!=null) {
					$ubah_data = User::where('id_user',Auth()->user()->id_user)->update([
						'name' => $request->name,
						'email' => $request->email,
						'password' => Hash::make($request->password),
					]);
					// dd($ubah_data,Auth()->user()->id_user);
					if ($ubah_data) {
						$kirim_data = [
							'email' => $request->email,
							'password' => $request->password,
						];
						$this->getlogin($kirim_data);
						return redirect('profil')->with('sukses','data profil sudahh diubah');
					}
					else{
						return redirect('profil')->with('gagal','data profil gagal diubah');
					}
				}
			}
			else{
				return redirect('profil')->with('gagal','email sudah ada yang menggunakan');
			}

			dd($request);
		}
		else{
			return view('profil');
		}
	}

	public function logout()
	{
		Auth::logout();
		request()->session()->invalidate();
		request()->session()->regenerateToken();
		return redirect('login');
	}

	public function getlogin($data)
	{
		// dd($data['email']);
		$data = User::where('email',$data['email'])->first();

		if ($data->role=='SuperAdmin') {
			if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'role'=>'SuperAdmin'])){
				$data->session()->regenerate();
			}
		}
		elseif ($data->role=='Admin') {
			if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'role'=>'Admin'])){
				$data->session()->regenerate();
			}
		}
		elseif($data->role=='User'){
			if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'role'=>'User'])){
				$data->session()->regenerate();
			}
		}
			// dd($data);
	}
}
