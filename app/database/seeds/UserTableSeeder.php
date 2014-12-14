<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'name'     => 'admin',
			'username' => 'admin',
			'email'    => 'admin@gmail.com',
			'password' => Hash::make('strongpassword'),
			'age' => '19',
			'user_level' => '1',
		));
		User::create(array(
			'name'     => 'user',
			'username' => 'user',
			'email'    => 'user@gmail.com',
			'password' => Hash::make('weakpassword'),
			'age' => '40',
			'user_level' => '0',));
	}

}
