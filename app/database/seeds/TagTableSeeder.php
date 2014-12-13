<?php

class TagTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('tags')->delete();
		Tag::create(array(
			'post_id' => '1',
			'tag_text' => 'sampleTag',
		));
	}

}