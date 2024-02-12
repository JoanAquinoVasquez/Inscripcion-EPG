<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Facultad;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class FacultadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facultades = [
            'FIQUIA',
            'FICSA',
            'FACEAC',
            'FE',
            'FIME',
            'FDCP',
            'FIA',
            'FASCHE',
            'FCB',
            'FDCP'
        ];


        foreach ($facultades as $facultad) {
            DB::table('facultads')->insert([
                'nombre' => $facultad,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        //
    }
}
