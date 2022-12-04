<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'delivery_service',
        'service',
        'tobacco_tax',
        'receipt_tax'
        ];
}
