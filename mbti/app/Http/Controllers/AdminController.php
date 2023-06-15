<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hasil;
use App\Models\User;
use App\Models\Jawaban;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin()
    {
    	return view('v_admin.admin');
    }

    public function data()
    {   
        if (Auth()->User()->role!='Admin') {
            return redirect('index');
        }
        // dd(User::where('role','=','Admin')->where('id_user','!=',Auth()->user()->id_user)->get());
        $data = array();
        foreach(User::where('role','=','Admin')->where('id_user','!=',Auth()->user()->id_user)->get() as $hasil){
            array_push($data,[
                'name' => $hasil->name,
                'email' => $hasil->email,
                'id_user' => $hasil->id_user,
            ]);
        }
        if (request()->ajax()) {
            return DataTables::of($data)->make(true);
        }
        return view('v_admin.dataadmin');
    }
    public function add()
    {
        if (Auth()->User()->role!='Admin') {
            return redirect('index');
        }
        if (request()->name&&request()->email&&request()->password) {
            dd(request());
        }
        return view('v_admin.add');
    }
    public function padd(Request $request)
    {
        if (Auth()->User()->role!='Admin') {
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
        return redirect('data');
    }
    public function ubahdata($id)
    {
        if (Auth()->User()->role!='Admin') {
            return redirect('index');
        }
        $data = [
            'user' => User::find($id),
        ];
        return view('v_admin.update',compact('data'));
    }
    public function pubahdata(Request $request,$id)
    {
        // dd($request);
        if ($request->name!=null&&$request->email!=null) {
            if ($request->password==null) {
                $ubah_data = User::where('id_user',$id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
                if ($ubah_data) {
                    return redirect('data')->with('sukses','data sudah diubah');
                }
                else{
                    return redirect('data/ubah/'.$id)->with('gagal','data gagal diubah');
                }
            }
            if ($request->password!=null) {
                $ubah_data = User::where('id_user',$id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                if ($ubah_data) {
                    return redirect('data')->with('sukses','data sudah diubah');
                }
                else{
                    return redirect('data/ubah/'.$id)->with('gagal','data gagal diubah');
                }
            }

        }
        else{
            return redirect('data/ubah/'.$id);
        }
    }
    public function deletedata($id)
    {
        $delete_user = User::where('id_user','=',$id)->delete();
        DB::statement('alter table users auto_increment=0');
        if ($delete_user) {
            return redirect('data')->with('sukses','data sudahh dihapus');
        }
        else{
            return redirect('data')->with('gagal','data gagal dihapus');
        }
    }

    public function tesrekap()
    {
    	if (Auth()->User()->role=='Admin') {
            $data=array();
            foreach(Hasil::all() as $hasil){
                array_push($data,[
                    'id_users' => User::find($hasil->id_users)->name,
                    'email' => User::find($hasil->id_users)->email,
                    'tgl' => DATE('d/m/Y',strtotime($hasil->created_at)),
                    'jawaban' => $this->kepribadian($hasil->jawaban),
                ]);
            }
            // dd($data,User::all());
            if (request()->ajax()) {
                return DataTables::of($data)->make(true);
            }
            return view('v_admin.tesrekap');
        }
        return redirect('/');
    }

    public function kepribadian($data)
    {   
        if ($data!=null) {
            $aray = $data;
            $a = explode(',',$aray);
            
            $x = Jawaban::find(1);
            $x1 = explode(',',$x->bobot);
            $d1 = $a[0]<$x->beban ? $x1[0] : $x1[1];

            $x = Jawaban::find(2);
            $x2 = explode(',',$x->bobot);
            $d2 = $a[1]<$x->beban ? $x2[0] : $x2[1];
            
            $x = Jawaban::find(3);
            $x3 = explode(',',$x->bobot);
            $d3 = $a[2]<$x->beban ? $x3[0] : $x3[1];
            
            $x = Jawaban::find(4);
            $x4 = explode(',',$x->bobot);
            $d4 = $a[3]<$x->beban ? $x4[0] : $x4[1];

            return $d1.$d2.$d3.$d4;
        }
        return "DATA BELUM ADA";
    }
}
