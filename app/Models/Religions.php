<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee ;


class Religions extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
    ];

    public function Employee()
    {
        return $this->hasMany(Employee::class , 'religion_id');
    }
}
