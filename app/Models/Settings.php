<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'logo_en','logo_bn','title','reminder_alert_day', 'reminder_alert_time', 'upload_files', 'create_folder', 'user_login','remainder', 'previous_version',
    ];
}
