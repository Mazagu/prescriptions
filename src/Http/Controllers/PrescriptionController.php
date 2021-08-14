<?php

namespace Bluesourcery\Prescription\Http\Controllers;

use Bluesourcery\Prescription\Domain\Managers\Prescription\ListPrescriptions;
use Bluesourcery\Prescription\Domain\Managers\Prescription\CreatePrescription;
use Bluesourcery\Prescription\Domain\Managers\Prescription\FilterPrescriptions;
use Bluesourcery\Prescription\Domain\Managers\Prescription\UpdatePrescription;
use Bluesourcery\Prescription\Domain\Managers\Prescription\ShowPrescription;
use Bluesourcery\Prescription\Domain\Managers\Prescription\DeletePrescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of prescriptions.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return app(ListPrescriptions::class)->execute();
    }

    /**
     * Return a filtered list of prescriptions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        return app(FilterPrescriptions::class)->execute([
            'patient_id' => $request->patient_id
        ]);
    }

    /**
     * Store a newly created patient in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        return app(CreatePrescription::class)->execute(
            $request->validate([
                'patient_id' => 'required|integer'
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return app(ShowPrescription::class)->execute(['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cosa  $cosa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parameters = $request->validate([
            'patient_id' => 'required|integer'          
        ]);
        $parameters['id'] = $id;
        return app(UpdatePrescription::class)->execute($parameters);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        return app(DeletePrescription::class)->execute(['id' => $id]);
    }
}
