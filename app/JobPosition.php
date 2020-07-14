<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'client_description',
        'description',
        'location',
        'img',
    ];

    public function applications(){
        return $this->belongsToMany(Application::class,'job_applications');
    }
}
