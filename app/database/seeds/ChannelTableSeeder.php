<?php

class ChannelTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('channel')->truncate();

		$channel = array(
			'title' => 'Default channel',
			'slug' => 'default-channel',
		);

		// Uncomment the below to run the seeder
		 DB::table('channel')->insert($channel);
	}

}
