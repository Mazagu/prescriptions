<?php

namespace Bluesourcery\Prescription;

use Illuminate\Support\ServiceProvider;
use Bluesourcery\Prescription\Domain\Repositories\Patient\PatientRepository;
use Bluesourcery\Prescription\Domain\Repositories\Prescription\PrescriptionRepository;
use Bluesourcery\Prescription\Domain\Repositories\Drug\DrugRepository;

class PrescriptionServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->bind('patientRepository', function($app) {
        return new PatientRepository();
    });

    $this->app->bind('prescriptionRepository', function($app) {
        return new PrescriptionRepository();
    });

    $this->app->bind('drugRepository', function($app) {
        return new DrugRepository();
    });
  }

  public function boot()
  {
    $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
  }
}