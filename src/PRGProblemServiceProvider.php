<?php

namespace DecideNowLib\PRGProblem;

use Illuminate\Support\ServiceProvider;

class PRGProblemServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadRoutesFrom(__DIR__.'/Routes/web.php');
		$this->loadViewsFrom(__DIR__.'/Views', 'prg_problem');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
	
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		//
	}
}
