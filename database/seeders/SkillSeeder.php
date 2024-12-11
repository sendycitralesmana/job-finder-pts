<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skills')->insert([
            [
                'vacancy_id' => 1,
                'name' => 'security',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vacancy_id' => 1,
                'name' => 'cyber',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vacancy_id' => 1,
                'name' => 'network',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vacancy_id' => 1,
                'name' => 'analys',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vacancy_id' => 1,
                'name' => 'report',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
