<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserSkill;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            OfficeSeeder::class,
            UserSeeder::class,
            UserSkillSeeder::class,
            UserEducationSeeder::class,
            UserExperienceSeeder::class,
            VacancySeeder::class,
            SkillSeeder::class
        ]);
    }
}
