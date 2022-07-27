<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('email', 70)->unique();
			$table->string('password');
			$table->text('remember_token')->nullable();
			$table->string('firstName', 50)->nullable();
			$table->string('lastName', 50)->nullable();
        	$table->boolean('isVerified')->default(0);
			$table->boolean('isActive')->default(1);
			$table->boolean('isAdmin')->default(0);
			$table->date('birthday')->nullable();
			$table->string('gender', 1)->nullable();
			$table->integer('facebook_id')->nullable();
			$table->integer('company_id')->nullable()->unsigned()->index();
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
			$table->integer('image_id')->nullable();
			$table->integer('images_id')->nullable()->unsigned()->index();
			$table->foreign('images_id')->references('id')->on('images')->onDelete('cascade');
			$table->timestamps();
			$table->softDeletes();
		});

		// Insert admin user
	    DB::table('users')->insert(
	        array(
	            'email' => 'admin@speaker.com',
	            'password' => Hash::make('administrator'),
	            'firstName' => 'Speaker',
	            'lastName' => 'Administrator',
	            'isVerified' => 1,
	            'isActive' => 1,
	            'isAdmin' => 1,
	            'gender' => 'M',
	            'birthday' => date("Y-m-d")
	        ));

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
