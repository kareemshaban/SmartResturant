<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'header_ar',
        'header_en',
        'footer_ar',
        'footer_en',
        'logo',
        'bill_header_ar',
        'bill_header_en',
        'bill_footer_ar',
        'bill_footer_en',
    ];
}
