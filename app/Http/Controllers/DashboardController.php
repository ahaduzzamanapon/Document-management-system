<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Document;
use App\Models\Settings;
use App\Models\Reminders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index($id = null)
    {
        $user_id = Auth::user()->id;
        $fileData = Document::get();
        return view('app', compact('fileData'));
    }
    public function user_dashboard($id = null)
    {
        $user = Auth::user();
        $setting=Settings::first();
        if ($user->hasRole('admin') || $user->hasRole('Admin')) {
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->nameEn;
            $totalFiles = Document::count();
            $totalFolders = Category::count();
            $totalUser=User::count();
            $recentFolders = Category::where('id', '!=', 1)->latest()->take(8)->get();
            $fileData = Document::latest()
                ->take(10)
                ->get();
            $documents = Document::get();
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

            return view('app', compact('fileData', 'user','totalUser', 'recentFolders', 'totalFiles', 'totalFolders', 'user_name', 'totalUsedSpace', 'filetypeTotals'));
        } else {
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->nameEn;
            $totalFiles = Document::where('user_id', $user_id)->count();
            $totalFolders = Category::where('user_id', $user_id)->count();
            $recentFolders = Category::where('user_id', $user_id)->latest()->take(8)->get();

            $fileData = Document::where('user_id', $user_id)->latest()
                ->take(10)
                ->get();
            $documents = Document::where('user_id', $user_id)->get();
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
            return view('user_dashboard', compact('fileData', 'user', 'recentFolders', 'totalFiles', 'totalFolders', 'user_name', 'totalUsedSpace', 'filetypeTotals'));
        }

    }
}
