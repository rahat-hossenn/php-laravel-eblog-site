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
                                    <a class="float-right" href="{{route('admin.adds.create')}}">Advertisement New</a>
                                </div>
                                <!-- /.card-header -->
                                @if(session("delete"))
                                <div class="bg-info"> 
                                    <span class="text-danger">
                                        {{session("delete")}}
                                    </span>
                                </div>
                             @endif
                             @if(session("success"))
                                <div class="bg-dark p-2"> 
                                    <span class="text-success">
                                        {{session("success")}}
                                    </span>
                                </div>
                             @endif
                                <div class="card-body">
                                    <table id="postlist" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Advertisement link</th>
                                                <th>Advertisement img</th>
                                                <th>Advertisement status</th>
                                                <th>Advertisement Clicks</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach($addvertisments as $data)
                                            <tr > 
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$data->link}}</td>
                                                <td><a href="{{asset('/front_end/assets/images/banner/'.$data->img)}}">Preview</a></td>
                                                <td>
                                                    @if($data->status==1)
                                                    <span class="bg-dark text-white p-3">Active</span>
                                                    @elseif($data->status==0)
                                                    <span class="bg-info text-danger p-3">InActive</span>
                                                    @endif
                                                </td>
                                                <td>{{$data->clicks}}</td>
                                                <td>
                                                    <a href="{{route('admin.addver.view',$data->id)}}" class="btn btn-primary btn-sm">View</a>
                                                    <a href="{{route('admin.addver.delete',$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
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
