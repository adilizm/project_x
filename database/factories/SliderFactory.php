<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             'laptop_path' => 'sliders_pc/laptop_path-'.rand(1,4).'.jpg',
            'link' => $this->faker->url(),
            'position' => rand(0,10),
            'click_counter' => $this->faker->unique()->randomDigit
           
        ];
    }
}
