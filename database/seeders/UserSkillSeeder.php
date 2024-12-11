<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_skills')->insert([
            'user_id' => 2,
            'skill' => 'Laravel',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
