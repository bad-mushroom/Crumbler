<?php 

namespace Badmushroom\Crumbler;

use Illuminate\Support\ServiceProvider;

class CrumblerServiceProvider extends ServiceProvider 
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('Badmushroom\Crumbler', 'Badmushroom\Crumbler');
	}
	
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['Crumbler'] = $this->app->share(function($app) {
            return new Crumbler();
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
