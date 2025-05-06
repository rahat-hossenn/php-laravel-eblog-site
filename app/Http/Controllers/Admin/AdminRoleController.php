<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminRoleController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.user_role')->only("role");
        $this->middleware('can:admin.role.create')->only("create"); 
        $this->middleware('can:admin.role.edit')->only("store"); 
        $this->middleware('can:admin.role.delete')->only("delete"); 

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function role()
    {
        $roles = Role::with("permissions")->get();  
        return \view("admin.rolePermition.userRole",\compact("roles"));
    }
    public function create(){
        $permesions = Permission::all()->groupby("group_name"); 
        return \view("admin.rolePermition.create",\compact("permesions"));
    }

    public function store(Request $request){
    $request->validate([
        'name' => 'required|unique:roles,name',
        'permissions' => 'array',
        'permissions.*' => 'string', // assuming you are sending permission names
    ]); 
    // Create Role
    $role = Role::create(['name' => $request->name]);

    // Assign Permissions
    if ($request->has('permissions')) {
        $role->syncPermissions($request->permissions);
    }

    return redirect()->route("admin.user_role")->with('success', 'Role created successfully with permissions.');

}

    public function delete($id)
    { 
        $role = Role::findOrFail($id); 
        $role->delete(); 
        return redirect()->route('admin.user_role')->with('success', 'Role deleted successfully');
    }

    public function edit($id)
    { 
        $role = Role::find($id);  
 
        if (!$role) {
            return redirect()->route('admin.user_role')->with('error', 'Role not found!');
        } 
        $permissions = Permission::get()->groupBy('group_name'); 
 
        $rolePermissions = $role->permissions->pluck('name')->toArray();
 
        return view('admin.rolePermition.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
{ 
    $role = Role::find($id);  
    if (!$role) {
        return redirect()->route('admin.user_role')->with('error', 'Role not found!');
    }
 
    $role->name = $request->input('name');
    $role->save();
 
    if ($request->has('permission_all')) { 
        $role->syncPermissions(Permission::all());
    } else { 
        $role->syncPermissions($request->input('permissions', []));
    }

    return redirect()->route('admin.user_role')->with('success', 'Role updated successfully!');
}
}
