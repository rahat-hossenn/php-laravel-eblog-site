@section("title","Categorys")
@extends('admin.layouts.app')

@section('content')

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Category List</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.categorys')}}">Categorys</a></li>
                                <li class="breadcrumb-item ">Category List</li>
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
                                <div class="card-header">
                                    <h3 class="card-title">Category</h3>
                                    <a class="float-right" href="{{route('admin.category.crate')}}">Create New</a>
                                </div>
                                <!-- /.card-header -->
                                @if(session("success"))
                                <div class="bg-info">
                                    <span>{{session("success")}}</span>
                                </div>
                                @endif
                                <div class="card-body">
                                    <table id="postlist" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Category Name</th>
                                                <th>Slug</th>
                                                <th>Post count</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $category)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$category->title}}</td> 
                                                <td>{{$category->slug}}</td>  
                                                <td>{{$category->post_count}}</td> 
                                                <td>{{$category->created_at->format("d-m-Y")}}</td>   
                                                <td>
                                                    <a href="{{route('admin.category.view',$category->id)}}" class="btn btn-primary btn-sm">View</a>
                                                    @can('admin.blog-category.edit')
                                                    <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-info btn-sm">Edit</a>
                                                    @endcan
                                                    @can('admin.blog-category.delete')
                                                    <a href="{{route('admin.category.delete',$category->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                                    @endcan
                                                </td>
                                            </tr>     
                                            @endforeach
                                        </tbody> 
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
