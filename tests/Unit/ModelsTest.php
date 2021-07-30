<?php

namespace Bluesourcery\Prescription\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Bluesourcery\Prescription\Tests\TestCase;
use Bluesourcery\Prescription\Models\Patient;
use Bluesourcery\Prescription\Models\Prescription;
use Bluesourcery\Prescription\Models\Drug;
use Bluesourcery\Prescription\Models\PatientLog;
use Bluesourcery\Prescription\Models\PrescriptionLog;

class ModelsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function patients_table_exists_with_fields()
    {
        $patient = Patient::create([
            'name' => 'Blue',
            'lastname' => 'Sourcery',
            'id_card' => '44556789C'
        ]);
        $this->assertEquals($patient->id, 1);
        $this->assertEquals($patient->name, 'Blue');
        $this->assertEquals($patient->lastname, 'Sourcery');
        $this->assertEquals($patient->id_card, '44556789C');
    }

    /**
     * @test
     */
    public function drugs_table_exists_with_fields()
    {
        $patient = Patient::factory()->create();
        $prescription = Prescription::create(['patient_id' => $patient->id]);
        $posology = 'One every ten hours';
        $drug = Drug::create([
            'name' => 'Blue',
            'code' => 1234567,
            'prescription_id' => $prescription->id,
            'posology' => $posology
        ]);
        $this->assertEquals($drug->id, 1);
        $this->assertEquals($drug->name, 'Blue');
        $this->assertEquals($drug->code, 1234567);
        $this->assertEquals($drug->prescription_id, $prescription->id);
        $this->assertEquals($drug->posology, $posology);
    }

    /**
     * @test
     */
    public function prescriptions_table_exists_with_fields()
    {
        $patient = Patient::factory()->create();
        $prescription = Prescription::create([
            'patient_id' => $patient->id
        ]);
        $this->assertEquals($prescription->id, 1);
        $this->assertEquals($prescription->patient_id, $patient->id);
    }

}
