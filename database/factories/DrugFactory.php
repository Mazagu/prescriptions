<?php

namespace Bluesourcery\Prescription\Database\Factories;

use Bluesourcery\Prescription\Models\Drug;
use Bluesourcery\Prescription\Models\Prescription;
use Illuminate\Database\Eloquent\Factories\Factory;

class DrugFactory extends Factory
{
    protected $model = Drug::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(),
            'code' => $this->faker->numerify('#######'),
            'prescription_id' => Prescription::factory()->create()->id,
            'posology' => $this->faker->text()
        ];
    }
}
