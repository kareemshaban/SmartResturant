<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipt extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'bill_number',
        'doc_type',
        'doc_date',
        'amount',
        'amount_with_tax',
        'tax',
        'bill_number_txt',
        'tax_number_txt',
        'supplier_id',
        'tax_type',
        'notes',
        'shift_number'
    ];

    public function doc()
    {
        return $this->belongsTo(ExpensesType::class , 'doc_type');
    }

}
