<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Major;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $tu = Role::create([
            'name' => 'tu',
            'display_name' => 'Staf Tata Usaha',
        ]);

        Role::create([
            'name' => 'kepala_sekolah',
            'display_name' => 'Kepala Sekolah',
        ]);

        Role::create([
            'name' => 'guru',
            'display_name' => 'Guru',
        ]);

        Role::create([
            'name' => 'perpustakaan',
            'display_name' => 'Staf Perpustakaan',
        ]);

        Role::create([
            'name' => 'siswa',
            'display_name' => 'Siswa',
        ]);

        $kepalaSekolah = Role::where('name', 'kepala_sekolah')->first();

        $guru = Role::where('name', 'guru')->first();

        $perpustakaan = Role::where('name', 'perpustakaan')->first();

        $siswa = Role::where('name', 'siswa')->first();

        User::create([
            'name' => 'Admin SIMS',
            'email' => 'admin@sims.test',
            'password' => Hash::make('Password123!'),
            'role_id' => $tu->id,
        ]);

        User::create([
            'name' => 'Kepala Sekolah',
            'email' => 'kepala@sims.test',
            'password' => Hash::make('Password123!'),
            'role_id' => $kepalaSekolah->id,
        ]);

        User::create([
            'name' => 'Guru SIMS',
            'email' => 'guru@sims.test',
            'password' => Hash::make('Password123!'),
            'role_id' => $guru->id,
        ]);

        User::create([
            'name' => 'Petugas Perpustakaan',
            'email' => 'perpustakaan@sims.test',
            'password' => Hash::make('Password123!'),
            'role_id' => $perpustakaan->id,
        ]);

        User::create([
            'name' => 'Siswa SIMS',
            'email' => 'siswa@sims.test',
            'password' => Hash::make('Password123!'),
            'role_id' => $siswa->id,
        ]);

        Major::create([
            'name' => 'Pengembangan Perangkat Lunak dan Gim',
            'code' => 'PPLG',
            'description' => 'Program keahlian pengembangan perangkat lunak dan gim.',
        ]);

        Major::create([
            'name' => 'Teknik Jaringan Komputer dan Telekomunikasi',
            'code' => 'TJKT',
            'description' => 'Program keahlian jaringan komputer dan telekomunikasi.',
        ]);

        Major::create([
            'name' => 'Desain Komunikasi Visual',
            'code' => 'DKV',
            'description' => 'Program keahlian desain komunikasi visual.',
        ]);
    }
}