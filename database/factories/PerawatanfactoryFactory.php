<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Perawatan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerawatanfactoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Perawatan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama'=> $this->faker->name,
            'alamat'=>$this->faker->addres
        ];
    }
}
