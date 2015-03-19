<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Companies extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company', function($table)
            {
                $table->increments('id');
                $table->string('company_name', 40);
                $table->string('description', 128);
                $table->string('country', 20);
                $table->string('city', 20);
                $table->string('address', 20);
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
		Schema::drop('company');
	}

}
