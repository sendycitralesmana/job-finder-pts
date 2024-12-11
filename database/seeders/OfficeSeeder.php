<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('offices')->insert([
            [
                'name' => 'Pratama Solusi Teknologi',
                'address' => 'Kp. Gandasoli, Babakan, Wanayasa, Purwakarta, Jawa Barat 41174',
                'no_telp' => '08123456789',
                'email' => 'office@pratamatechsolution.co.id',
                'image' => 'logo.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
