<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kelompok;
use App\Models\KelompokMember;
use App\Models\Modul;
use App\Models\Simulasi;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([RoleSeeder::class]);
        $this->call([UserSeeder::class]);

        // User::factory(20)->create();
        // Modul::factory(5)->create();
        // Simulasi::factory(5)->create();
        // Kelompok::factory(5)->create();
        // KelompokMember::factory(20)->create();
        // Tugas::factory(5)->create();
    }
}
