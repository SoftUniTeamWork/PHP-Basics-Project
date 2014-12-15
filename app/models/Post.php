<?php 
	class Post extends Eloquent
	{
		protected $table = 'posts';
		public function comments()
		{
			return $this->hasMany('Comment');
		}
		
		public function tags()
		{
			return $this->hasMany('Tag');
		}

		public function user()
		{
			return $this->belongsTo('User');
		}


	}
 ?>