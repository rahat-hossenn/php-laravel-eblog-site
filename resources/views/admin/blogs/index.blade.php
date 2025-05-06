@section("title","Blogs post")

@extends('admin.layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Post List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.blogs')}}">Blog</a></li>
                        <li class="breadcrumb-item ">Post List</li>
                    </ol>
                    
                </div>
                 
                
            </div>
        </div>
    </div>
    <form action="{{ route('admin.blogs.filter') }}" method="POST">
        @csrf
        <div class="Post_filter col-md-4 mt-2">
            <select name="post__filter" id="post__filter" class="form-control">
                <option value="">Select Option</option>
                <option value="all" {{ request('post__filter') === 'all' ? 'selected' : '' }}>All post</option>
                <option value="0" {{ request('post__filter') === '0' ? 'selected' : '' }}>Pending</option>
                <option value="1" {{ request('post__filter') === '1' ? 'selected' : '' }}>Published</option>
            </select>
        </div>
        <button class="btn btn-success ml-2 mt-2 mb-2">Filter</button>
    </form>
    
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Posts</h3>
                            <a class="float-right" href="{{route('admin.blog.create')}}">Add Post +</a>
                        </div>
                        <!-- /.card-header -->
                        @if(session('success'))
                        <div class="text-success bg-dark p-2">{{session('success')}}</div>
                        @endif
                        <div class="card-body">
                            <table id="postlist" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Desc</th>
                                        <th>Img</th>
                                        <th>Author</th>
                                        <th>Date</th>
                                        <th>Banner</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Demo data rows -->
                                    @foreach($select as $blogs)
                                     
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$blogs->title}}</td> 
                                        <td>{{$blogs->category->title}}</td>  
                                        <td>{!!Str::limit($blogs->description, 100);!!}</td>  
                                        <td><img src="{{asset('front_end/assets/images/blog/'.$blogs->img)}}" width="50" height="50" alt="img"></td>
                                        <td>{{$blogs->user->name}}</td>  
                                        <td>{{$blogs->created_at->format('d-m-Y')}}</td>  
                                        <td>
                                            @if($blogs->is_banner==1)
                                            <span class="text-success">Main Banner(Active)</span> 
                                            @elseif($blogs->is_banner==2)
                                            <span class="text-success">Side banner(1)(Active)</span> 
                                            @elseif($blogs->is_banner==3)
                                            <span class="text-success">Side banner(2)(Active)</span> 
                                            @else
                                            <span class="text-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>@if($blogs->status>0) <span class="text-success">Published</span>
                                        @else <span class="text-danger">Pendding</span>
                                        @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.blog.view',$blogs->id)}}" class="btn btn-primary btn-sm">View</a>
                                            <a href="{{route('admin.blog.edit',$blogs->id)}}" class="btn btn-info btn-sm">Edit</a>
                                            <a href="{{route('admin.blog.delete',$blogs->id)}}" class="btn btn-danger btn-sm">Delete</a>
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
