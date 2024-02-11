<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RollManagement;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Route::get('/', function () {
//     return view('app');
// });
Route::get("/login", function () {
    return view('login');
});


Route::get('lang/home', 'LangController@index');
Route::get('lang/change', 'LangController@change')->name('changeLang');
// Route::get('/files', function(){
//     return view('backend.files.files');
// });
//Manage Dashboard
Route::group(['middleware' => 'checkUserRole'], function () {

    Route::get('/user', [DashboardController::class, 'user_dashboard'])->name('index');

    Route::get('/', [DashboardController::class, 'user_dashboard'])->name('index');
    // Manage Categories
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::post('/rename', [CategoryController::class, 'rename']);
    Route::post('/download_file', [CategoryController::class, 'download_file'])->name('download_file');

    // Manage File
    Route::get('/files', [FileController::class, 'index']);
    Route::get('/get_details', [FileController::class, 'get_details']);
    Route::get('/files/{folderId}', [FileController::class, 'index']);
    Route::post('/files/upload', [FileController::class, 'file_upload']);
    Route::get('/file_preview', [FileController::class, 'file_preview']);
    Route::get('/delete_files', [FileController::class, 'delete_files']);
    Route::get('/get_path', [FileController::class, 'get_path']);
    Route::get('/fetch_data/{id}/{userfile}', [FileController::class, 'fetchData']);
    Route::get('/fetch_data_shared/{id}/{startid}', [FileController::class, 'fetch_data_shared']);
    Route::get('/search_data/{id}/{searchData}/{userfile}', [FileController::class, 'search_data']);
    Route::get('/search_data_type/{id}/{searchData}/{userfile}', [FileController::class, 'search_data_type']);
    Route::get('/move_folder', [FileController::class, 'move_folder']);
    Route::get('/storage', [FileController::class, 'storage']);
    Route::post('/set_reminder', [FileController::class, 'set_reminder']);
    Route::get('/notification', [FileController::class, 'notification']);
    Route::post('/delete_reminder', [FileController::class, 'delete_reminder']);
    Route::post('/delete_all_reminder', [FileController::class, 'delete_all_reminder']);
    Route::get('/reminder_show', [FileController::class, 'reminder_show']);
    Route::post('/mark_as_read_Reminder', [FileController::class, 'mark_as_read_Reminder']);
    Route::get('/get_comment/{id}/{file_type}', [FileController::class, 'get_comment']);
    Route::get('/get_file_version/{id}', [FileController::class, 'get_file_version']);
    Route::post('/add_comment', [FileController::class, 'add_comment']);
    Route::post('/get_file', [FileController::class, 'get_file'])->name('get_file');
    Route::post('/file_locking_form', [FileController::class, 'file_locking_form'])->name('file_locking_form');

    Route::get('/getfilepath/{id}', [FileController::class, 'getfilepath']);
    Route::get('/get_file_locking_data/{id}', [FileController::class, 'get_file_locking_data']);
    Route::post('/add_version', [FileController::class, 'add_version'])->name('add_version');
    Route::post('/share_file', [FileController::class, 'share_file']);
    Route::get("/share-file-manager", [FileController::class, 'share_file_manager']);
    Route::get("/shared_file_manager", [FileController::class, 'shared_file_manager']);
    Route::get("/delete_share_file/{id}", [FileController::class, 'delete_share_files']);
    Route::get("/delete_share_file_own/{id}", [FileController::class, 'delete_share_file_own']);

    // RollManagement start
    Route::get('/role_permission', [RollManagement::class, 'index']);
    Route::get('/update', [RollManagement::class, 'update']);
    Route::get('/add_permission', [RollManagement::class, 'add_permission']);
    Route::get('/getallp', [RollManagement::class, 'getallp']);
    Route::post('/add_user_role_permission', [RollManagement::class, 'add_user_role_permission']);
    Route::get('/update_role_get/{id}', [RollManagement::class, 'update_role_get']);
    Route::get('/role_permission/delete/{id}', [RollManagement::class, 'delete']);
    Route::post('update_user_role_permission', [RollManagement::class, 'update_user_role_permission']);
    // RollManagement end

    // user List start
    Route::get("/user-list", [HomeController::class, 'getuserlist']);
    Route::get("/delete-user/{id}", [HomeController::class, 'deleteuser']);
    // user List end

    // profile List start
    Route::get("/user-profile", [ProfileController::class, 'profile_details']);
    Route::get("/user-profile/{id}", [ProfileController::class, 'profile_details']);
    Route::post("/update_user_profile", [ProfileController::class, 'update_user_profile']);
    // profile List end

});



Route::get("/asing_role", [HomeController::class, 'asing_role']);
Route::get("/checkper", [HomeController::class, 'checkper']);
Route::get("/removerole", [HomeController::class, 'removerole']);
Route::get('/create', [HomeController::class, 'create']);
Route::get('/setting', [HomeController::class, 'settings']);
Route::post('/add_setting', [HomeController::class, 'add_settings']);
Route::get('/create_user', [HomeController::class, 'create_user']);
Route::post('/add_user', [HomeController::class, 'add_user']);




// route::get('/create_user', function () {
//     return view('backend.adduser.adduser');
// });

Route::get("/all_users_storage", function () {
  return  view('backend.admin.alluserstorage.alluserstorage');
});

// Route::get("/role_permission", function(){
//     return view('backend.role&prmission.roleandpermission');
// });


// Route::get("/user-list", function(){
//     return view('backend.admin.userlist.userlist');
// });
// Route::get("user-profile", function(){
//     return view('backend.userprofile.userprofile');
// });

// Route::get("/pending-user-list", function () {
//     return view('backend.admin.userpendinglist.userpendinglist');
// });
// Route::get("/share-file-manager", function () {
//     return view('backend.admin.sharefilemanger.sharefilemanger');
// });
Route::get("/share-with-you", function () {
    return view('backend.admin.sharewithfile.sharewithfile');
});
// Route::get("user-profile", function () {
//     return view('backend.userprofile.userprofile');
// });
Route::get('/no-role-page', [HomeController::class, 'no_access'])->name('no-role-page');
Route::get('/access_request_send', [HomeController::class, 'access_request_send']);
Route::get('/access_pending_list', [HomeController::class, 'access_pending_list']);
Route::get("/under-construction", function () {
    return view('underconstruction.underconstruction');
});
Auth::routes();
