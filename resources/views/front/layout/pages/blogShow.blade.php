@section("title", getSetting()->blog_show_title ) 
@extends("front.layout.app")
@section("content")
   <!-- ======================= breadcrumb Start  ============================ -->
   <div class="breadcrumb_sec py-3">
    <div class="container">
        <nav>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">{{$select->title}}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- ======================= breadcrumb End  ============================ -->
 <!-- banner advertisement start -->
 <div class="blog_section bg-white overflow-hidden pt-4 pb-4">
    <div class="container">
        <div class="row g-4">
            @if($advertisments) 
            <div class="col-12 mt-0">
                <a href="{{route('admin.clicks',$advertisments->id)}}">
                <div class="ad-banner">
                    <img src="{{asset('front_end/assets/images/banner/'.$advertisments->img)}}" alt="Advertisement" class="ad-image">
                </div>
                </a>
             </div> 
             @else
             <div class="col-12 mt-0">
                 <a href="#">
                 <div class="ad-banner">
                     <img src="https://tpc.googlesyndication.com/sadbundle/$csp%3Der3$/1340461936500289745/970x250.png" alt="Advertisement" class="ad-image">
                 </div>
                 </a>
              </div>
              @endif
       </div>
   </div>
    
 
 <!-- banner advertisement end -->
<!-- ======================= Blog Details Start  ============================ -->
<div class="blog_details_section bg-white overflow-hidden pt-4 pb-4">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-3 order-xl-2">
                {{-- for sidebar include here  --}}
                @include("front.layout.sidebar.sidebar")
            </div>
            {{-- post  --}}
            <div class="col-xl-9 order-xl-1">
                <div class="single_post blog_wrapper border p-3 p-xl-4 rounded">
                    <div class="single_photo mb-3">
                        <img src="{{asset('front_end/assets/images/blog/'.$select->img)}}" class="rounded w-100" alt="Health & Wellness">
                    </div>
                    <div class="short_info d-sm-flex align-items-center mb-3">
                        <div class="mb-2 mb-sm-0 me-3">
                            <div class="d-flex align-items-center">
                                <div class="icon me-1">
                                    <img src="{{asset('front_end/assets/images/tag.svg')}}" alt="Tag">
                                </div>
                                <div class="date"><span>{{$select->category->title}}</span></div>
                            </div>
                        </div>
                        <div class="mb-2 mb-sm-0 me-3">
                            <div class="d-flex align-items-center">
                                <div class="icon me-1">
                                    <img src="{{asset('front_end/assets/images/calendar.svg')}}" alt="Date">
                                </div>
                                <div class="date"><span>{{$select->created_at->format('D-M-Y')}}</span></div>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex align-items-center">
                                <div class="icon me-1">
                                    <img src="{{asset('front_end/assets/images/eye.svg')}}" alt="View">
                                </div>
                                <div class="date"><span>{{$select->views}}</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="title mb-3">
                        <h1>{{$select->title}}</h1>
                    </div>
                    <div class="desc">
                        {!!$select->description!!}
                    </div>
                </div>
            </div>
            
        </div>
        <div id="disqus_thread"></div>
        <div class="sharethis-sticky-share-buttons"></div>
    </div>
</div>
<!-- ======================= Blog Details End  ============================ -->

<!-- ======================= Related Post Start  ============================ -->
<div class="related_section pt-4 pb-4 border-top">
    <div class="container">
        <div class="section_heading pb-4">
            <h1 class="section_title">You may also like</h1>
        </div> 
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="blog_section bg-white overflow-hidden pt-4 pb-4">
                    <div class="row g-4">
                        @foreach($raletedPost as $blog)
                        <div class="col-md-4 col-sm-6">
                            <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                                <div class="blog_img mb-4 position-relative">
                                    <a href="{{ route('blog.show', $blog->slug) }}">
                                        <img class="img-fluid rounded z-3" src="{{ asset('front_end/assets/images/blog/' . $blog->img) }}"
                                            alt="{{ $blog->title }}">
                                    </a>
                                </div>
                                <div class="blog_content card-body p-0">
                                    <div class="short_info d-sm-flex align-items-center mb-3">
                                        <div class="mb-2 mb-sm-0 me-3">
                                            <div class="d-flex align-items-center">
                                                <div class="icon me-1">
                                                    <img src="{{ asset('front_end/assets/images/tag.svg') }}" alt="Tag">
                                                </div>
                                                <div class="date">
                                                    <span>{{ $blog->category->title }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2 mb-sm-0 me-3">
                                            <div class="d-flex align-items-center">
                                                <div class="icon me-1">
                                                    <img src="{{ asset('front_end/assets/images/calendar.svg') }}" alt="Date">
                                                </div>
                                                <div class="date">
                                                    <span>{{ $blog->created_at->format('d M, Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <div class="icon me-1">
                                                    <img src="{{ asset('front_end/assets/images/eye.svg') }}" alt="View">
                                                </div>
                                                <div class="date"><span>{{ $blog->views }}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="mb-3">
                                        <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                                    </h3>
                                    <div class="blog_desc mb-2">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 100) }}
                                    </div>
                                </div>
                                <hr>
                                <div class="card-footer mt-2 bg-transparent border-0 blog_content p-0">
                                    <a class="learn_more" href="{{ route('blog.show', $blog->slug) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div>
<!-- ======================= Related Post End  ============================ -->
 
 
@endsection
@push("comments")

<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://eblog-6.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=680c772d9f7a510019a96b9d&product=sticky-share-buttons&source=platform" async="async"></script>
@endpush