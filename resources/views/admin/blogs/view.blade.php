@section("title","Blog post view")

@extends('admin.layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><strong>Post View</strong></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.blogs')}}">Blog</a></li>
                        <li class="breadcrumb-item ">Post view</li>
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
                <div class="col-12">
                    <div class="card"> 
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="postlist" class="table table-bordered table-striped">
                                 <tr>
                                    <th>Post Title</th>
                                    <td>{{$select->title}}</td>
                                 </tr>
                                 <tr>
                                    <th>Post Category</th>
                                    <td>{!!$select->category->title!!}</td>
                                 </tr>
                                 <tr>
                                    <th>Post Writer</th>
                                    <td>{{$select->user->name}}</td>
                                 </tr>
                                 <tr>
                                    <th>Post Description</th>
                                    <td>{!!$select->description!!}</td>
                                 </tr>
                                 <tr>
                                    <th>Post Image</th>
                                    <td><img width="250" src="{{asset('front_end/assets/images/blog/'.$select->img)}}" alt=""></td>
                                 </tr>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
