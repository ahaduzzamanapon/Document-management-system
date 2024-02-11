<?php

namespace App\Http\Controllers;

use App\Models\AccessPending;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Session;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function settings()
    {
          $settings = Settings::all();
          return view('backend.settings.settings', compact('settings'));
      
    }
    public function add_settings(Request $request)
    {
        // if (!Auth::user()->hasRole('admin') || !Auth::user()->hasRole('Admin')) {
        //     return redirect()->route('index');
        // }
        App()->setLocale($request->language);
        Session()->put('locale', $request->language);
        $settings = Settings::first();
        if (!$settings) {
            $settings = new Settings();
        }
        if ($request->hasFile('logo_input_en')) {
            $file_en = $request->file('logo_input_en');
            $extension_en = $file_en->getClientOriginalExtension();
            $filename_en = 'logo_en.' . $extension_en;
            // Specify the directory where you want to save the English file.
            $directory = 'settings/';
            // Move the English file to the desired directory without MIME type guessing.
            if ($file_en->move($directory, $filename_en)) {
                $settings->logo_en = $filename_en;
            }
        }

        if ($request->hasFile('logo_input_bn')) {
            $file_bn = $request->file('logo_input_bn');
            $extension_bn = $file_bn->getClientOriginalExtension();
            $filename_bn = 'logo_bn.' . $extension_bn;
            // Specify the directory where you want to save the Bengali file.
            $directory = 'settings/';

            // Move the Bengali file to the desired directory without MIME type guessing.
            if ($file_bn->move($directory, $filename_bn)) {
                $settings->logo_bn = $filename_bn;
            }
        }
        $settings->reminder_alert_day = $request->reminder_alert_day;

        $settings->title = 'not_yet';
        $settings->reminder_alert_time = 'not_yet';

        if ($request->reminder_alert_time) {
            $settings->reminder_alert_time = 0;
        } else {
            $settings->reminder_alert_time = 1;
        }

        if ($request->upload_files) {
            $settings->upload_files = 0;
        } else {
            $settings->upload_files = 1;
        }

        if ($request->create_folder) {
            $settings->create_folder = 0;
        } else {
            $settings->create_folder = 1;
        }

        if ($request->user_login) {
            $settings->user_login = 0;
        } else {
            $settings->user_login = 1;
        }

        if ($request->remainder) {
            $settings->remainder = 0;
        } else {
            $settings->remainder = 1;
        }

        if ($request->previous_version) {
            $settings->previous_version = 0;
        } else {
            $settings->previous_version = 1;
        }

        $settings->save();
        $request->session()->flash('success', __('messages.successfully'));
        return redirect()->back();
    }
    public function asing_role()
    {
        if (!Role::where('name', 'admin')->exists() && !Permission::where('name', 'Admin')->exists()) {
            $role = Role::create(['name' => 'Admin']);
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
            $permissions = Permission::whereIn('name', ['file_upload', 'file_sharing', 'reminder_own', 'reminder_with_user', 'rename', 'comment', 'view', 'download', 'add_role', 'view_user_list', 'manage_pending_list', 'view_user_list'])->get();
            $role->syncPermissions($permissions);
            $permissions->each(function ($permission) use ($role) {
                $permission->syncRoles($role);
            });
            $user = Auth::user();
            $user->syncRoles(['Admin']);
        } else {
            $user = Auth::user();
            $user->syncRoles(['Admin']);
        }

        if (!Role::where('name', 'User')->exists() && !Permission::where('name', 'user')->exists()) {
            $role = Role::create(['name' => 'User']);
            $permissions = Permission::whereIn('name', ['file_upload', 'file_sharing', 'reminder_own', 'reminder_with_user', 'rename', 'comment', 'view', 'download', 'add_role', 'view_user_list', 'manage_pending_list', 'view_user_list'])->get();
            $role->syncPermissions($permissions);
            $permissions->each(function ($permission) use ($role) {
                $permission->syncRoles($role);
            });

        }
        echo 'success';

    }
    public function no_access()
    {
        // $user = Auth::user();
        // $getdata=AccessPending::where('user_id',$user->id)->first();
        $user = Auth::user();
        if (!Role::where('name', 'User')->exists() && !Permission::where('name', 'user')->exists()) {
            $role = Role::create(['name' => 'User']);
        }
        $user->syncRoles(['User']);
        return redirect()->route('index');

    }
    public function access_request_send()
    {
        $user = Auth::user();
        $document = new AccessPending();
        $document->user_id = $user->id;
        $document->save();
        return redirect('/no-role-page');
    }
    public function access_pending_list()
    {
        $user_list = AccessPending::join('users', 'access_pendings.user_id', '=', 'users.id')
            ->select('access_pendings.*', 'users.*')
            ->get();

        return view('backend.admin.userpendinglist.userpendinglist', compact('user_list'));
    }
    public function create()
    {
        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::whereIn('name', ['file_upload', 'file_sharing', 'reminder_own'])->get();
        $role->syncPermissions($permissions);
        $permissions->each(function ($permission) use ($role) {
            $permission->syncRoles($role);
        });
        return response()->json('success');
    }
    public function removerole()
    {
        $user = Auth::user();
        $user->removeRole('admin');
        echo "success";
    }
    public function checkper()
    {
        $user = Auth::user();
        $roles = $user->getAllpermissions();
        return $roles;
    }

    public function getuserlist()
    {
        if (!Auth::user()->can('view_user_list')) {
            return redirect()->route('index');
        }
        $users = User::all();
        return view('backend.admin.userlist.userlist', compact('users'));
    }
    public function create_user()
    {
        $roles = Role::all();

        return view('backend.adduser.adduser', compact('roles'));

    }
    public function add_user(Request $request)
    {
     $validator = $request->validate([
         'nameEn' => 'required',
         'nameBn' => 'required',
         'email' => 'required|email|unique:users',
         'username' => 'required|unique:users',
         'phone' => 'required',
         'password' => 'required',
        //  'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif',
     ], [
         'nameEn.required' => 'The English name field is required.',
         'nameBn.required' => 'The Bengali name field is required.',
         'email.required' => 'The email field is required.',
         'email.email' => 'Please enter a valid email address.',
         'email.unique' => 'This email has already been taken.',
         'username.required' => 'The username field is required.',
         'username.unique' => 'This username has already been taken.',
         'phone.required' => 'The phone field is required.',
         'password.required' => 'The password field is required.',
        //  'profile_image.required' => 'The profile image field is required.',
        //  'profile_image.image' => 'Please upload an image file.',
        //  'profile_image.mimes' => 'Only JPEG, PNG, JPG, and GIF images are allowed.',
     ]);

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = $request->username . '-' . time() . '.' . $file->getClientOriginalExtension();
            $directory = 'uploads/prp-users/';

            if ($file->move(public_path($directory), $filename)) {
                $designInfos=['not'];
                $user = User::create([
                    'nameEn' =>  $request->nameEn,
                    'nameBn' => $request->nameBn,
                    'username' => $request->username,
                    'photo' => $filename,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'empId' => $request->username,
                    'designationInfos' => json_encode($designInfos),
                    'password' => Hash::make($request->password),
                    'status' => 1,
                  ]);
                $user->assignRole($request->roleselect);

                Session::flash('success', __('messages.successfully'));
                return redirect('user-list');
            } else {
                return redirect('create_user')->withErrors($validator)->withInput();
            }
        }else if( $request->hasFile('profile_image') == null){
            $designInfos=['not'];
            $user = User::create([
                'nameEn' =>  $request->nameEn,
                'nameBn' => $request->nameBn,
                'username' => $request->username,
                'photo' => 'df.jpg',
                'email' => $request->email,
                'phone' => $request->phone,
                'empId' => $request->username,
                'designationInfos' => json_encode($designInfos),
                'password' => Hash::make($request->password),
                'status' => 1,
              ]);
            $user->assignRole($request->roleselect);

            Session::flash('success', __('messages.successfully'));
            return redirect('user-list');

        } else {
            return redirect('create_user')->withErrors($validator)->withInput();
        }
    }
    public function deleteuser($id){
        $user = User::find($id);
        $user->delete();
        Session::flash('success', __('messages.successfully'));
        return redirect('user-list');
    }
}


