<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Camiseta;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Camiseta>
 */
class CamisetaFactory extends Factory
{
    protected $model = Camiseta::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'precio' => $this->faker->randomNumber(2),
            'descripcion' => $this->faker->word,
        ];
    }
}
