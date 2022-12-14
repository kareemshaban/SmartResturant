<?php

namespace App\Models;

use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;


class ItemSizes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'item_id',
        'size_id',
        'level',
        'transformFactor',
        'price',
        'priceWithAddValue'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class , 'item_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class , 'size_id');
    }

}
