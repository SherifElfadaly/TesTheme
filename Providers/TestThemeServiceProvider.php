<?php
namespace App\Modules\TestTheme\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class TestThemeServiceProvider extends ServiceProvider
{
	/**
	 * Register the TestTheme module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\TestTheme\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the TestTheme module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('test-theme', __DIR__.'/../Resources/Lang/');

		View::addNamespace('test-theme', __DIR__.'/../Resources/Views/');
	}
}
