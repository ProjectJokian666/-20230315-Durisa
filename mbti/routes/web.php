<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController as Index;
use App\Http\Controllers\AboutController as About;
use App\Http\Controllers\KepribadianController as Kepribadian;
use App\Http\Controllers\LoginController as Login;

use App\Http\Controllers\SuperAdminController as SuperAdmin;
use App\Http\Controllers\AdminController as Admin;
use App\Http\Controllers\UserController as User;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[Index::class,'index'])->name('index');
Route::get('index',[Index::class,'index'])->name('index');
Route::get('tipekepribadian',[Kepribadian::class,'tipekepribadian'])->name('tipekepribadian');
Route::get('aboutmbti',[About::class,'aboutmbti'])->name('aboutmbti');

Route::middleware(['guest'])->group(function(){

	Route::get('login',[Login::class,'login'])->name('login');
	Route::post('p_login',[Login::class,'p_login'])->name('p_login');

	Route::get('daftar',[Login::class,'daftar'])->name('daftar');
	Route::post('p_daftar',[Login::class,'p_daftar'])->name('p_daftar');
});

Route::middleware(['auth'])->group(function(){
	//superadmin
	Route::get('superadmin',[SuperAdmin::class,'superadmin'])->name('superadmin');

	Route::get('dataadmin',[SuperAdmin::class,'dataadmin'])->name('dataadmin');
	Route::get('addadmin',[SuperAdmin::class,'addadmin'])->name('addadmin');
	Route::post('paddadmin',[SuperAdmin::class,'paddadmin'])->name('paddadmin');
	Route::get('dataadmin/ubah/{id}',[SuperAdmin::class,'ubahdataadmin'])->name('ubahdataadmin');
	Route::post('dataadmin/ubah/{id}',[SuperAdmin::class,'pubahdataadmin'])->name('pubahdataadmin');
	Route::get('dataadmin/hapus/{id}',[SuperAdmin::class,'deletedataadmin'])->name('deletedataadmin');

	//admin
	Route::get('admin',[Admin::class,'admin'])->name('admin');

	Route::get('data',[Admin::class,'data'])->name('data');
	Route::get('add',[Admin::class,'add'])->name('add');
	Route::post('padd',[Admin::class,'padd'])->name('padd');
	Route::get('data/ubah/{id}',[Admin::class,'ubahdata'])->name('ubahdata');
	Route::post('data/ubah/{id}',[Admin::class,'pubahdata'])->name('pubahdata');
	Route::get('data/hapus/{id}',[Admin::class,'deletedata'])->name('deletedata');

	Route::get('tesrekap',[Admin::class,'tesrekap'])->name('tesrekap');

	//user
	Route::get('user',[User::class,'user'])->name('user');
	Route::get('teskepribadian',[Kepribadian::class,'teskepribadian'])->name('teskepribadian');
	Route::post('pkepribadian',[Kepribadian::class,'pkepribadian'])->name('pkepribadian');
	Route::get('hasil',[Kepribadian::class,'hasil'])->name('hasil');
	Route::get('cetak',[Kepribadian::class,'cetak'])->name('cetak');
	Route::get('cek',[Kepribadian::class,'cek'])->name('cek');

	Route::get('profil',[Login::class,'profil'])->name('profil');
	Route::post('profil',[Login::class,'profil'])->name('pprofil');
	Route::get('logout',[Login::class,'logout'])->name('logout');
});

