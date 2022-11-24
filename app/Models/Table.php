<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hall;
class Table extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'hall_id',
        'name_ar',
        'name_en',
        'available',
    ];
    public function hall(){
        return $this->belongsTo(Hall::class , 'hall_id');
    }
}
