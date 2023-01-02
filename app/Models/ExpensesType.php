<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesType extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'show_bill_number',
        'show_supplier_name',
        'show_tax_number',
    ];
}
