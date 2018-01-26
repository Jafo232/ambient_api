<?php

namespace jafo232\ambientapi;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AmbientApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //

		$this->publishes([__DIR__.'/config/ambient.php' => config_path('ambient.php')]);

		if ($this->app->runningInConsole()) {
			$this->commands([
				'\jafo232\ambientapi\Console\Commands\Example',
			]);
		}

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
		App::bind('ambientapi', function()
		{
			return new \jafo232\ambientapi\AmbientApi;
		});


    }
}
