<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RollManagement extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(!Auth::user()->can('add_role')){
            return redirect()->route('index');
        }
        $roles = Role::latest()->with('permissions')->get();
        return view('backend.role&permission.roleandpermission', compact('roles'));
    }
    
    public function update_user_role_permission(Request $request)
    {
        if(!Auth::user()->can('add_role')){
            return redirect()->route('index');
        }
        $role_id = $request->role_id;
        $role_name=$request->role_name;
        $role = Role::where('id', $role_id)->first();
        $role->name = $role_name;
        $role->save();
        $role->revokePermissionTo(Permission::all());
        if ($request->has('permission') &&  count($request['permission']) > 0) {
            $permissions = Permission::whereIn('name', $request['permission'])->get();
            $role->syncPermissions($permissions);
            $permissions->each(function ($permission) use ($role) {
                $permission->assignRole($role);
            });
        }
        Session::flash('success', __('messages.Roles') . ' ' . __('messages.update') . ' ' . __('messages.successfully'));
        return redirect('/role_permission');
    }
    public function getallp()
    {
        $permissions = Permission::select('name')->get();
        return response()->json($permissions);
    }
    public function add_user_role_permission(Request $request)
    {
        $role = Role::create(['name' => $request->role_name]);
        if ($request->has('permission') &&  count($request['permission']) > 0) {
            $permissions = Permission::whereIn('name', $request['permission'])->get();
            $role->syncPermissions($permissions);
            $permissions->each(function ($permission) use ($role) {
                $permission->assignRole($role);
            });
        }
        Session::flash('success', __('messages.Roles') . ' ' . __('messages.create') . ' ' . __('messages.successfully'));
        return redirect('/role_permission');
    }
    public function update_roll(Request $request)
    {
        // file_upload_update
        // file_sharing_update
        // reminder_own_update
        // reminder_with_user_update
        // rename_update
        // comment_update
        // download_update
        // add_role_update
        // view_user_list_update
        // manage_pending_list_update
        $role = Role::create(['name' => $request->role_name]);
        $permissions = Permission::whereIn('name', $request['permission'])->get();
        $role->syncPermissions($permissions);
        $permissions->each(function ($permission) use ($role) {
            $permission->assignRole($role);
        });
        echo 'success';
    }
    public function update_role_get($id){
        $roles = Role::where('id', $id)->with('permissions')->first();
        return response()->json($roles);
    }
    public function delete($id){
        $roles = Role::where('id', $id)->first();
        $roles->delete();
        Session::flash('success', __('messages.Roles') . ' ' . __('messages.delete') . ' ' . __('messages.successfully'));
        return redirect('/role_permission');
    }
    public function add_permission(){
        $roles = Permission::create(['name' => 'file_upload']);
        $roles = Permission::create(['name' => 'file_sharing']);
        $roles = Permission::create(['name' => 'reminder_own']);
        $roles = Permission::create(['name' => 'reminder_with_user']);
        $roles = Permission::create(['name' => 'rename']);
        $roles = Permission::create(['name' => 'comment']);
        $roles = Permission::create(['name' => 'view']);
        $roles = Permission::create(['name' => 'download']);
        $roles = Permission::create(['name' => 'add_role']);
        $roles = Permission::create(['name' => 'view_user_list']);
        $roles = Permission::create(['name' => 'manage_pending_list']);
        $roles = Permission::create(['name' => 'view_user_list']);
    }
}
