<?php

namespace Bluesourcery\Prescription\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Bluesourcery\Prescription\Tests\TestCase;
use Bluesourcery\Prescription\Models\Patient;
use Bluesourcery\Prescription\Models\PatientLog;
use Bluesourcery\Prescription\Models\Prescription;
use Bluesourcery\Prescription\Models\PrescriptionLog;
use Bluesourcery\Prescription\Models\Drug;
use Bluesourcery\Prescription\Models\DrugLog;
use Bluesourcery\Prescription\Domain\Audition\PatientAuditor;
use Bluesourcery\Prescription\Domain\Audition\PrescriptionAuditor;
use Bluesourcery\Prescription\Domain\Audition\DrugAuditor;

class AuditionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function audition_audits_patient()
    {
        $patient = Patient::factory()->create();

        $auditor = new PatientAuditor;
        $auditor->created($patient);

        $patient_log = PatientLog::get();
        $this->assertEquals($patient_log[0]->patient_id, $patient->id);
        $this->assertEquals($patient_log[0]->action, 'created');

        $auditor->updated($patient);

        $patient_log = PatientLog::get();
        $this->assertEquals($patient_log[1]->patient_id, $patient->id);
        $this->assertEquals($patient_log[1]->action, 'updated');

        $auditor->deleted($patient);

        $patient_log = PatientLog::get();
        $this->assertEquals($patient_log[2]->patient_id, $patient->id);
        $this->assertEquals($patient_log[2]->action, 'deleted');        
    }

    /**
     * @test
     */
    public function audition_audits_prescription()
    {
        $patient = Patient::factory()->create();
        $prescription = Prescription::create([
            'patient_id' => $patient->id
        ]);

        $auditor = new PrescriptionAuditor;
        $auditor->created($prescription);

        $prescription_log = PrescriptionLog::get();
        $this->assertEquals($prescription_log[0]->prescription_id, $prescription->id);
        $this->assertEquals($prescription_log[0]->action, 'created');

        $auditor->updated($prescription);

        $prescription_log = PrescriptionLog::get();
        $this->assertEquals($prescription_log[1]->prescription_id, $prescription->id);
        $this->assertEquals($prescription_log[1]->action, 'updated');

        $auditor->deleted($prescription);

        $prescription_log = PrescriptionLog::get();
        $this->assertEquals($prescription_log[2]->prescription_id, $prescription->id);
        $this->assertEquals($prescription_log[2]->action, 'deleted');        
    }

    /**
     * @test
     */
    public function audition_audits_drug()
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

        $auditor = new DrugAuditor;
        $auditor->created($drug);

        $drug_log = DrugLog::get();
        $this->assertEquals($drug_log[0]->drug_id, $drug->id);
        $this->assertEquals($drug_log[0]->action, 'created');

        $auditor->updated($drug);

        $drug_log = DrugLog::get();
        $this->assertEquals($drug_log[1]->drug_id, $drug->id);
        $this->assertEquals($drug_log[1]->action, 'updated');

        $auditor->deleted($drug);

        $drug_log = DrugLog::get();
        $this->assertEquals($drug_log[2]->drug_id, $drug->id);
        $this->assertEquals($drug_log[2]->action, 'deleted');        
    }
}
