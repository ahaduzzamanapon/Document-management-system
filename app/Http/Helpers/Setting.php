<?php
namespace App\Http\Helpers;
use App\Models\Settings;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class Setting
{

   

    public static function Settings()
    {
        return  Settings::first();
    }
    public static function upload_file()
    {
        return self::Settings()->upload_files;
    }
    public static function create_folder()
    {
        return self::Settings()->create_folder;
    }
    public static function user_login()
    {
        return self::Settings()->user_login;
    }
    public static function remainder()
    {
        return self::Settings()->remainder;
    }
    public static function download()
    {
        return self::Settings()->download;
    }
    
    public static function previous_version()
    {
        return self::Settings()->previous_version;
    }
    public static function get_all_user()
    {
        return User::all();
    }
}