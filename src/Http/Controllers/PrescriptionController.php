<?php

namespace Bluesourcery\Prescription\Http\Controllers;

use Bluesourcery\Prescription\Domain\Repositories\Prescription\PrescriptionRepository;
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
        $repository = new PrescriptionRepository();
        return $repository->all();
    }

    /**
     * Return a filtered list of prescriptions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $repository = new PrescriptionRepository();
        $filters = [
            'patient_id' => $request->patient_id
        ];

        return $repository->filter($filters);
    }

    /**
     * Store a newly created patient in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|integer'
        ]);

        $repository = new PrescriptionRepository();

        return $repository->create([
            'patient_id' => $request->patient_id
        ]);
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
        $repository = new PrescriptionRepository();
        return $repository->show($id);
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
        $request->validate([
            'patient_id' => 'required|integer'
        ]);

        $repository = new PrescriptionRepository();
        $data = [];
        if($request->patient_id) $data['patient_id'] = $request->patient_id;

        return $repository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $repository = new PrescriptionRepository();

        return $repository->delete($id);
    }
}
