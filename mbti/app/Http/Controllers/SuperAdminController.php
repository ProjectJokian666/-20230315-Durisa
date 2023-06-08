<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
    public function ubahdataadmin($id)
    {
        if (Auth()->User()->role!='SuperAdmin') {
            return redirect('index');
        }
        $data = [
            'user' => User::find($id),
        ];
        return view('v_superadmin.update',compact('data'));
    }
    public function pubahdataadmin(Request $request,$id)
    {
        // dd($request);
        if ($request->name!=null&&$request->email!=null) {
            if ($request->password==null) {
                $ubah_data = User::where('id_user',$id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
                if ($ubah_data) {
                    return redirect('dataadmin')->with('sukses','data sudahh diubah');
                }
                else{
                    return redirect('dataadmin/ubah/'.$id)->with('gagal','data gagal diubah');
                }
            }
            if ($request->password!=null) {
                $ubah_data = User::where('id_user',$id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                if ($ubah_data) {
                    return redirect('dataadmin')->with('sukses','data sudahh diubah');
                }
                else{
                    return redirect('dataadmin/ubah/'.$id)->with('gagal','data gagal diubah');
                }
            }

        }
        else{
            return redirect('dataadmin/ubah/'.$id);
        }
    }
    public function deletedataadmin($id)
    {
        $delete_user = User::where('id_user','=',$id)->delete();
        DB::statement('alter table users auto_increment=0');
        if ($delete_user) {
            return redirect('dataadmin')->with('sukses','data sudahh dihapus');
        }
        else{
            return redirect('dataadmin')->with('gagal','data gagal dihapus');
        }
    }
}
