<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramViewer extends Model
{
    use HasFactory;
    protected $fillable =[
        'program_id',
        'ip_address'
    ];

    public function program(){
        return $this->belongsTo('App\Models\Program');
    }
}
