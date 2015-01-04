<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('photos');
		Schema::create('photos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('post_id');
			$table->foreign('post_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('caption')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('photos');
	}

}
