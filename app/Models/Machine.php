<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'code',
        'name',
        'hall_id',
        'mac_address'
    ];
    public function hall()
    {
        return $this->belongsTo(Hall::class , 'hall_id');
    }

}
