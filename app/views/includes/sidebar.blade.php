<div class="panel panel-default">
	<div class="panel-heading text-left">
    	<h3>Recent Posts</h3>
	</div>
    <ol type = "1" class="list-group">
    @foreach(Post::orderBy('created_at','desc')->paginate(10) as $post)
       <li class="list-group-item text-left"><a href="{{ url('/post/' . $post->id) }}">{{$post->post_title}}</a></li>
    @endforeach
    </ol>
    <div class="panel-heading text-left">
        <h3>Most Visited Posts</h3>
    </div>
    <ol type = "1" class="list-group">
    @foreach(Post::orderBy('visits_counter','desc')->paginate(10) as $post)
       <li class="list-group-item text-left"><a href="{{ url('/post/' . $post->id) }}">{{$post->post_title}}</a></li>
    @endforeach
    </ol>
</div>