@section("title","Advertisement-create")

@extends('admin.layouts.app')

@section('content') 

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Advertisement crate</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.add.index')}}">Advertisement</a></li>
                                <li class="breadcrumb-item "> Advertisement Create </li>
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
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Advertisement Create</h3>
                                </div>
                                <!-- /.card-header -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- form start -->
                                @if(session("success"))
                                <div class="card-header bg-dark text-white hover-bg-black">
                                    <h3 class="card-title">{{ session("success") }}</h3>
                                </div>
                                @endif
                                <form action="{{route('admin.adds.store')}}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="posttitle">Advertisement Link <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="adds_link" placeholder="Enter post title">
                                        </div>  
                                        <div class="form-group">
                                            <label for="status">Advertisement status <span class="text-danger">*</span></label>
                                            <select class="form-control" id="status" name="adds_status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                            <label for="postImage">Advertisement Image <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="postImage">Choose file</label>
                                                    <input type="file" name="adds_img" onchange="imgchange(event)" class="custom-file-input" id="postImage">
                                                </div><br>
                                            </div>
                                            <img class="mt-2"  height="100" id="imgShow" src="front_end/assets/images/blog/default.jpg" alt="Img">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button> 
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content --> 

@endsection
@push("js")
<script>
    function imgchange(event) {
        // ফাইলটি নির্বাচন করার পর
        var reader = new FileReader();
    
        // ফাইলটি লোড হয়ে গেলে
        reader.onload = function() {
            // imgShow ID সহ img ট্যাগটির src আপডেট করুন
            document.getElementById('imgShow').src = reader.result;
        }
    
        // ফাইলটি পড়ুন (বেস64 ইমেজ রূপে)
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
    @endpush
