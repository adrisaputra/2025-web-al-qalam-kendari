<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicViewer extends Model
{
    use HasFactory;
    protected $fillable =[
        'academic_id',
        'ip_address'
    ];

    public function academic(){
        return $this->belongsTo('App\Models\Academic');
    }
}
