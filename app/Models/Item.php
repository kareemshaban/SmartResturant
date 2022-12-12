<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemSizes ;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'code',
        'name_ar',
        'name_en',
        'type', // 0 item 1 extra 2 material
        'category_id',
        'description_ar',
        'description_en',
        'img',
        'isAddValue',
        'addValue'
    ];

    public function cayegory()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function sizes()
    {
        return $this->hasMany(ItemSizes::class , 'item_id');
    }


}
