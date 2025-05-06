
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
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                    <h3 class="card-title">Users List</h3>
                                    <a class="float-right" href="{{route('admin.user.create')}}">Create User</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="postlist" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Created At</th>
                                                <th>Role</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Demo data rows -->
                                            <tr>
                                                <td>1</td>
                                                <td>Md Rony</td>
                                                <td>ronymia.tech@gmail.com</td>
                                                <td>+880123456789</td>
                                                <td>12 july, 2024</td>
                                                <td>Admin</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Md Rony</td>
                                                <td>ronymia.tech@gmail.com</td>
                                                <td>+880123456789</td>
                                                <td>12 july, 2024</td>
                                                <td>Admin</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Md Rony</td>
                                                <td>ronymia.tech@gmail.com</td>
                                                <td>+880123456789</td>
                                                <td>12 july, 2024</td>
                                                <td>Admin</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Md Rony</td>
                                                <td>ronymia.tech@gmail.com</td>
                                                <td>+880123456789</td>
                                                <td>12 july, 2024</td>
                                                <td>Admin</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Md Rony</td>
                                                <td>ronymia.tech@gmail.com</td>
                                                <td>+880123456789</td>
                                                <td>12 july, 2024</td>
                                                <td>Admin</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Md Rony</td>
                                                <td>ronymia.tech@gmail.com</td>
                                                <td>+880123456789</td>
                                                <td>12 july, 2024</td>
                                                <td>Admin</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
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
            <!-- /.content --> <script>
        $(function () {
            let table = new DataTable('#postlist');
        });
       </script>
@endsection
