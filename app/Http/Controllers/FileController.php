<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Document;
use App\Models\Document_version;
use App\Models\Reminders;
use App\Models\ShareModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id = null)
    {
        $user = Auth::user();
        return view('backend.files.files', compact('user'));
    }
    public function file_upload(Request $request)
    {
        $user_id = Auth::user()->id;
        $category_id = $request->category_id_file;

        // Loop through each uploaded file

        $file = $request->file('file');

        $fileSizeInBytes = $file->getSize();
        $filename_original = $file->getClientOriginalName();
        $timestamp = now()->timestamp;
        $filetype = $file->getClientOriginalExtension();
        $random_string = bin2hex(random_bytes(10));
        $folderName = public_path('uploads/') . $user_id;
        if (!file_exists($folderName)) {
            mkdir($folderName, 0755, true); // Ensure that parent directories are created
        }
        $filename_path = $user_id . '/' . $timestamp . '_' . $category_id . '_' . $random_string . '.' . $filetype;
        $file->move($folderName, $filename_path);

        // Create a new Document model for each uploaded file and save it to the database
        $document = new Document();
        $document->title = $filename_original;
        $document->file_path = $filename_path;
        $document->filetype = $filetype;
        $document->file_size = $fileSizeInBytes;
        $document->category_id = $category_id;
        $document->user_id = $user_id;
        $document->save();
        $insertId = $document->id;

        return response()->json(['success' => __('messages.file') . ' ' . __('messages.upload') . ' ' . __('messages.successfully')], 200);
    }

    public function get_details(Request $request)
    {
        $dataIdfiles = $request->input('dataIdfiles');
        $datatype = $request->input('datatype');
        if ($datatype == 'file') {
            $data = Document::where('documents.id', $dataIdfiles)
                ->join('users', 'documents.user_id', '=', 'users.id')
                ->first(['users.*', 'documents.*']);

        } else {
            $data = Category::where('categories.id', $dataIdfiles)
                ->join('users', 'categories.user_id', '=', 'users.id')
                ->first(['users.*', 'categories.*']);
        }

        return response()->json($data);
    }
    public function move_folder(Request $request)
    {

        $selected_cat_id = $request->input('selectedcatid');
        $move_cat_to = $request->input('move_cat_to');
        $selecteddata_type = $request->input('selecteddata_type');
        if ($selecteddata_type == 'file') {
            $Document = Document::where('id', $selected_cat_id)->first();
            if ($Document) {
                $Document->update(['category_id' => $move_cat_to]);

                return response()->json('success');
            } else {
                return response()->json('error');
            }
        } else {
            $category = Category::where('id', $selected_cat_id)->first();
            if ($category) {
                $category->update(['parent_category_id' => $move_cat_to]);

                return response()->json('success');
            } else {
                return response()->json('error');
            }
        }
    }
    public function delete_files(Request $request)
    {
        $dataIdfiles = $request->input('dataIdfiles');
        $type_files = $request->input('type_files');
        $data = 'Unable to delete';
        if ($type_files == 'file') {
            $deletedRows = Document::where('id', $dataIdfiles)->delete();

            if ($deletedRows > 0) {
                $data = __('messages.file') . ' ' . __('messages.delete') . ' ' . __('messages.successfully');
            }
        } else {
            $deletedRows = Category::where('id', $dataIdfiles)->delete();

            if ($deletedRows > 0) {
                $data = __('messages.folder') . ' ' . __('messages.delete') . ' ' . __('messages.successfully');
            }
        }
        return response()->json($data);
    }
    public function get_path(Request $request)
    {
        $user_id = Auth::user()->id;
        $id = $request->input('folder_id');
        $selecteddata_type = $request->input('selecteddata_type');
        $selectedcatid = $request->input('selectedcatid');

        $allCategories = Category::all();

        $breadcrumbs = array();
        $currentCategoryId = $id;
        while ($currentCategoryId !== null) {
            $currentCategory = $allCategories->where('id', $currentCategoryId)->first();
            // dd($currentCategory);
            array_push($breadcrumbs, [
                'id' => $currentCategory->id,
                'name' => $currentCategory->name,
            ]);
            $currentCategoryId = $currentCategory->parent_category_id;
        }
        $data['breadcrumbs'] = array_reverse($breadcrumbs);
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('Admin')) {
            $data['folder'] = Category::where('parent_category_id', $id)->where('id', '!=', $selectedcatid)
                ->get();
        } else {
            $data['folder'] = Category::where('parent_category_id', $id)->where('id', '!=', $selectedcatid)
                ->where('user_id', $user_id)
                ->get();
        }
        return response()->json($data);
    }
    public function fetchData($id, $userfile)
    {

        $user_id = Auth::user()->id;
        $selectedCategoryId = $id ?? 1;
        $allCategories = Category::all();
        $breadcrumbs = array();
        $data['parantcat'] = $allCategories->where('id', $selectedCategoryId)->first()->parent_category_id;
        if ($data['parantcat'] == null) {
            $data['parantcat'] = 'back';
        }
        $currentCategoryId = $selectedCategoryId;

        while ($currentCategoryId !== null) {
            $currentCategory = $allCategories->where('id', $currentCategoryId)->first();
            array_push($breadcrumbs, [
                'id' => $currentCategory->id,
                'name' => $currentCategory->name,
            ]);
            $currentCategoryId = $currentCategory->parent_category_id;
        }
        $data['breadcrumbs'] = array_reverse($breadcrumbs);
        if ($userfile == 'all') {
            $data['folderData'] = $allCategories->where('parent_category_id', $selectedCategoryId);
            $data['fileData'] = Document::where('category_id', $selectedCategoryId)->get();

        } else {
            $data['folderData'] = $allCategories->where('user_id', $userfile)->where('parent_category_id', $selectedCategoryId);
            $data['fileData'] = Document::where('category_id', $selectedCategoryId)->where('user_id', $userfile)->get();
        }

        $data['Category'] = $selectedCategoryId;
        return response()->json($data);
    }
    public function fetch_data_shared($id, $startid)
    {

        $user_id = Auth::user()->id;
        $selectedCategoryId = $id;
        $allCategories = Category::all();
        $breadcrumbs = array();
        $currentCategoryId = $selectedCategoryId;

        while ($currentCategoryId !== null) {
            $currentCategory = $allCategories->where('id', $currentCategoryId)->first();
            array_push($breadcrumbs, [
                'id' => $currentCategory->id,
                'name' => $currentCategory->name,
            ]);
            if ($currentCategoryId == $startid) {
                break;
            }
            $currentCategoryId = $currentCategory->parent_category_id;
        }

        $data['breadcrumbs'] = array_reverse($breadcrumbs);
        $data['folderData'] = $allCategories->where('parent_category_id', $selectedCategoryId);
        $data['fileData'] = Document::where('category_id', $selectedCategoryId)->get();
        $data['Category'] = $selectedCategoryId;
        return response()->json($data);
    }
    public function search_data($id, $searchData, $userfile)
    {$user_id = Auth::user()->id;
        $selectedCategoryId = $id ?? 1;
        if ($userfile == 'all') {
            $data['folderData'] = Category::where('name', 'like', '%' . $searchData . '%')->where('parent_category_id', $selectedCategoryId)->get();
            $data['fileData'] = Document::where('category_id', $selectedCategoryId)->where('title', 'like', '%' . $searchData . '%')->get();
        } else {
            $data['folderData'] = Category::where('name', 'like', '%' . $searchData . '%')->where('parent_category_id', $selectedCategoryId)->where('user_id', $userfile)->get();
            $data['fileData'] = Document::where('category_id', $selectedCategoryId)->where('title', 'like', '%' . $searchData . '%')->where('user_id', $userfile)->get();
        }

        $data['Category'] = $selectedCategoryId;
        $data['searchData'] = $searchData;
        return response()->json($data);
    }
    public function search_data_type($id, $searchData, $userfile)
    {$user_id = Auth::user()->id;
        $selectedCategoryId = $id ?? 1;
        if ($userfile == 'all') {
            $data['folderData'] = Category::where('name', 'like', '%' . $searchData . '%')->where('parent_category_id', $selectedCategoryId)->get();
            $data['fileData'] = Document::where('category_id', $selectedCategoryId)->where('filetype', 'like', '%' . $searchData . '%')->get();
        } else {
            $data['folderData'] = Category::where('name', 'like', '%' . $searchData . '%')->where('parent_category_id', $selectedCategoryId)->where('user_id', $userfile)->get();
            $data['fileData'] = Document::where('category_id', $selectedCategoryId)->where('filetype', 'like', '%' . $searchData . '%')->where('user_id', $userfile)->get();
        }

        $data['Category'] = $selectedCategoryId;
        $data['searchData'] = $searchData;
        return response()->json($data);
    }
    public function storage()
    {
        $user_id = Auth::user()->id;
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('Admin')) {
            $documents = Document::all();
        } else {
            $documents = Document::where('user_id', $user_id)->get();
        }
        $filetypeTotals = [];
        $formatFileSize = function ($fileSizeInBytes) {
            $units = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            $unitIndex = 0;
            while ($fileSizeInBytes >= 1024 && $unitIndex < count($units) - 1) {
                $fileSizeInBytes /= 1024;
                $unitIndex++;
            }
            return round($fileSizeInBytes, 2) . ' ' . $units[$unitIndex];
        };
        // Calculate total used space and file type totals
        $totalUsedSpaceBytes = 0;
        foreach ($documents as $document) {
            // Get the filetype and file size for each document
            $filetype = $document->filetype;
            $fileSize = $document->file_size;
            // Add the file size to the total size for this filetype
            if (!isset($filetypeTotals[$filetype])) {
                $filetypeTotals[$filetype] = ['size' => 0, 'percentage' => 0];
            }
            $filetypeTotals[$filetype]['size'] += $fileSize;
            $totalUsedSpaceBytes += $fileSize;
        }
        // Calculate the percentage of total space consumed for each filetype
        foreach ($filetypeTotals as &$data) {
            if ($totalUsedSpaceBytes != 0) {
                $data['percentage'] = ($data['size'] / $totalUsedSpaceBytes) * 100;
            } else {
                $data['percentage'] = 0; // Handle the case when totalUsedSpaceBytes is zero.
            }
            $data['size'] = $formatFileSize($data['size']);
            $data['percentage'] = round($data['percentage'], 2);
            $data['color'] = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }

        // Format the total used storage space
        $totalUsedSpace = $formatFileSize($totalUsedSpaceBytes);

        $all_users = User::all();
        $con_data = [];
        foreach ($all_users as $users) {
            $totalUsedSpaceBytes = 0;
            $documents_all_user = Document::where('user_id', $users->id)->get();
            foreach ($documents_all_user as $document) {
                $fileSize = $document->file_size;
                $totalUsedSpaceBytes += $fileSize;
            }
            $con_data[] = [
                'nameEn' => $users->nameEn,
                'nameBn' => $users->nameBn,
                'user_id' => $users->user_id,
                'photo' => $users->photo,
                'total_used_space' => $formatFileSize($totalUsedSpaceBytes),
            ];
        }

        // Pass the data to the view and return the view
        return view('backend.storage.storage', compact('con_data', 'filetypeTotals', 'totalUsedSpace'));
    }
    public function set_reminder(Request $request)
    {
        $users = $request->input('users');
        foreach ($users as $value) {
            $reminder = new Reminders;
            $reminder->document_id = $request->input('cat_id_set_remainder');
            $reminder->user_id = $value;
            $reminder->file_type = $request->input('file_type_set_remainder');
            $reminder->reminder_date = $request->input('reminder_date');
            $reminder->reminder_time = $request->input('reminder_time');
            $reminder->reminder_type = $request->input('reminder_description');
            $reminder->save();
        }
        return response()->json('success');
    }

    public function notification()
    {
        $reminders = Reminders::where('user_id', Auth::user()->id)->latest()->paginate(15);
        return view('backend.notification.notification', compact('reminders'));
    }
    public function delete_reminder(Request $request)
    {
        $reminder = Reminders::where('id', $request->id)->delete();
        return response()->json('success');
    }
    public function mark_as_read_Reminder(Request $request)
    {
        $reminder = Reminders::where('id', $request->id)->update(['if_notified' => 0]);
        return response()->json($request->id);
    }
    public function delete_all_reminder(Request $request)
    {
        $reminder = Reminders::where('user_id', Auth::user()->id)->delete();
        return response()->json('success');
    }
    public function getfilepath($id)
    {
        $documents = Document::select('file_path')->where('id', $id)->first();
        return response()->json($documents);
    }
    public function get_file_locking_data($id)
    {
        $documents = Document::select('*')->where('id', $id)->first();
        return response()->json($documents);
    }
    public function reminder_show()
    {
        $date = Carbon::now('Asia/Dhaka');
        $reminders = Reminders::select('reminders.*')
            ->where('reminders.user_id', Auth::user()->id)
            ->where('if_notified', 1)
            ->where('reminder_date', '<=', $date->format('Y-m-d'))
            ->where('reminder_time', '<=', $date->format('H:i:s'))
            ->leftJoin('categories', function ($join) {
                $join->on('categories.id', '=', 'reminders.document_id')
                    ->where('reminders.file_type', '=', 'folder');
            })
            ->leftJoin('documents', function ($join) {
                $join->on('documents.id', '=', 'reminders.document_id')
                    ->where('reminders.file_type', '<>', 'folder');
            })
            ->selectRaw('COALESCE(categories.name, documents.title) as document_name')
            ->get();
        return response()->json($reminders);
    }
    public function get_comment($id, $file_type)
    {
        $comment = Comment::join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.document_id', $id)
            ->where('comments.file_type', $file_type)
            ->latest()
            ->get(['users.nameEn', 'users.photo', 'comments.*']);

        return response()->json($comment);
    }
    public function get_file_version($id)
    {
        $Document_version = Document_version::where('document_id', $id)
            ->get();
        return response()->json($Document_version);
    }

    public function add_comment(Request $request)
    {
        $Comment = new Comment;
        $Comment->document_id = $request->input('comment_document_id');
        $Comment->file_type = $request->input('comment_file_type');
        $Comment->user_id = Auth::user()->id;
        $Comment->comment = $request->input('comment');
        $Comment->save();

        $latestComment = Comment::join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.document_id', $request->input('comment_document_id'))
            ->where('comments.file_type', $request->input('comment_file_type'))
            ->latest()
            ->first(['users.nameEn', 'users.photo', 'comments.*']);
        return response()->json($latestComment);
    }
    public function add_version(Request $request)
    {
        $user_id = Auth::user()->id;
        $document = Document::where('id', $request->input('document_id'))->first();

        $file = $request->file('version_file');
        if ($file) {
            $version = new Document_version;
            $version->document_id = $document->id;
            $version->title = $document->title;
            $version->filetype = $document->filetype;
            $version->file_size = $document->file_size;
            $version->category_id = $document->category_id;
            $version->user_id = $document->user_id;
            $version->file_path = $document->file_path;
            $version->save();
            $category_id = $document->category_id;

            $fileSizeInBytes = $file->getSize();
            $filename_original = $file->getClientOriginalName();
            $timestamp = now()->timestamp;
            $filetype = $file->getClientOriginalExtension();
            $random_string = bin2hex(random_bytes(10));
            $folderName = public_path('uploads/') . $user_id;
            if (!file_exists($folderName)) {
                mkdir($folderName, 0755, true);
            }
            $filename_path = $user_id . '/' . $timestamp . '_' . $category_id . '_' . $random_string . '.' . $filetype;
            $file->move($folderName, $filename_path);

            $document->title = $filename_original;
            $document->file_path = $filename_path;
            $document->filetype = $filetype;
            $document->file_size = $fileSizeInBytes;
            $document->user_id = $user_id;
            $document->save();

            Session::flash('success', __('messages.file version') . ' ' . __('messages.successfully'));
            return response()->json('success');
        } else {
            return response()->json('errorfile');
        }
    }
    public function file_locking_form(Request $request)
    {
        $user_id = Auth::user()->id;
        $document = Document::where('id', $request->input('lokingfileid'))->first();
        if (empty($document)) {
            return response()->json([
                'status' => 'error',
                'message' => 'File Not Found',
            ]);
        }
        if ($document->is_lock == 1) {
            if ($request->input('lock_file_check_box')) {
                $document->is_lock = 1;
                $document->lock_code = $request->input('lock_file_password');
                $document->save();
                return response()->json([
                    'status' => 'success',
                    'message' => __("messages.File locked Successfully") 
                ]); 
            }else{
                if ($document->lock_code == $request->input('lock_file_password')) {
                    $document->is_lock = 0;
                    $document->lock_code ='';
                    $document->save();
                    return response()->json([
                        'status' => 'success',
                        'message' => __("messages.File unlocked successfully") ,
                    ]);
                }else{
                    return response()->json([
                        'status' => 'error',
                        'message' => __("messages.Incorrect password. Please try again") ,
                    ]);
                }

            }

        }else{
            $document->is_lock = 1;
            $document->lock_code = $request->input('lock_file_password');
            $document->save();
            return response()->json([
                'status' => 'success',
                'message' => __("messages.File locked Successfully") 
            ]);
        }


    }
    public function share_file(Request $request)
    {
        // dd($request->all());
        // "document_id_for_share" => "2"
        // "document_type_for_share" => "file"
        // "users" => array:1 [▼
        //   0 => "1"
        // ]
        // "access_type" => "2"
        // "date" => "2023-10-22"
        // "time" => "09:47"
        // "description" => "jkjhkh"
        $timestamp = now()->timestamp;
        $Shareid = uniqid(Auth::user()->id . $timestamp);
        foreach ($request->input('users') as $user) {
            $ShareModel = new ShareModel();
            $ShareModel->document_id = $request->input('document_id_for_share');
            $ShareModel->document_type = $request->input('document_type_for_share');
            $ShareModel->shared_id = $Shareid;
            $ShareModel->shared_by = Auth::user()->id;
            $ShareModel->shared_to = $user;
            $ShareModel->permission = $request->input('access_type');
            $ShareModel->date = $request->input('date');
            $ShareModel->time = $request->input('time');
            $ShareModel->description = $request->input('description');
            $ShareModel->save();
        }
        Session::flash('success', __('messages.share') . ' ' . __('messages.successfully'));
        return redirect()->back();
    }
    public function share_file_manager()
    {
        $share_list = ShareModel::where('share_models.shared_to', Auth::user()->id)
            ->join('users', 'users.id', '=', 'share_models.shared_by')
            ->select('users.*', 'share_models.*')
            ->get();

        return view('backend.admin.sharefilemanger.sharefilemanger', compact('share_list'));

    }
    public function shared_file_manager()
    {

        return view('backend.files.shared_file_manager');

    }
    public function delete_share_files($ids)
    {
        $shares = ShareModel::where('shared_id', $ids)->get();
        $shares->each(function ($share) {
            $share->delete();
        });
        Session::flash('success', __('messages.delete') . ' ' . __('messages.successfully'));
        return redirect('share-file-manager');
    }

    public function delete_share_file_own($ids)
    {
        $shares = ShareModel::where('shared_id', $ids)
            ->where('shared_to', Auth::user()->id)
            ->delete();
        Session::flash('success', __('messages.delete') . ' ' . __('messages.successfully'));
        return redirect('share-file-manager');
    }

    public function get_file(Request $request)
    {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('Admin')) {
            $document = Document::where('id', $request->input('id'))->first();
        } else {
            $document = Document::where('id', $request->input('id'))->where('user_id', Auth::user()->id)->first();
        }
        if ($document == null) {
            $ifshare = ShareModel::where('share_models.shared_to', Auth::user()->id)->where('document_id', $request->input('id'))->first();

            if ($ifshare != null) {
                $accesstype = $ifshare->permission;
                $document = Document::where('id', $ifshare->document_id)->first();
            } else {
                $startid = $request->input('startid');
                $ifsharef = ShareModel::where('document_id', $startid)->where('document_type', 'folder')->first();
                if ($ifsharef != null) {
                    $accesstype = $ifsharef->permission;
                    $document = Document::where('id', $request->input('id'))->first();
                } else {
                    return response()->json('error');
                }
            }
        } else {
            $accesstype = 2;
        }
        return response()->json(['document' => $document, 'accesstype' => $accesstype]);
    }
}
