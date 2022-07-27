<?php

class CompaniesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('companies')->delete();
		
		Company::create(array('name' => 'MEO', 'website' => 'http://www.meo.pt', 'isActive' => true));
		Company::create(array('name' => 'Vodafone', 'website' => 'http://www.vodafone.pt', 'isActive' => true));

	}

}