<div class="panel panel-default">
    <form action="{{ url('/searchByForm') }}" method="GET" class="form-control-static search-padding">

    <div class="row">
        <div class="search">
        <input type="text" class="form-control input-sm" maxlength="64" placeholder="Search" name="search"/>
         <button type="submit" id="button" class="btn btn-primary btn-sm">Search</button>
        </div>
    </div>
       <div class="form-inline text-center">
            <label class="radio">Tag</label><input type="radio" name="sortBy" value="tag" checked>
            <label class="radio">Username</label><input type="radio" name="sortBy" value="username">
            <label class="radio">Post Title</label><input type="radio" name="sortBy" value="postTitle">
        </div>
    </form>
	<div class="panel-heading text-left">
    	<h3>Recent Posts</h3>
	</div>
    <ol type = "1" class="list-group">
    @foreach(Post::orderBy('created_at','desc')->take(5)->get() as $post)
       <li class="list-group-item text-left">
       <p class="text-center"><span><span class="glyphicon glyphicon-time"></span> {{ date('j M Y h:i', strtotime($post->created_at)) }}</span></p>
           <a href="{{ url('/post/' . $post->id) }}">{{$post->post_title}}</a>
       </li>
    @endforeach
    </ol>
    <div class="panel-heading text-left">
        <h3>Most Visited Posts</h3>
    </div>
    <ol type = "1" class="list-group">
    @foreach(Post::orderBy('visits_counter','desc')->take(5)->get() as $post)
       <li class="list-group-item text-left">
            <span class="badge">{{ $post->visits_counter }}</span>
            <a href="{{ url('/post/' . $post->id) }}">{{$post->post_title}}</a>
       </li>

    @endforeach
    </ol>
    <div class="panel-heading text-left">
        <h3>Most Popular Tags</h3>
    </div>
    <ol type = "1" class="list-group">
    <?php $tags =  array_count_values(Tag::all()->lists('tag_text'));
            arsort($tags);
            $tags = array_slice($tags, 0, 5);
            ?>
        @foreach($tags as $tag => $count)
            @if($count != 1)
                <li class="list-group-item text-left">
                    <span class="badge text-left">{{ $count }}</span>
                    <a href="{{ url('/searchByTag/' . $tag) }}">{{$tag}}</a>
                </li>
            @else
                <li class="list-group-item text-left">
                    <span class="badge text-left">{{ $count }}</span>
                    <a href="{{ url('/searchByTag/' . $tag) }}">{{$tag}}</a>
                </li>
            @endif
            @endforeach
    </ol>
</div>