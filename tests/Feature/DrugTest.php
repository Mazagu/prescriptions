<?php

namespace Bluesourcery\Prescription\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Bluesourcery\Prescription\Tests\TestCase;
use Bluesourcery\Prescription\Models\Drug;
use Bluesourcery\Prescription\Models\Prescription;
use Bluesourcery\Prescription\Models\DrugLog;

class DrugTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function list_all_drugs()
    {
        $drugs = Drug::factory()->count(10)->create();
        $response = $this->get('api/drug/');
        $response->assertStatus(200);
        $this->assertEquals($drugs[0]->id, $response[0]['id']);
    }

    /**
     * @test
     */
    public function filter_list_of_drugs()
    {
        $drugs = Drug::factory()->count(10)->create();
        $response = $this->get('api/drug/filter?prescription_id=' . $drugs[5]->prescription_id);
        $this->assertEquals($drugs[5]->id, $response[0]['id']);
    }

    /**
     * @test
     */
    public function create_a_drug()
    {
        $prescription = Prescription::factory()->create();
        $response = $this->post(
            'api/drug', 
            [
                'name' => 'Blue',
                'code' => 1234567,
                'prescription_id' => $prescription->id,
                'posology' => 'One every 8 hours'
            ]
        );
        $response->assertStatus(201);

        $drug = Drug::where('prescription_id', $prescription->id)->first();
        $this->assertEquals($drug->prescription_id, $prescription->id);

        $drug_log = DrugLog::where('drug_id', $drug->id)->get();
        $this->assertEquals($drug_log[0]->action, 'created');
    }

    /**
     * @test
     */
    public function get_details_of_drug()
    {
        $drugs = Drug::factory()->count(1)->create();
        $response = $this->get('api/drug/' . $drugs[0]->id);
        $response->assertStatus(200);
        $this->assertEquals($response['prescription_id'], $drugs[0]->prescription_id);
    }

    /**
     * @test
     */
    public function delete_drug()
    {
        $drugs = Drug::factory()->count(1)->create();
        $response = $this->delete('api/drug/' . $drugs[0]->id);
        $response->assertStatus(200);
        $this->assertEquals(Drug::count(), 0);

        $drug_log = DrugLog::where('drug_id', $drugs[0]->id)->get();
        $this->assertEquals($drug_log[0]->action, 'deleted');
    }

    /**
     * @test
     */
    public function update_drug()
    {
        $drugs = Drug::factory()->count(1)->create();
        $response = $this->put(
            'api/drug/' . $drugs[0]->id, 
            ['name' => 'Blue']
        );
        $response->assertStatus(200);
        $this->assertEquals(Drug::find($drugs[0]->id)->name, 'Blue');

        $drug_log = DrugLog::where('drug_id', $drugs[0]->id)->get();
        $this->assertEquals($drug_log[0]->action, 'updated');
    }
}
