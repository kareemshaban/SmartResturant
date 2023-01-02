<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'identifier',
        'billType',
        'client_id',
        'phone',
        'address',
        'driver_id',
        'table_id',
        'delivery_service',
        'bill_date',
        'bill_number',
        'total',
        'vat',
        'serviceVal',
        'discount',
        'net',
        'user_id',
        'payed',
        'state',
        'client_name',
        'driver_name',
        'cash',
        'credit',
        'bank',
        'notes'

    ];
    public function details()
    {
        return $this->hasMany(BillDetails::class , 'identifier' , 'identifier') -> orderBy('id', 'asc') ;
    }
    public function table(){
        return $this->belongsTo(Table::class , 'table_id');
    }
    public function client(){
        return $this->belongsTo(Client::class , 'client_id');
    }

}
