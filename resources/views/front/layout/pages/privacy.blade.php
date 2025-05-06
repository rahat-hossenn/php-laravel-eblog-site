@section("title", getSetting()->privacy_title) 
@extends("front.layout.app")
@section("content")
   <!-- ======================= breadcrumb Start  ============================ -->
   <div class="breadcrumb_sec py-3">
    <div class="container">
        <nav>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Privacy Policy</li>
            </ol>
        </nav>
    </div>
</div>
<!-- ======================= breadcrumb End  ============================ -->

<!-- ======================= Custom page Start  ============================ -->
<div class="custom_section pb-5">
    <div class="container">
        <div class="bg-white rounded p-4 border">
            <div class="page_content">
                <h1 class="page_title">{{$privacy->name}}</h1>
                <div class="desc">
                    <p>{{$privacy->description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ======================= Custom page End  ============================ -->

@endsection