<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepribadian;
use App\Models\Hasil;
use Illuminate\Support\Facades\Auth;

class KepribadianController extends Controller
{
    public function teskepribadian()
    {   
        if (Auth()->User()->role=='Admin') {
            return redirect('admin');
        }

        $data = [
            'hasil' => Hasil::where('id_users','=',Auth()->User()->id_user)->first(),
            'kon' => Hasil::where('id_users','=',Auth()->User()->id_user)->first(),
        ];
        // dd($data);
        return view('teskepribadian',compact('data'));
    }
    public function pkepribadian(Request $request)
    {   
        // dd(Auth()->User()->id_user);
        $data = Hasil::create([
            'id_users'=>Auth()->User()->id_user,
            'jawaban'=>"[".$request->d_d1.",".$request->d_d2.",".$request->d_d3.",".$request->d_d4.",]",
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
}
