@section("title","Categorys")
@extends('admin.layouts.app')

@section('content')

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Category view</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.categorys')}}">Category</a></li>
                                <li class="breadcrumb-item ">Category view</li>
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
                                    <a class="float-right" href="{{route('admin.category.crate')}}">view</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="postlist" class="table table-bordered table-striped">
                                            <tr>
                                                <th>SL.</th>
                                                <td>{{$category->id}}</td>
                                            </tr>
                                            <tr>
                                                <th>Category Name</th>
                                                <td>{{$category->title}}</td>
                                            </tr>
                                            <tr>
                                                <th>Slug</th>
                                                <td>{{$category->slug}}</td>
                                            </tr>
                                            <tr>
                                                <th>Date</th>
                                                <td>{{$category->created_at->format("d-m-Y")}}</td>
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
