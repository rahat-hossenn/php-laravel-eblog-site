@section("title","Category Update")
@extends('admin.layouts.app')

@section('content')
 
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Category update</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Category</a></li>
                                <li class="breadcrumb-item">Category update</li>
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
                        <!-- Add Category Form -->
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Category update</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{route('admin.category.update',$select->id)}}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="categoryName">Category Name</label>
                                            <input value="{{$select->title}}" type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name" onkeyup="generateSlug()">
                                        </div>
                                        <div class="form-group">
                                            <label for="categorySlug">Category Slug</label>
                                            <input type="text" class="form-control" id="categorySlug" name="categorySlug" placeholder="Auto-generated category slug" readonly>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button> 
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
            @push("script")
            <script>
                function generateSlug() {
                    var categoryName = document.getElementById('categoryName').value;
                    
                    var slug = categoryName
                        .toLowerCase()
                        .replace(/\s+/g, '-')
                        .replace(/[^\w\-]+/g, '') 
                        .replace(/--+/g, '-') 
                        .replace(/^-+|-+$/g, ''); 
            
                    document.getElementById('categorySlug').value = slug;
                }
            </script>
            @endpush
@endsection
