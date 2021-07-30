<?php

namespace Bluesourcery\Prescription\Database\Factories;

use Bluesourcery\Prescription\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'lastname' => $this->faker->lastName(),
            'id_card' => $this->faker->randomNumber(9),
        ];
    }
}
