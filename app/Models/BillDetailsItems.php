<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetailsItems extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'bill_details_id',
        'item_sizes_id'
        ];
}
