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
         \App\Models\Product::factory(100)->create();
        $B1=New Businesssetting();
        $B1->create([
            'name'=>'',
            'value'=>'',
            'is_active'=>'',
            'from'=>'',
            'to'=>'',
            'link'=>''
        ]);
    }
}
