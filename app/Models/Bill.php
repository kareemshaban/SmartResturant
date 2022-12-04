<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'billType',
        'client_id',
        'phone',
        'address',
        'driver_id',
        'delivery_service',
        'service',
        'bill_date',
        'bill_number',
        'total',
        'vat',
        'discount',
        'net',
        'user_id',
        'payed',
        'state',
        'table_id'
    ];


}
