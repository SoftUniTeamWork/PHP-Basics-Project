<?php

class CommentTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('comments')->delete();
		Comment::create(array(
			'user_id'     => '1',
			'post_id' => '1',
			'comment_text'    => 'Sample comment text',
		));
	}

}