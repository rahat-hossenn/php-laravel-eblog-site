<div class="blog_sidebar">
    <div class="p-3 p-xl-4 border rounded">
        <div class="card_header mb-4">
            <h3>Categories</h3>
        </div>
        <div class="categories_list">
            <ul>
                @foreach($category as $cat)
                    <li>
                        <a href="{{ route('category.show', $cat->slug) }}">
                            {{ $cat->title }} ({{ $cat->posts_count }})
                        </a>
                    </li> 
                @endforeach
            </ul>
            
        </div>
    </div>
    <div class="p-3 p-xl-4 border rounded mt-2">
        <div class="card_header mb-4">
            <h3>Latest Posts</h3>
        </div>
        <div class="latestpost_list">
            <ul>
                @foreach($latestPost as $post)
                <li><a href="{{route('blog.show',$post->slug)}}">{{$post->title}}</a></li> 
                @endforeach
            </ul>
        </div>
    </div>
</div>