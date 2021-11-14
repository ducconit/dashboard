<?php

namespace DNT\Dashboard\Providers;

use DNT\Ecommerce\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{

	public function register()
	{
		$this->mergeConfigFrom($this->getConfigPath(), 'dashboard');

	}

	public function boot()
	{
		$config = $this->app['config'];
		$this->publishes([
			// config
			$this->getConfigPath() => config_path(),
			// views
			ViewServiceProvider::getViewPath() => $config['dashboard.view.path'],
			// routes
			RouteServiceProvider::getRoutePath() => $config['dashboard.route.path'],
			// sass
			__DIR__.'/../assets/scss'=>resource_path('scss'),
			// js
			__DIR__.'/../assets/js'=>resource_path('js'),
		], 'dashboard');
	}

	private function getConfigPath(): string
	{
		return __DIR__ . '/../config/dashboard.php';
	}
}
