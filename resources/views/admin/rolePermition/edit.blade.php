@section("title","User role update")
@extends('admin.layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Admin update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Admin Create Role</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Add Role Form -->
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">update</h3>
                    </div>

                    <form action="{{ route('admin.role.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf   
                        
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Role Name</label>
                                <input value="{{ old('name', $role->name) }}" type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>
                    
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="custom-control custom-checkbox">
                                            <input value="1" type="checkbox" class="custom-control-input" name="permission_all" id="permission_all" 
                                                {{ old('permission_all', count($rolePermissions) === count($permissions)) ? 'checked' : '' }} />
                                            <label for="permission_all" class="custom-control-label text-capitalize">All Permission</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="mb-3">
                                @foreach ($permissions as $groupName => $permissionsGroup)
                                    @php
                                        $slug = \Illuminate\Support\Str::slug($groupName);
                                    @endphp
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="{{ $slug }}_group"
                                                       onclick="CheckPermissionByGroup('{{ $slug }}', this)"
                                                       {{ count(array_intersect($permissionsGroup->pluck('name')->toArray(), $rolePermissions)) > 0 ? 'checked' : '' }}>
                                                <label for="{{ $slug }}_group" class="custom-control-label text-capitalize">{{ $groupName }}</label>
                                            </div>
                                        </div>
                    
                                        <div class="col-9 role-{{ $slug }}-management-checkbox">
                                            @foreach ($permissionsGroup as $permission)
                                                <div class="custom-control custom-checkbox">
                                                    <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                           id="permission_{{ $permission->id }}" 
                                                           value="{{ $permission->name }}"
                                                           {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                                                    <label for="permission_{{ $permission->id }}" class="custom-control-label">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Role</button>
                        </div>
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push("js")
<script>
    // All permission toggle
    document.getElementById('permission_all').addEventListener('click', function () {
        const allPermissions = document.querySelectorAll('input[name="permissions[]"]');
        allPermissions.forEach(cb => cb.checked = this.checked);
    });

    // Group-wise permission toggle
    function CheckPermissionByGroup(groupSlug, checkbox) {
        const checkboxes = document.querySelectorAll(`.role-${groupSlug}-management-checkbox input[type="checkbox"]`);
        checkboxes.forEach(cb => cb.checked = checkbox.checked);
    }
</script>
@endpush
