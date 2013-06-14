<?php

use Illuminate\Database\Migrations\Migration;

class BaseMigration extends Migration {

	public function __construct()
	{
		$this->prefix = Config::get('discuss-api::table_prefix');
	}

}
