<?php

namespace Database\Factories;

use App\Models\ZipCode;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZipCodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ZipCode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'd_codigo' => $this->faker->word,
        'd_asenta' => $this->faker->word,
        'd_tipo_asenta' => $this->faker->word,
        'D_mnpio' => $this->faker->word,
        'd_estado' => $this->faker->word,
        'd_ciudad' => $this->faker->word,
        'd_CP' => $this->faker->word,
        'c_estado' => $this->faker->word,
        'c_oficina' => $this->faker->word,
        'c_CP' => $this->faker->word,
        'c_tipo_asenta' => $this->faker->word,
        'c_mnpio' => $this->faker->word,
        'id_asenta_cpcons' => $this->faker->word,
        'd_zona' => $this->faker->word,
        'c_cve_ciudad' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
