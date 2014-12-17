<div class="panel panel-default">
    <form action="{{ url('/results') }}" method="GET" class="form-control-static search-padding">
    	        <input id="search" type="text" placeholder="Type a tag here" name="search" class="form-control col-lg-4">
    	        <input id="submit" type="submit" value="Search" class="form-control btn btn-primary">
    </form>
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
    <div class="panel-heading text-left">
        <h3>Most Popular Tags</h3>
    </div>
    <ol type = "1" class="list-group">
    <?php $tags =  array_count_values(Tag::all()->lists('tag_text'));
            arsort($tags);
            ?>
        @foreach($tags as $tag => $count)
            @if($count != 1)
                <li class="list-group-item text-left"><a href="">{{$tag}}</a> is used {{ $count . ' '}}times </li>
            @else
                <li class="list-group-item text-left"><a href="">{{$tag}}</a> is used {{$count . ' '}} time </li>
            @endif
            @endforeach
    </ol>
</div>