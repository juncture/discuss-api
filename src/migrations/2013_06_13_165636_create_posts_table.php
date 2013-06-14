<?php

use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create($this->prefix.'posts', function(Blueprint $table)
		{
			$user_key = Config::get('discuss-api::user_key');
			$user_table = Config::get('discuss-api::user_table');

			$this->checkConfig($user_key, $user_table);

			$table->increments('id');
			$table->integer('parent_id')->default(-1);
			$table->integer('user_id')->unsigned();
			$table->boolean('important');
			$table->string('title');
			$table->text('message');
			$table->timestamps();

			$table->foreign('parent_id')->references('id')->on($this->prefix.'posts');
			$table->foreign('user_id')->references($user_key)->on($user_table);
			$table->index('title');
		});
	}

	/**
	 * Check user table and key is configured correctly
	 *
	 * @param  string $key   Field to identify users by
	 * @param  string $table Which table users are stored in
	 * @return void
	 */
	public function checkConfig($key, $table)
	{
		if (!$key || !$table)
		{
			throw new Exception('User key or table is missing. Ensure you have properly configured discuss-api.');
		}

		// Discuss is bare-bones so people can use their own user systems.
		// Check the specified table really exists, or bad shit could happen.
		if (!Schema::hasTable($table))
		{
			throw new Exception('User table "'.$table.'" does not exist.');
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($this->prefix.'posts');
	}

}
