<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{   
    public function superadmin()
    {
        return view('v_superadmin.superadmin');
    }

    public function dataadmin()
    {   
        if (Auth()->User()->role!='SuperAdmin') {
            return redirect('index');
        }
        $data = array();
        foreach(User::where('role','=','Admin')->get() as $hasil){
            array_push($data,[
                'name' => $hasil->name,
                'email' => $hasil->email,
                'id_user' => $hasil->id_user,
            ]);
        }
        if (request()->ajax()) {
            return DataTables::of($data)->make(true);
        }
        return view('v_superadmin.dataadmin');
    }
    public function addadmin()
    {
        if (Auth()->User()->role!='SuperAdmin') {
            return redirect('index');
        }
        if (request()->name&&request()->email&&request()->password) {
            dd(request());
        }
        return view('v_superadmin.add');
    }
    public function paddadmin(Request $request)
    {
        if (Auth()->User()->role!='SuperAdmin') {
            return redirect('index');
        }
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|max:255',
        ]);

        $data = User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'role' =>'Admin',
        ]);
        // dd($data);
        return redirect('dataadmin');
    }
}
