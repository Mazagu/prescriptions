<?php

namespace Bluesourcery\Prescription\Http\Controllers;

use Bluesourcery\Prescription\Domain\Repositories\Prescription\PrescriptionRepository;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    protected $repository;

    public function __construct(PrescriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of prescriptions.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return $this->repository->all();
    }

    /**
     * Return a filtered list of prescriptions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $filters = [
            'patient_id' => $request->patient_id
        ];

        return $this->repository->filter($filters);
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

        return $this->repository->create([
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
        return $this->repository->show($id);
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

        $data = [];
        if($request->patient_id) $data['patient_id'] = $request->patient_id;

        return $this->repository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        return $this->repository->delete($id);
    }
}
