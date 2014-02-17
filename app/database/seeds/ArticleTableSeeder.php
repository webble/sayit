<?php

class ArticleTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('article')->truncate();

		Article::create(array(
			'title' => 'Test article',
			'teaser' => 'Teaser text',
			'markdown' => '## h2 header',
			'html' => '<h2>h2 header</h2>',
			'user_id' => 1,
			'channel_id' => 1,
		));
	}

}
