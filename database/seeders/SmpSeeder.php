<?php

namespace Database\Seeders;

use App\Models\Smp;
use Illuminate\Database\Seeder;

class SmpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Smp::create([
            'nama' => 'SMPN 1 SUBANG'
        ]);

        Smp::create([
            'nama' => 'SMPN 2 SUBANG'
        ]);
    }
}
