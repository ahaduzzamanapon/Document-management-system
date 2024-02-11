<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareModel extends Model
{
    protected $fillable = [
        'document_id','document_type','shared_id','permission','shared_by','shared_to','date','time','description',
    ];
    use HasFactory;
}
