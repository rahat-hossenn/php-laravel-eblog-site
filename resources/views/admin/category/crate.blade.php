@section("title","Category update")
@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Create Category</li>
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
                        <h3 class="card-title">Add New Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start --> 
                    @error('categoryName')
                        <div class="text-danger bg-dark">{{ $message }}</div>
                      @enderror
                    <form method="POST" action="{{route('admin.category.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="categoryName">Category Name</label>
                                <input type="text" class="form-control" name="categoryName"id="categoryName" placeholder="Enter category name" onkeyup="generateSlug()">
                            </div>

                            <div class="form-group">
                                <label for="categorySlug">Category Slug</label>
                                <input type="text" class="form-control" name="categorySlug" id="categorySlug" placeholder="Auto-generated category slug" readonly>
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

@push("script_category")
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
