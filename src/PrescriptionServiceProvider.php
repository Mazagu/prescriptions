<?php

namespace Bluesourcery\Prescription;

use Illuminate\Support\ServiceProvider;

class PrescriptionServiceProvider extends ServiceProvider
{
  public function register()
  {
    //
  }

  public function boot()
  {
    $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
  }
}