<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationDetail extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'description',
        'requirements',
        'advantages',
        'offer',
        ];

    public function application(){
        return $this->hasOne(ApplicationForm::class);
    }
}
