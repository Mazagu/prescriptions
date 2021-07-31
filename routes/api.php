<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function() {
	Route::namespace('Bluesourcery\Prescription\Http\Controllers')
    ->prefix('patient')
    ->name('patient.')
    ->group(function() {
        Route::get('', 'PatientController@all');
        Route::get('filter', 'PatientController@filter');
        Route::get('/{id}', 'PatientController@show');
        Route::put('/{id}', 'PatientController@update');
        Route::post('', 'PatientController@create');
        Route::delete('{id}', 'PatientController@delete');
    });
});
