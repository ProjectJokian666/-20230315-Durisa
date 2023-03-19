<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kepribadian;

class KepribadianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kepribadian::create(['gambar'=>'enfj.png','type'=>'ENFJ','kepribadian'=>'Tipe Idealis Terlibat','deskripsi'=>'',]);
        Kepribadian::create(['gambar'=>'enfp.png','type'=>'ENFP','kepribadian'=>'Tipe Idealis Spontan','deskripsi'=>'',]);
        Kepribadian::create(['gambar'=>'infj.png','type'=>'INFJ','kepribadian'=>'Tipe Idealis Penyelaras','deskripsi'=>'',]);
        Kepribadian::create(['gambar'=>'infp.png','type'=>'INFP','kepribadian'=>'Tipe Idealis Pemimpi','deskripsi'=>'',]);
        Kepribadian::create(['gambar'=>'entj.png','type'=>'ENTJ','kepribadian'=>'Tipe Pemikir Dinamis','deskripsi'=>'',]);
        Kepribadian::create(['gambar'=>'entp.png','type'=>'ENTP','kepribadian'=>'Tipe Pemikir Pendobrak','deskripsi'=>'',]);
        Kepribadian::create(['gambar'=>'intj.png','type'=>'INTJ','kepribadian'=>'Tipe Pemikir Mandiri','deskripsi'=>'',]);
        Kepribadian::create(['gambar'=>'intp.png','type'=>'INTP','kepribadian'=>'Tipe Pemikir Analitis','deskripsi'=>'',]);
        Kepribadian::create(['gambar'=>'esfj.png','type'=>'ESFJ','kepribadian'=>'Tipe Realis Sosial','deskripsi'=>'',]);
        Kepribadian::create(['gambar'=>'estj.png','type'=>'ESTJ','kepribadian'=>'Tipe Realis Bertekad','deskripsi'=>'',]);
        Kepribadian::create(['gambar'=>'isfj.png','type'=>'ISFJ','kepribadian'=>'Tipe Realis Baik Hati','deskripsi'=>'',]);
        Kepribadian::create(['gambar'=>'istj.png','type'=>'ISTJ','kepribadian'=>'Tipe Realis Terpercaya','deskripsi'=>'',]);
        Kepribadian::create(['gambar'=>'esfp.png','type'=>'ESFP','kepribadian'=>'Tipe Pelaku Santai','deskripsi'=>'',]);
        Kepribadian::create(['gambar'=>'estp.png','type'=>'ESTP','kepribadian'=>'Tipe Pelaku Bersemangat','deskripsi'=>'',]);
        Kepribadian::create(['gambar'=>'isfp.png','type'=>'ISFP','kepribadian'=>'Tipe Pelaku Peka','deskripsi'=>'',]);
        Kepribadian::create(['gambar'=>'istp.png','type'=>'ISTP','kepribadian'=>'Tipe Pelaku Individualistis','deskripsi'=>'',]);
    }
}
