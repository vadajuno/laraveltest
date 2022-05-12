<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('majors')->insert([
            'major_name' => 'TI'
        ]);
        DB::table('majors')->insert([
            'major_name' => 'SI'
        ]);
        DB::table('majors')->insert([
            'major_name' => 'Akuntansi'
        ]);
        DB::table('majors')->insert([
            'major_name' => 'Perawat'
        ]);
    }
}
