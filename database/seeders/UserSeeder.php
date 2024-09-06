<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guru = User::create([
            'name' => 'Guru',
            'email' => 'guru@atun.com',
            'kelas' => '11 TKJ A',
            'nip' => '21051214022',
            'password' => bcrypt('guru123'),
        ]);
        $siswa = User::create([
            'name' => 'siswa',
            'email' => 'siswa@atun.com',
            'kelas' => '11 TKJ A',
            'no_absen' => '12',
            'password' => bcrypt('siswa123'),
        ]);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@atun.com',
            'Password' => bcrypt('admin123'),
        ]);
        $admin->assignRole('admin');
        $guru->assignRole('guru');
        $siswa->assignRole('siswa');
    }
}
