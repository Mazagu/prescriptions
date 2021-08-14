<?php

namespace Bluesourcery\Prescription;

use Illuminate\Support\ServiceProvider;
use Bluesourcery\Prescription\Domain\Repositories\Patient\PatientRepository;
use Bluesourcery\Prescription\Domain\Repositories\Patient\CachingPatientRepository;
use Bluesourcery\Prescription\Domain\Repositories\Prescription\PrescriptionRepository;
use Bluesourcery\Prescription\Domain\Repositories\Prescription\CachingPrescriptionRepository;
use Bluesourcery\Prescription\Domain\Repositories\Drug\DrugRepository;
use Bluesourcery\Prescription\Domain\Repositories\Drug\CachingDrugRepository;
use Bluesourcery\Prescription\Domain\Audition\PatientAuditor;
use Bluesourcery\Prescription\Domain\Audition\PrescriptionAuditor;
use Bluesourcery\Prescription\Domain\Audition\DrugAuditor;
use Bluesourcery\Prescription\Providers\EventServiceProvider;

class PrescriptionServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'prescription');
    $this->app->register(EventServiceProvider::class);

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

    $this->app->bind('patientAuditor', function($app) {
        return new PatientAuditor();
    });

    $this->app->bind('prescriptionAuditor', function($app) {
        return new PrescriptionAuditor();
    });

    $this->app->bind('drugAuditor', function($app) {
        return new DrugAuditor();
    });
  }

  public function boot()
  {
    $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

    if ($this->app->runningInConsole()) {
        $this->publishes([
          __DIR__.'/../config/config.php' => config_path('prescription.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../resources/lang/en/prescription.php' => resource_path('lang/en/prescription.php'),
        ], 'locale');
    }
  }
}