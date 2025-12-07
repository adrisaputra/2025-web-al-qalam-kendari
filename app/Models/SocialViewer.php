<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialViewer extends Model
{
    use HasFactory;
    protected $fillable =[
        'social_id',
        'ip_address'
    ];

    public function social(){
        return $this->belongsTo('App\Models\Social');
    }

}
