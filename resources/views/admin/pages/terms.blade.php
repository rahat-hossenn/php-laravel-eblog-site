@section("title","Categorys")
@extends('admin.layouts.app')

@section('content')
 
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Terms & Conditions</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item ">Terms & Conditions</li>
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
                                    <h3 class="card-title">Terms & Conditions</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <form method="post" action="{{route('admin.term.update')}}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="Title">Page Title</label>
                                            <input value="{{$data->name}}" name="termsTitle" type="text" class="form-control" id="Title" placeholder="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="pagebody">Page Body</label>
                                            <textarea name="termsDescription" id="pagebody" 
                                             class="form-control" placeholder="page body" rows="10">{{$data->description}}
                                            </textarea>
                                        </div> 
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
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

@endsection
