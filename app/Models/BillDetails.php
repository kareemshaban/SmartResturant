<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'bill_id',
        'item_id',
        'size_id',
        'item_size_id',
        'qnt',
        'price',
        'priceWithVat',
        'total',
        'totalWithVat',
        'isExtra',
        'extra_item_id'
    ];
}
