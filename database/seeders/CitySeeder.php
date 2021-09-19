<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agadir = City::create([
            'name' => 'Agadir'
        ]);
        $ifrane = City::create([
            'name' => 'Agadir'
        ]);
        $rabat = City::create([
            'name' => 'Rabat'
        ]);
    }
}
