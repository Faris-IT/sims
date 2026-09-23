<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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

        User::create([
            'name' => 'Admin SIMS',
            'email' => 'admin@sims.test',
            'password' => Hash::make('Password123!'),
            'role_id' => $tu->id,
        ]);
    }
}