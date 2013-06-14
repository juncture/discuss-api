<?php

use Illuminate\Database\Schema\Blueprint;

class CreatePostTagTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->prefix.'post_tag', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			$table->timestamps();

			$table->foreign('post_id')->references('id')->on($this->prefix.'posts');
			$table->foreign('tag_id')->references('id')->on($this->prefix.'tags');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($this->prefix.'post_tag');
	}

}
