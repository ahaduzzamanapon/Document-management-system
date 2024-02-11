<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileActivities extends Model
{
    protected $fillable = [
        'user_id', 'action', 'file_id', 'activity_time','file_type'
    ];
    use HasFactory;
}
