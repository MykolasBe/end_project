<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'client_description','location','img','description_id'];
}
