<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepribadian;
use App\Models\Hasil;
use App\Models\Jawaban;
use Illuminate\Support\Facades\Auth;

class KepribadianController extends Controller
{
    public function teskepribadian()
    {   
        if (Auth()->User()->role=='Admin') {
            return redirect('admin');
        }
        $isi = Hasil::where('id_users','=',Auth()->User()->id_user)->first();
        if ($isi) {
            $isi = true;
        }
        else{
            $isi = false;
        }
        $data = [
            'hasil' => Hasil::where('id_users','=',Auth()->User()->id_user)->first(),
            'isi' => $isi,
        ];

        // dd($data);
        return view('teskepribadian',compact('data'));
    }
    public function pkepribadian(Request $request)
    {   
        // dd(Auth()->User()->id_user);
        $data = Hasil::create([
            'id_users'=>Auth()->User()->id_user,
            'jawaban'=>$request->d_d1.",".$request->d_d2.",".$request->d_d3.",".$request->d_d4,
        ]);
        if ($data==true) {
            return response()->json('sukses',200);
        }
        else{
            return response()->json('gagal',200);
        }    
    }
    public function tipekepribadian()
    {
        $data = [
            'kepribadian' => Kepribadian::get(),
        ];
        return view('tipekepribadian',compact('data'));
    }
    public function hasil()
    {
        $data = Hasil::where('id_users','=',Auth()->User()->id_user)->first();
        if ($data!=null) {
            $aray = $data->jawaban;
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
            
            $hasil = Kepribadian::where('type','=',$d1.$d2.$d3.$d4)->first();

            // dd($a,$x,$d1.$d2.$d3.$d4);
            return response()->json($hasil,200);
        }
        return response()->json('kosong',200);
    }

    public function cek()
    {
        $data = Hasil::where('id_users','=',Auth()->User()->id_user)->first();
        if ($data!=null) {
            return response()->json('true',200);
        }
        else{
            return response()->json('false',200);
        }
    }
}
