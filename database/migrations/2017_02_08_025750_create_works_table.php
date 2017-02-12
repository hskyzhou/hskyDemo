<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('works', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name')->default('');
            $table->string('desc')->default('');
            $table->string('belong_project')->default('')->comment('工作所属项目');

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
		Schema::drop('works');
	}

}
