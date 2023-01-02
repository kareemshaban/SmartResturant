<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'start_at',
        'end_at',
        'state',
        'start_money',
        'end_money',
        'count'
    ];
}
