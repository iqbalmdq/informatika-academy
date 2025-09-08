<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Kaprodi
        User::create([
            'name' => 'Dr. Ahmad Kaprodi',
            'email' => 'kaprodi@informatika.ac.id',
            'password' => Hash::make('password'),
            'role' => 'kaprodi',
            'nim_nip' => '198501012010011001',
            'is_active' => true,
        ]);

        // Dosen
        User::create([
            'name' => 'Dr. Budi Dosen',
            'email' => 'dosen@informatika.ac.id',
            'password' => Hash::make('password'),
            'role' => 'dosen',
            'nim_nip' => '198601012011011001',
            'is_active' => true,
        ]);

        // Mahasiswa
        User::create([
            'name' => 'Citra Mahasiswa',
            'email' => 'mahasiswa@informatika.ac.id',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'nim_nip' => '20210001',
            'is_active' => true,
        ]);
    }
}