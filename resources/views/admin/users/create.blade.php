@section("title","User update")
@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create User</li>
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
            <!-- Add User Form -->
            <div class="col-md-8" style="margin: 0 auto;">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New User</h3>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{route('admin.subuser.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text"   class="form-control" name="name" id="name" placeholder="Enter full name"  >
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email"   class="form-control" name="email" id="email" placeholder="Enter email"  >
                            </div>

                            <div class="form-group">
                                <label for="img">Profile Image</label>
                                <input type="file" class="form-control" name="img" id="img">
                            </div>

                            <div class="form-group">
                                <label for="role_id">Role</label>
                                <select class="form-control" name="role_id" id="role_id"  >
                                    <option >Select Role</option> 
                                    @foreach ($data as $user )
                                    <option value="{{ $user->id }}">{{ $user->name }}</option> 
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Select Status</label>
                                <select class="form-control" name="status" id="status"  >
                                    <option value="0">Pending</option>
                                    <option value="1">Active</option>
                                </select>
                            </div> 

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password"  >
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create User</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->

 
@endsection

 
<!-- /.content-header -->


