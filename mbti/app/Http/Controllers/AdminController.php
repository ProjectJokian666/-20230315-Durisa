<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hasil;
use App\Models\User;
use App\Models\Jawaban;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function admin()
    {
    	return view('v_admin.admin');
    }

    public function tesrekap()
    {
    	if (Auth()->User()->role=='Admin') {
            $data=array();
            foreach(Hasil::all() as $hasil){
                array_push($data,[
                    'id_users' => User::find($hasil->id_users)->name,
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
