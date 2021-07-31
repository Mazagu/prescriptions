<?php

namespace Bluesourcery\Prescription\Database\Factories;

use Bluesourcery\Prescription\Models\Patient;
use Bluesourcery\Prescription\Models\Prescription;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrescriptionFactory extends Factory
{
    protected $model = Prescription::class;

    public function definition()
    {
        return [
            'patient_id' => Patient::factory()->create()->id
        ];
    }
}
