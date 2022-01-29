<?php

namespace Database\Factories;


use App\Models\User;
use App\Models\Favorito;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class FavoritoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Favorito::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->url(),
            'titulo' => $this->faker->jobTitle(),
            'descripcion' => $this->faker->sentence(),
            'cat_id' => Categoria::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'visibilidad' => $this->faker->randomElement(['publico', 'privado'])
        ];
    }
}
