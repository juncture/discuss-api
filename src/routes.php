<?php namespace Juncture\DiscussApi;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

// Set route based on API config, unless null then use Discuss config instead
$route_prefix = Config::get('discuss-api::route') ?: Config::get('discuss::route');

Route::group(array('prefix' => $route_prefix.'/api'), function()
{
	Route::get('/', function()
	{
		return "Hello, World! I'm an API.";
	});

	Route::resource('posts', 'Juncture\DiscussApi\PostController');
	Route::resource('tags', 'Juncture\DiscussApi\TagController');
});
