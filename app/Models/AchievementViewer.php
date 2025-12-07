<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievementViewer extends Model
{
    use HasFactory;
    protected $fillable =[
        'achievement_id',
        'ip_address'
    ];

    public function achievement(){
        return $this->belongsTo('App\Models\Achievement');
    }
}
