<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkUnit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'web_url',
        'theme_color',
        'spmb_status',
        'spmb_url',
        'spmb_requirement',
        'image'
    ];

    public function news(){
        return $this->hasOne('App\Models\News');
    }


}
