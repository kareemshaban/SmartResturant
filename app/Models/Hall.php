<?php

namespace App\Models;

use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'details_ar',
        'details_en',
    ];
    public function tables()
    {
        return $this->hasMany(Table::class , 'hall_id');
    }
}
