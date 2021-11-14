<?php

namespace DNT\Dashboard\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

	public function boot()
	{
		/**
		 * Cấu hình route chung cho dashboard
		 * name, prefix, middleware, path
		 */
		$config = $this->app->make('config');

		$this->routes(function () use ($config) {
			$path = $config->get('dashboard.route.path', $this->getRoutePath());
			/**
			 * Kiểm tra đường dẫn
			 */
			if (!file_exists($path)) {
				$path = $this->getRoutePath();
			}
			Route::prefix($config['dashboard.route.prefix'])
				->name($config['dashboard.route.name'])
				->namespace($config['dashboard.route.namespace'])
				->middleware($config['dashboard.route.middleware'])
				->group($path);
		});
	}

	public static function getRoutePath(): string
	{
		return __DIR__ . '/../routes/dashboard.php';
	}
}
