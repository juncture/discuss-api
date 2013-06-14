<?php

// Set route based on API config, unless null then use Discuss config instead
$route_prefix = Config::get('discuss-api::route') ?: Config::get('discuss::route');

Route::group(array('prefix' => $route_prefix.'/api'), function()
{
	Route::get('/', function()
	{
		return "Hello, World! I'm an API.";
	});

	Route::get('posts', function()
	{
		return Post::with('user', 'tags')->get()->toJson();
	});

	Route::get('tags', function()
	{
		return Tag::with('posts')->get()->toJson();
	});
});
