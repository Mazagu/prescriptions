<?php

namespace Bluesourcery\Prescription\Http\Controllers;

use Bluesourcery\Prescription\Domain\Managers\Drug\ListDrugs;
use Bluesourcery\Prescription\Domain\Managers\Drug\FilterDrugs;
use Bluesourcery\Prescription\Domain\Managers\Drug\CreateDrug;
use Bluesourcery\Prescription\Domain\Managers\Drug\ShowDrug;
use Bluesourcery\Prescription\Domain\Managers\Drug\UpdateDrug;
use Bluesourcery\Prescription\Domain\Managers\Drug\DeleteDrug;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    /**
     * Display a listing of drugs.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return app(ListDrugs::class)->execute();
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
            'name' => $request->name,
            'code' => $request->code,
            'prescription_id' => $request->prescription_id
        ];
        return app(FilterDrugs::class)->execute($filters);
    }

    /**
     * Store a newly created patient in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        return app(CreateDrug::class)->execute(
            $request->validate([
                'name' => 'required|string|min:3|max:255',
                'code' => 'required|integer',
                'posology' => 'required|string|min:3|max:255',
                'prescription_id' => 'required|integer'
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
        return app(ShowDrug::class)->execute(['id' => $id]);
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
            'code' => 'integer|min:7|max:7',
            'posology' => 'string|min:3|max:255',
            'prescription_id' => 'integer'
        ]);
        $parameters['id'] = $id;

        return app(UpdateDrug::class)->execute($parameters);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        return app(DeleteDrug::class)->execute(['id' => $id]);
    }
}
