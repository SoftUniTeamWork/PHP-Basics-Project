<?php

class PostTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('posts')->delete();
		Post::create(array(
			'user_id'     => '1',
			'post_title' => 'Sample title',
			'post_text'    => 'Sample post text',
			'visits_counter' => '1',
		));
	}

}