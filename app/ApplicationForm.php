<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'full_name',
        'birth_date',
        'location',
        'education',
        'languages',
        'detailed_info_id'
    ];

    public function details(){
        return $this->belongsTo(ApplicationDetail::class);
    }
}
