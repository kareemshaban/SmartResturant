<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'activity_ar',
        'activity_en',
        'phone1',
        'phone2',
        'fax1',
        'fax2'
    ];
}
