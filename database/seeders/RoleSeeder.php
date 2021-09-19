<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name'   => 'admin',
            'permissions'      => '["role.index","role.create","role.edit","role.destroy","users.index","users.edit","users.create","users.destroy","category.index","category.create","category.edit","category.destroy","products.index","products.create","products.edit","products.destroy","Admin","shops.index","shops.create","shops.destroy","shops.edit","cities.index","cities.create","cities.destroy","cities.edit","orders.index","orders.edit","delivery.index","delivery.edit","managers.index","managers.create"]'
        ]);
        $manager = Role::create([
            'name'   =>'manager', 
            'permissions'      =>'[\"Manager\"]',
        ]);
        $vendeur = Role::create([
            'name'   => 'vondeur',
            'permissions'      =>  '[\"category.index\",\"products.index\",\"products.create\",\"products.edit\",\"products.destroy\",\"Vondeur\"]'
            
        ]);
        $livreur = Role::create([
            'name'   => 'livreur',
            'permissions'      =>  '[\"Livreur\"]'

        ]);
        $client = Role::create([
            'name'   => 'client',
            'permissions'      =>  '[]'

        ]);
        $voircategorie = Role::create([
            'name'   => 'voircategorie',
            'permissions'      =>   '[\"category.index\",\"category.create\",\"category.edit\",\"category.destroy\"]'

        ]);
    }
}
