@section("title", getSetting()->category_title) 
@extends("front.layout.app")
@section("content")
<!-- ======================= slider section  ============================ -->
<div class="slider_section bg-white overflow-hidden pt-4 pb-4">
    <div class="container">
        <div class="row g-4">
            <!-- Left side large banner -->
            <div class="col-lg-8">
                <a href="your-link-here" class="banner">
                    <div class="banner-left">
                        <img src="https://blog.bikroy.com/en/wp-content/uploads/2024/09/Blog-Size-Biraat-Haat-Winner-780x470.jpg" class="img-fluid w-100" alt="Main Banner">
                        <div class="banner-content">
                            <h2>Birat Haat 2024 Contest Winners Announced by Bikroy and Minister</h2>
                            <p>Bikroy, a leading online platform for livestock trading in Bangladesh, hosted the winners' announcement ceremony...</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Right side small banners -->
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-12 mb-3">
                        <a href="your-link-here" class="banner">
                            <div class="banner-small">
                                <img src="https://blog.bikroy.com/en/wp-content/uploads/2024/08/Ad-Boost-Blog-780x470-1.png" class="img-fluid w-100" alt="Small Banner 1">
                                <div class="banner-content">
                                    <h3>Boost Your Ads for Better Results with Bikroy's Latest Feature</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12">
                        <a href="your-link-here" class="banner">
                            <div class="banner-small">
                                <img src="https://blog.bikroy.com/en/wp-content/uploads/2024/08/Ad-Boost-Blog-780x470-1.png" class="img-fluid w-100" alt="Small Banner 2">
                                <div class="banner-content">
                                    <h3>Introducing the Amazing "Saved Search" Feature on Bikroy</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- ======================= slider End  ============================ -->
 <!-- banner advertisement start -->
 <div class="blog_section bg-white overflow-hidden pt-4 pb-4">
    <div class="container">
    <div class="row g-4">
        <div class="col-12 mt-0">
            <a href="#">
            <div class="ad-banner">
                <img src="front_end/assets/images/banner.png" alt="Advertisement" class="ad-image">
                </div>
            </a>
    </div>
 </div>
</div>
 
 <!-- banner advertisement end -->
<!-- ======================= Blog Start  ============================ -->
<div class="blog_section bg-white overflow-hidden pt-4 pb-4">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-3 order-xl-2">
                {{-- for sidebar include here  --}}
                @include("front.layout.sidebar.sidebar")
            </div>
            <div class="col-xl-9 order-xl-1">
                <div class="blog_wrapper">
                    <div class="row gy-4">
                        <!-- blog post -->
                        @foreach($select as $blog)
                        <div class="col-md-6">
                            <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                                <div class="blog_img mb-4 position-relative">
                                    <a href="details.html">
                                        <img class="img-fluid rounded z-3" src="{{asset('front_end/assets/images/blog/'.$blog->img)}}"
                                            alt="Health & Wellness">
                                    </a>
                                </div>
                                <div class="blog_content card-body p-0">
                                    <div class="short_info d-sm-flex align-items-center mb-3">
                                        <div class="mb-2 mb-sm-0 me-3">
                                            <div class="d-flex align-items-center">
                                                <div class="icon me-1">
                                                    <img src="{{asset('front_end/assets/images/tag.svg')}}" alt="Tag">
                                                </div>
                                                <div class="date"><span>{{$blog->category->title}}</span></div>
                                            </div>
                                        </div>
                                        <div class="mb-2 mb-sm-0 me-3">
                                            <div class="d-flex align-items-center">
                                                <div class="icon me-1">
                                                    <img src="{{asset('front_end/assets/images/calendar.svg')}}" alt="Date">
                                                </div>
                                                <div class="date"><span>{{$blog->created_at->format('d-m-Y')}}</span></div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="d-flex align-items-center">
                                                <div class="icon me-1">
                                                    <img src="{{asset('front_end/assets/images/eye.svg')}}" alt="View">
                                                </div>
                                                <div class="date"><span>{{$blog->views}}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="mb-3">
                                        <a href="details.html">{{$blog->title}}</a>
                                    </h3>
                                    <div class="blog_desc mb-2">
                                        {{ Str::limit($blog->description, 100) }} 
                                    </div>
                                </div>
                                <hr>
                                <div class="card-footer mt-2 bg-transparent border-0 blog_content p-0">
                                    <a class="learn_more" href="{{route('blog.show',$blog->slug)}}">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach 
                    </div>
                    <div class="btn-readmore mt-5 text-center">
                        <a class="readmoreanhr btn btn-primary" href="{{route('blog.index')}}">See More Post</a>
                    </div>
                </div>
           </div>
        </div>
    </div>
</div>
<!-- ======================= Blog End  ============================ -->

@endsection