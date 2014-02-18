<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('user')->truncate();

		User::create(array(
			'name' => 'Boy Hagemann',
			'username' => 'boyhagemann',
			'email' => 'test@test.nl',
		));
	}

}
