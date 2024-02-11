<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     
    }
    public function profile_details($id=null)
    {
        if ($id == null) {
            $user = Auth::user();
        }else{
            if (!Auth::user()->can('view_user_list')) {
                return redirect()->route('index');
            }else{
                $user = User::find($id);
            }
        }

        $roles = Role::latest()->get();
        return view('backend.userprofile.userprofile', compact('user', 'roles'));
    }
    public function update_user_profile(Request $request){
        
        $user = User::find($request->user_id);
        $user->syncRoles([$request->roleselect]);
        Session::flash('success', __('messages.role') . ' ' . __('messages.update') . ' ' . __('messages.successfully'));
        return redirect('/user-profile/'.$request->user_id);
    }
    
}
