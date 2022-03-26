<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'title'=> $this->faker->sentence(3),
        'description'=>$this->faker->paragraph(1),
        'price'=>$this->faker->randomFloat($maxDecimals=2,$min=3,$max=100),
        'stock'=>$this->faker->numberBetween(1,10),
        'status'=>$this->faker->randomElement(['Disponible','No disponible']),
        ];
    }
}
