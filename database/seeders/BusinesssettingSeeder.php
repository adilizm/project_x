<?php

namespace Database\Seeders;

use App\Models\Businesssetting;
use Illuminate\Database\Seeder;

class BusinesssettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $business_setting = Businesssetting::create([
            'name'=> 'top_10_requested_products', 
            'value'=>'[]', 
            'is_active'=> 1 , 
            
        ]);
        $business_setting = Businesssetting::create([
            'name'=> 'disktop_top_annonce', 
            'value'=> 'top_anonces_barrs/1630781548top_barr.png', 
            'is_active'=> 0 , 
            
        ]);
        $business_setting = Businesssetting::create([
            'name' => 'tablet_top_annonce',
            'value' => 'top_anonces_barrs/1630781558top_barr.png',
            'is_active' => 0,
            
        ]);
        $business_setting = Businesssetting::create([
            'name' => 'phone_top_annonce',
            'value' => 'top_anonces_barrs/1630781569top_barr.png',
            'is_active' => 0,
            
        ]);
       
    }
}
