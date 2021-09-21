<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;


class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $english = Language::create([
            'name'   => 'english',
            'key'   =>'en',
            'rtl'   =>'1',
            'image_path'=> 'flags/en.png'
        ]);
        $arabic = Language::create([
            'name'   => 'العربية',
            'key'   => 'ar',
            'rtl'   => '1',
            'image_path' => 'flags/ar.png'
        ]);
        $french = Language::create([
            'name'   => 'francais',
            'key'   => 'fr',
            'rtl'   => '0',
            'image_path' => 'flags/fr.png'
        ]);
        
    }
}
