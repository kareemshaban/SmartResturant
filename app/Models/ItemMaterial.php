<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMaterial extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'item_id',
        'material_id',
        'size_id',
        'qnt',
        'level',
        'transformFactor',
        'price',
        'priceWithAddValue'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class , 'item_id');
    }

    public function material()
    {
        return $this->belongsTo(Item::class , 'material_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class , 'size_id');
    }
}
