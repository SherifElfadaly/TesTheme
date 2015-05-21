<?php
namespace App\Modules\Testtheme\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class TestthemeServiceProvider extends ServiceProvider
{
	/**
	 * Register the Testtheme module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\Testtheme\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Testtheme module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('testtheme', __DIR__.'/../Resources/Lang/');

		View::addNamespace('testtheme', __DIR__.'/../Resources/Views/');
	}
}
