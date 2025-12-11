<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'cover',
        'slug',
        'text',
        'file',
        'count_view',
        'work_unit_id',
        'user_id',
    ];

    public function work_unit(){
        return $this->belongsTo('App\Models\WorkUnit');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    ## Relation
    public function news_viewer()
    {
        return $this->hasMany('App\Models\NewsViewer');
    }

}
