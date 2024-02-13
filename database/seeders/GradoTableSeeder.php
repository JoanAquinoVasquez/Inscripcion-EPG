<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Grado;
use Illuminate\Support\Facades\DB;

class GradoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $grados = [
            'DOCTORADO',
            'MAESTRÍA',
            'SEGUNDA ESPECIALIDAD'
        ];


        foreach ($grados as $grado) {
            DB::table('grados')->insert([
                'nombre' => $grado,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        //
    }
}
