<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@konly.com',
            'phone' => '0606060606',
            'role_id' => Role::where('name','admin')->pluck('id')->first(),
            'password' => Hash::make('123456789'),
        ]);
        $vendeur = User::create([
            'name' => 'vendeur',
            'email' => 'vendeur@konly.com',
            'phone' => '0606060605',
            'role_id' => Role::where('name', 'vondeur')->pluck('id')->first(),
            'password' => Hash::make('123456789'),
        ]);
        $livreur = User::create([
            'name' => 'livreur',
            'email' => 'livreur@konly.com',
            'phone' => '0606060604',
            'role_id' => Role::where('name', 'livreur')->pluck('id')->first(),
            'password' => Hash::make('123456789'),
        ]);
        $client = User::create([
            'name' => 'client',
            'email' => 'client@konly.com',
            'phone' => '0606060603',
            'role_id' => Role::where('name', 'client')->pluck('id')->first(),
            'password' => Hash::make('123456789'),
        ]);
        $manager = User::create([
            'name' => 'manager',
            'email' => 'manager@konly.com',
            'phone' => '0606060602',
            'role_id' => Role::where('name', 'manager')->pluck('id')->first(),
            'password' => Hash::make('123456789'),
        ]);
    }
}
