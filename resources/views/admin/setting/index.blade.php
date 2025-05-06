@section("title","Categorys")
@extends('admin.layouts.app')

@section('content')
       <!-- Content Header (Page header) -->
       <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Web Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Web Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General Settings</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{route('admin.setting.update')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="logo">Upload Logo</label>
                                            <input type="file" class="form-control-file mb-2" id="logo" name="logo" >
                                            <img width="100" height="100" src="{{asset('front_end/settings/'.getSetting()->logo)}}" alt="">
                                            <img id="logoPreview" width="100" height="100" 
                                            src="{{ asset('front_end/assets/images/blog/default.jpg') }}" alt="Logo Preview">
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="favicon">Upload Favicon</label>
                                            <input type="file" class="form-control-file mb-2" id="favicon" name="fav_icon" accept="image/*">
                                            <img width="100" height="100" src="{{asset('front_end/settings/'.getSetting()->fav_icon)}}" alt="">
                                            <img id="faviconPreview" width="100" height="100" 
                                            src="{{ asset('front_end/assets/images/blog/default.jpg') }}" alt="Favicon Preview">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Site Name</label>
                                            <input value="{{$data->site_name}}" type="text" class="form-control" name="siteName" placeholder="Enter social media links">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Phone Number</label>
                                            <input value="{{$data->phone}}" type="text" class="form-control" name="phone" placeholder="Enter social media links">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Email</label>
                                            <input value="{{$data->email}}" type="text" class="form-control" name="email" placeholder="Enter social media links">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Address</label>
                                            <input value="{{$data->address}}" type="text" class="form-control" name="address" placeholder="Enter social media links">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Copy write</label>
                                            <input value="{{$data->copy_right}}" type="text" class="form-control" name="copy_write" placeholder="Enter social media links">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Facebook Link</label>
                                            <input value="{{$data->fb}}"  type="text" class="form-control" name="fb" placeholder="Enter social media links">
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Instagram Link</label>
                                            <input  value="{{$data->insta}}" type="text" class="form-control" name="insta" placeholder="Enter social media links">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Twitter</label>
                                            <input value="{{$data->twitter}}" type="text" class="form-control" name="twitter" placeholder="Enter social media links">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Youtube</label>
                                            <input value="{{$data->youtube}}" type="text" class="form-control" name="youtube" placeholder="Enter social media links">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="home_title">Home Title</label>
                                            <input value="{{$data->home_title}}" type="text" class="form-control" id="home_title" name="home_title" placeholder="Enter Home Title">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="blog_title">Blog Title</label>
                                            <input value="{{$data->blog_title}}" type="text" class="form-control" id="blog_title" name="blog_title" placeholder="Enter Blog Title">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_title">Contact Title</label>
                                            <input value="{{$data->contact_title}}" type="text" class="form-control" id="contact_title" name="contact_title" placeholder="Enter Contact Title">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="blog_show_title">Blog Show Title</label>
                                            <input value="{{$data->blog_show_title}}" type="text" class="form-control" id="blog_show_title" name="blog_show_title" placeholder="Enter Blog Show Title">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_title">Category Title</label>
                                            <input value="{{$data->category_title}}" type="text" class="form-control" id="category_title" name="category_title" placeholder="Enter Category Title">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="privacy_title">Privacy Title</label>
                                            <input value="{{$data->privacy_title}}" type="text" class="form-control" id="privacy_title" name="privacy_title" placeholder="Enter Privacy Title">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="terms_title">Terms Title</label>
                                            <input value="{{$data->terms_title}}" type="text" class="form-control" id="terms_title" name="terms_title" placeholder="Enter Terms Title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="terms_title">Map URL</label>
                                            <input value="{{$data->map_url}}" type="text" class="form-control" id="map_url" name="map_url" placeholder="Enter Terms Title">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary p-2">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->

  <!-- Page specific script -->
  @push("setting_script")
  <script>
    document.getElementById('favicon').addEventListener('change', function (event) {
        const [file] = event.target.files;
        if (file) {
            document.getElementById('faviconPreview').src = URL.createObjectURL(file);
        }
    });
    
    </script>
    <script>
        document.getElementById('logo').addEventListener('change', function (event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById('logoPreview').src = URL.createObjectURL(file);
            }
        });
    </script>
    @endpush
@endsection
