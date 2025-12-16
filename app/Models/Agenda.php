<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $fillable =[
        'work_unit_id',
        'time',
        'date',
        'start',
        'end',
        'desc',
        'place',
        'responsible_person',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
