<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'title','description','file_path','filetype','is_lock','lock_code','file_size','category_id','user_id','created_at','updated_at'
    ];
    use HasFactory;
}
