<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessPending extends Model
{
    protected $fillable = [
        'user_id',
    ];
    use HasFactory;
}
