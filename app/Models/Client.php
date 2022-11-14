<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'discount_type',
        'discount_value',
        'phone',
        'mobile',
        'fax_number',
        'postal_code',
        'email',
        'city_id',
        'house_number',
        'apartment_number',
        'region',
        'street',
        'address',
        'oppening_balance',
        'limit_money', // 0 is open no limit
        'limit_days' // 0 is open no limit
        
    ];

    public function City()
    {
        return $this->belongsTo(City::class , 'city_id');
    }
}
