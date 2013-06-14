<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Discuss URL
	|--------------------------------------------------------------------------
	|
	| This setting determines which URLs the Discuss API should respond to.
	| If you have installed the Discuss frontend alongside this API, leaving
	| this set to null will use http://yoursite.com/[DISCUSS_SETTING]/api
	|
	| Note: `/api` will automatically be appended to the URL
	|
	*/

	'route' => null,

	/*
	|--------------------------------------------------------------------------
	| Table Prefix
	|--------------------------------------------------------------------------
	|
	| This setting determines which URLs the Discuss API should respond to.
	| If you have installed the Discuss frontend alongside this API, leaving
	| this set to null will use http://yoursite.com/[DISCUSS_SETTING]/api
	|
	*/

	'table_prefix' => 'discuss_',

	/*
	|--------------------------------------------------------------------------
	| User Table
	|--------------------------------------------------------------------------
	|
	| Discuss is a barebones package, and as such does not create any schema
	| for users/groups/whatever. Set this to whatever table you're using to
	| store user data (usually `users`) so we can tap into it.
	|
	*/

	'user_table' => 'users',

	/*
	|--------------------------------------------------------------------------
	| User Primary Key
	|--------------------------------------------------------------------------
	|
	| This should be set to the name of your user table's primary key. We've
	| set it as `id` by default. If your system is different then make sure
	| you set it correctly to prevent failed migrations.
	|
	*/

	'user_key' => 'id',

);
