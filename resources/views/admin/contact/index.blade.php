@section("title","Contact message")
@extends('admin.layouts.app')

@section('content')

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Contact message</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.categorys')}}">Contact  </a></li>
                                <li class="breadcrumb-item ">Contact message</li>
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
                                    <h3 class="card-title">Contact message</h3>
                                </div>
                                
                                <div class="card-body">
                                    <table id="postlist" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>User Name</th>
                                                <th>User Email</th>
                                                <th>User Subject</th>
                                                <th>User message</th> 
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            @foreach($ContactData as $contacts)
                                             <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$contacts->name}}</td>
                                                <td>{{$contacts->email}}</td>
                                                <td>{{$contacts->subject}}</td>
                                                <td>{{$contacts->message}}</td>
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
