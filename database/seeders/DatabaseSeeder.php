<?php

namespace Database\Seeders;


use App\Models\Businesssetting;
use App\Models\Product;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //\App\Models\Product::factory(100)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BusinesssettingSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(SliderSeeder::class);

    }
}
