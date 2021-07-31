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

    Route::namespace('Bluesourcery\Prescription\Http\Controllers')
    ->prefix('prescription')
    ->name('prescription.')
    ->group(function() {
        Route::get('', 'PrescriptionController@all');
        Route::get('filter', 'PrescriptionController@filter');
        Route::get('/{id}', 'PrescriptionController@show');
        Route::put('/{id}', 'PrescriptionController@update');
        Route::post('', 'PrescriptionController@create');
        Route::delete('{id}', 'PrescriptionController@delete');
    });
});
