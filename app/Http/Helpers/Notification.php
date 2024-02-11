<?php
namespace App\Http\Helpers;
use App\Models\ShareModel;
use App\Models\Reminders;
use Illuminate\Support\Facades\Auth;

class Notification
{
   
    public static function get_remainder()
    {
        $reminders = Reminders::where('if_notified', 1)
        ->join('users', 'users.id', '=', 'reminders.user_id')
        ->where('user_id', Auth::user()->id)
        ->select('reminders.*', 'users.nameEn', 'users.nameBn')
        ->latest()
        ->get();
        return $reminders;
    }

   public static function get_shared()
   {
       $shares = ShareModel::where('date', '<=', date('Y-m-d'))  
                 ->join('users', 'users.id', '=', 'share_models.shared_by')
                 ->where('shared_to', Auth::user()->id)
                 ->select('share_models.*', 'users.nameEn', 'users.nameBn')
                 ->latest()
                 ->get();
       return $shares;
   }
}