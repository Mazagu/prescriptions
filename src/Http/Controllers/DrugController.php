<?php

namespace Bluesourcery\Prescription\Http\Controllers;

use Bluesourcery\Prescription\Domain\Repositories\Drug\DrugRepository;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    protected $repository;

    public function __construct(DrugRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of drugs.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return $this->repository->all();
    }

    /**
     * Return a filtered list of drugs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $filters = [
            'prescription_id' => $request->prescription_id
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
            'code' => 'required|integer',
            'posology' => 'required|string|min:3|max:255',
            'prescription_id' => 'required|integer'
        ]);

        return $this->repository->create([
            'name' => $request->name,
            'code' => $request->code,
            'posology' => $request->posology,
            'prescription_id' => $request->prescription_id
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
            'code' => 'integer|min:7|max:7',
            'posology' => 'string|min:3|max:255',
            'prescription_id' => 'integer'
        ]);

        $data = [];
        if($request->name) $data['name'] = $request->name;
        if($request->code) $data['code'] = $request->code;
        if($request->posology) $data['posology'] = $request->posology;
        if($request->prescription_id) $data['prescription_id'] = $request->prescription_id;

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
