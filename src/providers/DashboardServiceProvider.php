<?php

namespace DNT\Dashboard\Providers;

use DNT\Dashboard\Contracts\Admin;
use DNT\Dashboard\Middlewares\AuthDashboard;
use DNT\Dashboard\Middlewares\GuestDashboard;
use DNT\Ecommerce\Support\ServiceProvider;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Routing\Router;

class DashboardServiceProvider extends ServiceProvider
{

	public function register()
	{
		$this->mergeConfigFrom($this->getConfigPath(), 'dashboard');

	}

	public function boot()
	{
		$config = $this->app['config'];
		$this->binding($config);
		$this->loadTranslationsFrom(__DIR__.'/../lang','dashboard');

		$this->middlewares();
		$this->publishes([
			// config
			$this->getConfigPath() => config_path(),
			// views
			ViewServiceProvider::getViewPath() => $config['dashboard.view.path'],
			// routes
			RouteServiceProvider::getRoutePath() => $config['dashboard.route.path'],
			// sass
			__DIR__ . '/../assets/scss' => resource_path('scss'),
			// js
			__DIR__ . '/../assets/js' => resource_path('js'),
		], 'dashboard');
	}

	private function getConfigPath(): string
	{
		return __DIR__ . '/../config/dashboard.php';
	}

	private function binding(Repository $config)
	{
		$this->app->bind(Admin::class, $config['dashboard.model']);
	}

	private function middlewares()
	{
		$kernel = $this->app->make(Router::class);
		$kernel->aliasMiddleware('authDashboard', AuthDashboard::class);
		$kernel->aliasMiddleware('guestDashboard', GuestDashboard::class);
	}
}
