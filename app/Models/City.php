<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Governorate;
class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'governorate_id'
    ];

    public function Governorate()
    {
        return $this->belongsTo(Governorate::class , 'governorate_id');
    }
    
}
