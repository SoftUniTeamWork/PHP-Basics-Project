<aside class="right">
    <h3>Recent Posts</h3>
    <ul>
    @foreach($recentPosts as $post)
       <li><a href="">{{$post->id}}</a></li>
    @endforeach
    </ul>
    <h3>Most Visited Posts</h3>
    <ul>
    @foreach($mostVisited as $post)
       <li><a href="">{{$post->id}}</a></li>
    @endforeach
    </ul>
</aside>