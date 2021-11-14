<?php

namespace DNT\Dashboard\Providers;

use DNT\Ecommerce\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
	public function viewPaths(): array
	{
		return [
			$this->config['dashboard.view.name'] => $this->config['dashboard.view.path']
		];
	}

	public static function getViewPath(): string
	{
		return __DIR__ . '/../views';
	}
}
