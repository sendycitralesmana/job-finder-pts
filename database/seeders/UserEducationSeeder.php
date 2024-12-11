<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_educations')->insert([
            'user_id' => 2,
            'school' => 'SMAN 1 Purwakarta',
            'study' => 'IPA',
            'start_year' => 2015,
            'end_year' => 2019,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
