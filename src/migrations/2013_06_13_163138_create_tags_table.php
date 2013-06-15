<?php namespace Juncture\DiscussApi;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$table = $this->prefix.'tags';

		Schema::create($table, function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 15);
			$table->string('class', 10)->default('info');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($this->prefix.'tags');
	}

}
