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
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    ## Relation
    public function viewer()
    {
        return $this->hasMany('App\Models\Viewer');
    }

}
