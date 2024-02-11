<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document_version extends Model
{
    protected $fillable = [
        'document_id','title','file_path', 'filetype', 'file_size', 'category_id', 'user_id',
    ];
    use HasFactory;
}
