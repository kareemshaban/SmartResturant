<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemSizes;
class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name_ar',
        'name_en'
    ];

    public function itemSize()
    {
        return $this->belongsTo(ItemSizes::class , 'size_id');
    }
}
