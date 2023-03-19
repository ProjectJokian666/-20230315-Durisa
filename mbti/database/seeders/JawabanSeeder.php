<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jawaban;

class JawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jawaban::create(['jawabans' => 'D1','bobot' => "E,I",'beban' => '12,5',]);
        Jawaban::create(['jawabans' => 'D2','bobot' => "S,N",'beban' => '12,5',]);
        Jawaban::create(['jawabans' => 'D3','bobot' => "T,F",'beban' => '12,5',]);
        Jawaban::create(['jawabans' => 'D4','bobot' => "J,P",'beban' => '12,5',]);
    }
}
