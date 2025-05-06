@section("title","Blog-create")

@extends('admin.layouts.app')

@section('content') 

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Update Post</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.blogs')}}">Blog</a></li>
                                <li class="breadcrumb-item ">Update Post</li>
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
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Update Post</h3>
                                </div>
                                <!-- /.card-header -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- form start -->
                                @if(session("success"))
                                <div class="card-header bg-dark text-white hover-bg-black">
                                    <h3 class="card-title">{{ session("success") }}</h3>
                                </div>
                                 @endif
                                <form action="{{route('admin.blog.update',$select->id)}}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="posttitle">Post Title <span class="text-danger">*</span></label>
                                            <input type="text" value="{{$select->title}}" class="form-control" id="posttitle" name="posttitle" placeholder="Enter post title">
                                        </div> 
                                        <div class="form-group">
                                            <label for="category_id">Category <span class="text-danger">*</span></label>
                                            <select class="form-control" id="category_id"name="category_id">
                                                @foreach($categories as $category)
                                                <option class="bg-info" value="{{ $category->id }}" 
                                                        {{ ($select->category_id == $category->id) ? 'selected' : '' }}>
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                            <label for="desc">Description <span class="text-blode">(Minimum 160 character)</span></label>
                                            <div>
                                                <textarea class="form-control" id="desc" name="desc" rows="5" placeholder="Enter post desc">{!! $select->description!!}</textarea>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="status">Post status <span class="text-danger">*</span></label>
                                            <select class="form-control" id="status"name="upstatus">
                                                <option value="0"
                                                    {{($select->status==0)?"selected":""}}
                                                    >Pendding</option>
                                                <option value="1"
                                                    {{($select->status==1)?"selected":""}} >Published</option> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Banner status<span class="text-danger">*</span></label>
                                            <select class="form-control" id="is_banner"name="main_banner">
                                               <option value="0">Select Banner</option>
                                               <option value="1" {{$select->is_banner==1 ? "selected":""}}>Main banner</option>
                                               <option value="2" {{$select->is_banner == 2 ? "selected":""}}>Side banner(1)</option>
                                               <option value="3" {{$select->is_banner == 3 ? "selected":""}}>Side banner(2)</option>
                                               
                                                 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="postImage">Post Image <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="postImage">Choose file</label>
                                                    <input type="file" name="img" onchange="imgchange(event)" class="custom-file-input" id="postImage">
                                                </div><br>
                                            </div>
                                            <img width="100" height="100" id="imgShow" src="{{asset('front_end/assets/images/blog/default.jpg')}}" alt="Img">
                                            <img width="100" height="100" src="{{asset('front_end/assets/images/blog/'.$select->img)}}" alt="Img">
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
                    </div>
                </div>
            </div>
            <!-- /.content -->
            @push("js")
                <!-- Include CKEditor 5 from CDN -->
                <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
                <script src="https://unpkg.com/@ckeditor/ckeditor5-inspector@4.1.0/build/inspector.js"></script>

                <script>
                    function imgchange(event){
                         let img  = document.getElementById("imgShow");
                         img.src=URL.createObjectURL(event.target.files[0]);
                    }
                </script> 
            <script>
                // Custom plugin (for example purposes, not adding functionality here)
                function CustomizationPlugin(editor) {}
            
                        // Initialize CKEditor 5 with extended toolbar and plugins
                        ClassicEditor
                            .create(document.querySelector('#desc'), {
                                extraPlugins: [CustomizationPlugin],
                                toolbar: {
                                    items: [
                                        'heading', '|',
                                        'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                                        'indent', 'outdent', '|',
                                        'imageUpload', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
                                        'undo', 'redo', 'alignment', 'fontSize', 'fontColor', 'highlight', 'codeBlock'
                                    ]
                                },
                                image: {
                                    toolbar: [
                                        'imageTextAlternative', 'imageStyle:full', 'imageStyle:side'
                                    ]
                                },
                                table: {
                                    contentToolbar: [
                                        'tableColumn', 'tableRow', 'mergeTableCells'
                                    ]
                                },
                                language: 'en'
                            })
                            .then(newEditor => {
                                window.editor = newEditor;
                                
                                // The following line adds CKEditor 5 inspector.
                                CKEditorInspector.attach(newEditor, {
                                    isCollapsed: true
                                });
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    </script>
   
            @endpush
@endsection
