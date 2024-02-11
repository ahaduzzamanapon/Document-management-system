<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'document_id','file_type','user_id','comment','created_at','updated_at'	
    ];
    use HasFactory;
}
