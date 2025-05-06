@section("title","Categorys")
@extends('admin.layouts.app')

@section('content')
  
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Admin roles list</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">User role</a></li>
                                <li class="breadcrumb-item ">Admin Roles</li>
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
                                    <h3 class="card-title">Admin Roles</h3>
                                    <a class="float-right btn btn-primary" href="{{route('admin.role.create')}}">Create Role</a>
                                </div>
                                <!-- /.card-header -->
                                @if(session("success"))
                                  <div class="text-success bg-dark">{{ session("success") }}</div>
                                @endif
                                <div class="card-body">
                                    <table id="postlist" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Role Name</th>
                                                <th>Permissions</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Demo data rows -->
                                            @foreach ($roles as $role)
                                                
                                            
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$role->name}}</td>
                                                <td>
                                                    @foreach ($role->permissions as $permission)
                                                    <span class="badge badge-primary">{{$permission->name }}</span>
                                                    @endforeach
                                                </td>
                                                <td>2024-07-01</td>
                                                <td>
                                                    <a href="{{ route('admin.role.edit',$role->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    <a onclick="return confirm('Are you really sure ?')" href="{{ route('admin.role.delete',$role->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>  
                                            @endforeach
                                        </tbody>
                                        
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Category Name</th>
                                                <th>Author</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(function () {
                    let table = new DataTable('#postlist');
                });
            </script>
             <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables & Plugins -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <!-- AdminLTE App -->
@endsection
