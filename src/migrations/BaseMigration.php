<?php namespace Juncture\DiscussApi;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class BaseMigration extends Migration {

	public function __construct()
	{
		$this->prefix = Config::get('discuss-api::table_prefix');
	}

}
