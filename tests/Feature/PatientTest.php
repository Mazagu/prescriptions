<?php

namespace Bluesourcery\Prescription\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Bluesourcery\Prescription\Tests\TestCase;
use Bluesourcery\Prescription\Models\Patient;

class PatientTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function list_all_patients()
    {
        $patients = Patient::factory()->count(10)->create();
        $response = $this->get('api/patient/');
        $this->assertEquals($patients[0]->name, $response[0]['name']);
    }

    /**
     * @test
     */
    public function filter_list_of_patients()
    {
        $patients = Patient::factory()->count(10)->create();
        $response = $this->get('api/patient/filter?name=' . $patients[5]->name);
        $this->assertEquals($patients[5]->name, $response[0]['name']);
    }

    /**
     * @test
     */
    public function create_a_patient()
    {
        $response = $this->post(
            'api/patient', 
            [
                'name' => 'Blue',
                'lastname' => 'Sourcery',
                'id_card' => '123456789'
            ]
        );
        $response->assertStatus(201);

        $patient = Patient::where('name', 'Blue')->first();
        $this->assertEquals($patient->name, 'Blue');
    }

    /**
     * @test
     */
    public function get_details_of_patient()
    {
        $patients = Patient::factory()->count(1)->create();
        $response = $this->get('api/patient/' . $patients[0]->id);
        $response->assertStatus(200);
        $this->assertEquals($response['name'], $patients[0]->name);
    }

    /**
     * @test
     */
    public function delete_patient()
    {
        $patients = Patient::factory()->count(1)->create();
        $response = $this->delete('api/patient/' . $patients[0]->id);
        $response->assertStatus(200);
        $this->assertEquals(Patient::count(), 0);
    }

    /**
     * @test
     */
    public function update_patient()
    {
        $patients = Patient::factory()->count(1)->create();
        $response = $this->put('api/patient/' . $patients[0]->id, ['name' => "Blue"]);
        $response->assertStatus(200);
        $this->assertEquals(Patient::find($patients[0]->id)->name, "Blue");
    }
}
