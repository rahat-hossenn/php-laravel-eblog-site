@section("title","Categorys")
@extends('admin.layouts.app')

@section('content')
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
                    <div class="mt-5"></div>
                    <form method="POST" action="{{ route('admin.user.update',$select->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" value="{{ $select->name }}"   class="form-control" name="name" id="name" placeholder="Enter full name"  >
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" value="{{ $select->email }}" readonly  class="form-control" placeholder="Enter email"  >
                            </div>

                            <div class="form-group">
                                <label for="img">Profile Image</label>
                                <input type="file" onchange="FileChange(event)" class="form-control" name="img" id="img">
                                <img width="70" height="70" src="{{ asset('front_end/assets/images/users/'.$select->img) }}" alt="">
                                <img width="70" id="imgShow" height="70" src="{{ asset('front_end/assets/images/users/default-user.png' ) }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="status">Select Role</label>
                                <select class="form-control" name="role_id"    >
                                    @foreach ($userRole as $role)
                                        <option value="{{ $role->id }}" {{ $role->id == $select->role_id ? "selected":"" }} >{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div> 

                            <div class="form-group">
                                <label for="status">Select Status</label>
                                <select class="form-control" name="status" id="status"  >
                                    <option value="0"  {{ $select->status == 0 ?"selected":""  }}>Pending</option>
                                    <option value="1"  {{ $select->status == 1 ?"selected":""  }}>Active</option>
                                </select>
                            </div> 

                            <div class="form-group">
                                <label for="password">Password <span class="text-danger">(Minimum 8 charchacters)</span></label>
                                <input type="password"   class="form-control" name="password" placeholder="Enter password"  >
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
 @push('js')
    <script>
        function FileChange(event){
            let img = document.getElementById("imgShow");
            img.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endpush