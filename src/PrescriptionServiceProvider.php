<?php

namespace Bluesourcery\Prescription;

use Illuminate\Support\ServiceProvider;
use Bluesourcery\Prescription\Domain\Repositories\Patient\PatientRepository;
use Bluesourcery\Prescription\Domain\Repositories\Patient\CachingPatientRepository;
use Bluesourcery\Prescription\Domain\Repositories\Prescription\PrescriptionRepository;
use Bluesourcery\Prescription\Domain\Repositories\Prescription\CachingPrescriptionRepository;
use Bluesourcery\Prescription\Domain\Repositories\Drug\DrugRepository;
use Bluesourcery\Prescription\Domain\Repositories\Drug\CachingDrugRepository;

class PrescriptionServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->bind('patientRepository', function($app) {
        return new PatientRepository();
    });

    $this->app->bind('cachingPatientRepository', function($app) {
        $patientRepository = new PatientRepository();
        return new CachingPatientRepository($patientRepository);
    });

    $this->app->bind('prescriptionRepository', function($app) {
        return new PrescriptionRepository();
    });

    $this->app->bind('cachingPrescriptionRepository', function($app) {
        $prescriptionRepository = new PrescriptionRepository();
        return new CachingPrescriptionRepository($prescriptionRepository);
    });

    $this->app->bind('drugRepository', function($app) {
        return new DrugRepository();
    });

    $this->app->bind('cachingDrugRepository', function($app) {
        $drugRepository = new DrugRepository();
        return new CachingDrugRepository($drugRepository);
    });
  }

  public function boot()
  {
    $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
  }
}