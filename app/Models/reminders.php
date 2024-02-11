<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminders extends Model
{
    protected $fillable = [
        'document_id', 'user_id', 'reminder_type', 'reminder_date','if_notified','reminder_time',
    ];
    
    public function document()
    {
        return $this->belongsTo(Document::class);
    }
    use HasFactory;
}
