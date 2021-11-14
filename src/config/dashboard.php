<?php

return [
	/**
	 * Router
	 */
	'route' => [
		/**
		 * Prefix route
		 */
		'prefix' => 'dashboard',

		'name' => 'dashboard:',


		/**
		 * Middleware base
		 */
		'middleware' => ['web'],

		/**
		 * Namespace
		 */
		'namespace' => '',


		/**
		 * Danh sách route
		 */
		'path' => base_path('routes/dashboard.php')
	],
	/**
	 * Views
	 */
	'view' => [
		'name' => 'dashboard',
		'path' => resource_path('views/dashboard')
	],
	'model' => \App\Models\User::class
];
