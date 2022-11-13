<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Governorate;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
    ];
    
    
    public function governorates()
    {
        return $this->hasMany(Governorate::class , 'country_id');
    }
}
