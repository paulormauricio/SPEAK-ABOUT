<?php

class PublicPollsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('public_polls_options')->delete();
		DB::table('public_polls')->delete();


		$public_polls = array(
			'questionName' => 'Poll para testes',
			'lastResponseDate' => new DateTime("2014-07-08 11:14:15.638276"),
			'isActive' => true
		);

		
		// Uncomment the below to run the seeder
		DB::table('public_polls')->insert($public_polls);
	}

}
