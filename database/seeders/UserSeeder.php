<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 👨‍💼 Admin Users
        // Kaprodi
        User::create([
            'name' => 'Dr. Ahmad Kaprodi',
            'email' => 'kaprodi@informatika.ac.id',
            'password' => Hash::make('password'),
            'role' => 'kaprodi',
            'nim_nip' => '198501012010011001',
            'is_active' => true,
        ]);

        // Staff
        User::create([
            'name' => 'Staff Akademik',
            'email' => 'staff@informatika.ac.id',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'nim_nip' => '198502012010012001',
            'is_active' => true,
        ]);

        // 👨‍🏫 Dosen Users
        User::create([
            'name' => 'Dr. Budi Santoso',
            'email' => 'budi.santoso@informatika.ac.id',
            'password' => Hash::make('password'),
            'role' => 'dosen',
            'nim_nip' => '198601012011011001',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Dr. Sari Wijaya',
            'email' => 'sari.wijaya@informatika.ac.id',
            'password' => Hash::make('password'),
            'role' => 'dosen',
            'nim_nip' => '198602012011012001',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Dr. Andi Pratama',
            'email' => 'andi.pratama@informatika.ac.id',
            'password' => Hash::make('password'),
            'role' => 'dosen',
            'nim_nip' => '198603012011013001',
            'is_active' => true,
        ]);

        // 👨‍🎓 Mahasiswa Users
        User::create([
            'name' => 'Rizki Mahasiswa',
            'email' => 'rizki@student.ac.id',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'nim_nip' => '20210001',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Maya Mahasiswa',
            'email' => 'maya@student.ac.id',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'nim_nip' => '20210002',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Doni Mahasiswa',
            'email' => 'doni@student.ac.id',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'nim_nip' => '20210003',
            'is_active' => true,
        ]);
    }
}