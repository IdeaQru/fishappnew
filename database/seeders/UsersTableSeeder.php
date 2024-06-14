<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin', // Nama pengguna admin
            'email' => 'admin@example.com', // Email pengguna admin
            'password' => Hash::make('admin'), // Password harus di-hash
        ]);

        // Anda dapat menambahkan lebih banyak pengguna di sini jika perlu
    }
}
