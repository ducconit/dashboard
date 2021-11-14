<?php

namespace DNT\Dashboard\Providers;

use DNT\Ecommerce\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
	public function viewPaths(): array
	{
		if (!file_exists($this->config['dashboard.view.path'])) {
			$this->config->set('dashboard.view.path', $this->getViewPath());
		}
		return [
			$this->config['dashboard.view.name'] => $this->config['dashboard.view.path']
		];
	}

	public static function getViewPath(): string
	{
		return __DIR__ . '/../views/dashboard';
	}
}
