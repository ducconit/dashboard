<?php

namespace DNT\Dashboard\Middlewares;

use Illuminate\Auth\Middleware\Authenticate as BaseAuthenticate;

class AuthDashboard extends BaseAuthenticate
{
	/**
	 * Get the path the user should be redirected to when they are not authenticated.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return string|null
	 */
	protected function redirectTo($request)
	{
		if (! $request->expectsJson()) {
			return route('dashboard:login');
		}
	}
}
