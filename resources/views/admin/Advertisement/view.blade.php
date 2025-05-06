@section("title","advertisement")
@extends('admin.layouts.app')

@section('content')

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Advertisement List</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.add.index')}}">Advertisement</a></li>
                                <li class="breadcrumb-item ">Advertisement List</li>
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
                                    <h3 class="card-title">advertisement</h3>
                                    <a class="float-right" href="{{route('admin.category.crate')}}">Advertisement New</a>
                                </div>
                                <!-- /.card-header -->
                             
                                <div class="card-body">
                                    <table id="postlist" class="table table-bordered table-striped">
                                        <thead> 
                                            <tr> 
                                                <th>Advertisement img</th>
                                                <td><img src="{{asset('/front_end/assets/images/banner/'.$add->img)}}" alt=""></td>
                                            </tr>
                                            <tr>
                                                <th>Advertisement Link</th>
                                                <td>{{$add->link}}</td>
                                            </tr>
                                            <tr>
                                                <th>Advertisement status</th>
                                                <td>
                                                    @if($add->status == 1)
                                                    Active
                                                    @else
                                                    Inactive
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Advertisement Clicks</th>
                                                <td>{{$add->clicks}}</td>
                                            </tr>
                                            <tr>
                                                <th>Advertisement time</th>
                                                <td>{{$add->created_at->format('d-m-Y')}}</td>
                                            </tr>
                                        </thead> 
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
