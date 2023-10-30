<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['id','date','purchase_id','sale_id','company_id','amount','paid_by','remain',
        'user_id' , 'shift_number'];

    public function user(){
        return $this -> belongsTo(User::class , 'user_id');
    }
}
