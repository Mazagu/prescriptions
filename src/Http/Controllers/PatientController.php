<?php

namespace Bluesourcery\Prescription\Http\Controllers;

use Bluesourcery\Prescription\Domain\Commands\Patient\ListPatients;
use Bluesourcery\Prescription\Domain\Commands\Patient\FilterPatients;
use Bluesourcery\Prescription\Domain\Commands\Patient\CreatePatient;
use Bluesourcery\Prescription\Domain\Commands\Patient\ShowPatient;
use Bluesourcery\Prescription\Domain\Commands\Patient\UpdatePatient;
use Bluesourcery\Prescription\Domain\Commands\Patient\DeletePatient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of patients.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return app(ListPatients::class)->execute();
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
        return app(FilterPatients::class)->execute($filters);
    }

    /**
     * Store a newly created patient in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        return app(CreatePatient::class)->execute(
            $request->validate([
                'name' => 'required|string|min:3|max:255',
                'lastname' => 'required|string|min:3|max:255',
                'id_card' => 'required|string|min:3|max:255'
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
        return app(ShowPatient::class)->execute(['id' => $id]);
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
            'name' => 'string|min:3|max:255',
            'lastname' => 'string|min:3|max:255',
            'id_card' => 'string|min:3|max:255'
        ]);
        $parameters['id'] = $id;
        return app(UpdatePatient::class)->execute($parameters);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        return app(DeletePatient::class)->execute(['id' => $id]);
    }
}
