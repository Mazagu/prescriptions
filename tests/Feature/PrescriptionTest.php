<?php

namespace Bluesourcery\Prescription\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Bluesourcery\Prescription\Tests\TestCase;
use Bluesourcery\Prescription\Models\Patient;
use Bluesourcery\Prescription\Models\Prescription;

class PrescriptionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function list_all_prescriptions()
    {
        $prescriptions = Prescription::factory()->count(10)->create();
        $response = $this->get('api/prescription/');
        $response->assertStatus(200);
        $this->assertEquals($prescriptions[0]->id, $response[0]['id']);
    }

    /**
     * @test
     */
    public function filter_list_of_patients()
    {
        $prescriptions = Prescription::factory()->count(10)->create();
        $response = $this->get('api/prescription/filter?patient_id=' . $prescriptions[5]->patient_id);
        $this->assertEquals($prescriptions[5]->id, $response[0]['id']);
    }

    /**
     * @test
     */
    public function create_a_prescription()
    {
        $patient = Patient::factory()->create();
        $response = $this->post(
            'api/prescription', 
            [
                'patient_id' => $patient->id
            ]
        );
        $response->assertStatus(201);

        $prescription = Prescription::where('patient_id', $patient->id)->first();
        $this->assertEquals($prescription->id, $patient->id);
    }

    /**
     * @test
     */
    public function get_details_of_patient()
    {
        $prescriptions = Prescription::factory()->count(1)->create();
        $response = $this->get('api/prescription/' . $prescriptions[0]->id);
        $response->assertStatus(200);
        $this->assertEquals($response['patient_id'], $prescriptions[0]->patient_id);
    }

    /**
     * @test
     */
    public function delete_patient()
    {
        $prescriptions = Prescription::factory()->count(1)->create();
        $response = $this->delete('api/prescription/' . $prescriptions[0]->id);
        $response->assertStatus(200);
        $this->assertEquals(Prescription::count(), 0);
    }

    /**
     * @test
     */
    public function update_patient()
    {
        $prescriptions = Prescription::factory()->count(1)->create();
        $patient = Patient::factory()->create();
        $response = $this->put(
            'api/prescription/' . $prescriptions[0]->id, 
            ['patient_id' => $patient->id]
        );
        $response->assertStatus(200);
        $this->assertEquals(Prescription::find($prescriptions[0]->id)->patient_id, $patient->id);
    }
}
