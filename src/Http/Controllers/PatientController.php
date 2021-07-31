<?php

namespace Bluesourcery\Prescription\Http\Controllers;

use Bluesourcery\Prescription\Domain\Repositories\Patient\PatientRepository;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    protected $repository;

    public function __construct(PatientRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of patients.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return $this->repository->all();
    }

    /**
     * Return a filtered list of patients.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $filters = [
            'name' => $request->name,
            'lastname' => $request->lastname,
            'id_card' => $request->id_card
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
            'name' => 'required|string|min:3|max:255',
            'lastname' => 'required|string|min:3|max:255',
            'id_card' => 'required|string|min:3|max:255'
        ]);

        return $this->repository->create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'id_card' => $request->id_card
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
            'name' => 'string|min:3|max:255',
            'lastname' => 'string|min:3|max:255',
            'id_card' => 'string|min:3|max:255'
        ]);

        $data = [];
        if($request->name) $data['name'] = $request->name;
        if($request->lastname) $data['lastname'] = $request->lastname;
        if($request->id_card) $data['id_card'] = $request->id_card;

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
