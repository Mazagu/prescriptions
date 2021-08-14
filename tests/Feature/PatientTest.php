<?php

namespace Bluesourcery\Prescription\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Bluesourcery\Prescription\Tests\TestCase;
use Bluesourcery\Prescription\Models\Patient;
use Bluesourcery\Prescription\Models\PatientLog;
use Bluesourcery\Prescription\Events\PatientCreated;

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

        $patient_log = PatientLog::where('patient_id', $patient->id)->first();
        $this->assertEquals($patient_log->action, 'created');
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

        $patient_log = PatientLog::where('patient_id', $patients[0]->id)->get();
        $this->assertEquals($patient_log[0]->action, 'deleted');
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

        $patient_log = PatientLog::where('patient_id', $patients[0]->id)->get();
        $this->assertEquals($patient_log[0]->action, 'updated');
    }
}
