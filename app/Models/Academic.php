<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'cover',
        'slug',
        'text',
        'file',
        'category',
        'count_view',
        'work_unit_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function work_unit(){
        return $this->belongsTo('App\Models\WorkUnit');
    }

    ## Relation
    public function academic_viewer()
    {
        return $this->hasMany('App\Models\AcademicViewer');
    }

}
