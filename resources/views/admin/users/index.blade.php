@section("title","Categorys")
@extends('admin.layouts.app')

@section('content')

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Users List</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.categorys')}}">Users</a></li>
                                <li class="breadcrumb-item ">Users List</li>
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
                                    <h3 class="card-title">Users</h3>
                                    <a class="float-right" href="{{route('admin.sub.create')}}">Create New</a>
                                </div>
                                <!-- /.card-header -->
                                @if(session("success"))
                                <div class="bg-info p-2">
                                    <span>{{session("success")}}</span>
                                </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                  @endif
                                <div class="card-body">
                                    <table id="postlist" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Roll</th>
                                                <th>Img</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            @foreach($users as $user)
                                            <tr> 
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    @if($user->role)
                                                    {{ $user->role->name }}
                                                    @else
                                                        <span class="text-danger">No Role Assigned</span>
                                                    @endif 
                                                </td>
                                                <td><img src="{{ asset('front_end/assets/images/users/'.$user->img) }}" width="60" height="50" alt=""></td>
                                                <td>
                                                    @if($user->status==1)
                                                       Active
                                                       @else 
                                                       Pendding
                                                       @endif
                                                </td>
                                                <td>{{$user->created_at->format("d-m-Y")}}</td> 
                                                <td> 
                                                    
                                                    <a href="{{ route('admin.user.edit',$user->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ route('admin.user.delete',$user->id) }}" onclick="return(confirm('Are you surely permanent delete to data(YES/NO)'))" class="btn btn-danger btn-sm">Delete</a>
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
