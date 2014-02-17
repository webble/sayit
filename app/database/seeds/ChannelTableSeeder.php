<?php

class ChannelTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('channel')->truncate();

		Channel::create(array(
			'title' => 'Default channel',
			'slug' => 'default-channel',
		));
	}

}
