<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_experiences')->insert([
            'user_id' => 2,
            'company' => 'PT. Pratama Solusi Teknologi',
            'position' => 'Frontend Developer',
            'type' => 'Full Time',
            'start_year' => 2022,
            'end_year' => 2023,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
