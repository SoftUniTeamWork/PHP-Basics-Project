<?php

class CommentTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('comments')->delete();
		Comment::create(array(
			'user_id'     => '1',
			'post_id' => '1',
			'author_name' => 'anonymous',
			'comment_type' => '0',
			'comment_text'    => 'Sample comment text',
		));
	}

}