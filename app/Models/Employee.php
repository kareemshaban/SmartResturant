<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departments ;
use App\Models\Jobs ;
use App\Models\Religions ;
use App\Models\Gender ;
use App\Models\Nationality ;
use App\Models\MaritalStatus ;
use App\Models\Education ;






class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'department_id',
        'job_id',
        'religion_id',
        'gender_id',
        'nationalty_id',
        'martialState_id',
        'ID_number',
        'child_number',
        'birth_date',
        'education_id',
        'work_hours',
        'week_off_days',
        'phone',
        'mobile',
        'email',
        'postal_code',
        'fax_number',
        'address',
        'salary'

    ];



    public function Department()
    {
        return $this->belongsTo(Departments::class , 'department_id');
    }
    public function Job()
    {
        return $this->belongsTo(Jobs::class , 'job_id');
    }
    public function Religion()
    {
        return $this->belongsTo(Religions::class , 'religion_id');
    }
    public function Gender()
    {
        return $this->belongsTo(Gender::class , 'gender_id');
    }
    public function Nationalty()
    {
        return $this->belongsTo(Nationality::class , 'nationalty_id');
    }
    public function MartialState()
    {
        return $this->belongsTo(MaritalStatus::class , 'martialState_id');
    }
    public function Education()
    {
        return $this->belongsTo(Education::class , 'education_id');
    }
}
