<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\produk;
use App\Models\saldo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'bank',
        'email' => 'bank@bank.com',
        'password' => Hash::make('bank12345'),
        'role' => 'bank',
        ]);

        User::create([
            'name' => 'kantin',
        'email' => 'kantin@kantin.com',
        'password' => Hash::make('kantin12345'),
        'role' => 'kantin',
        ]);


        User::create([
            'name' => 'siswa',
        'email' => 'siswa@siswa.com',
        'password' => Hash::make('siswa12345'),
        'role' => 'siswa',
        ]);
        
       produk::create([
        'name' => "siswa",
        'price' => 20000,
        'stok' => 20,
        
       ]);

        
        saldo::create([
            'user_id' => 3,
            'saldo' => 20000, 
        ]);
    }
}