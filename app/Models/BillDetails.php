<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'identifier',
        'bill_id',
        'item_id',
        'size_id',
        'item_size_id',
        'category_id',
        'qnt',
        'price',
        'priceWithVat',
        'total',
        'totalWithVat',
        'isExtra',
        'extra_item_id',
        'notes',
        'txt_holder',
        'payed'
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class , 'identifier' , 'identifier');
    }


    public function items()
    {
        return $this->belongsToMany(ItemSizes::class , 'bill_details_items'  ) ;
    }

}
