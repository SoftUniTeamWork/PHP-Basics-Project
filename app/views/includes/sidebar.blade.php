    <div class="panel panel-default">
    	<div class="panel-heading">
	    	<h3>Recent Posts</h3>
    	</div>
	    <ul class="list-group">
	    @foreach(Post::orderBy('created_at','desc')->paginate(10) as $post)
	       <li class="list-group-item"><a href="{{ url('/post/' . $post->id) }}">{{$post->post_title}}</a></li>
	    @endforeach
	    </ul>
	    <h3>Most Visited Posts</h3>
	    <ul class="list-group">
	    @foreach(Post::orderBy('visits_counter','desc')->paginate(10) as $post)
	       <li class="list-group-item"><a href="{{ url('/post/' . $post->id) }}">{{$post->post_title}}</a></li>
	    @endforeach
	    </ul>
    </div>