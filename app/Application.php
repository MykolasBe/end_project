<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    const HIGH_SCHOOL_DEGREE = 0;
    const BACHELOR_DEGREE = 1;
    const MASTER_DEGREE = 2;
    const PHD_DEGREE = 3;

    public $timestamps = false;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'birth_date',
        'location',
        'education',
        'education_degree',
        'languages',
        'status',
        'work_experience',
        'work_type'
    ];

    public function jobs(){
        return $this->belongsToMany(JobPosition::class,'job_applications');
    }
}
