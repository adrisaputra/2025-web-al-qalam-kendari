<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleViewer extends Model
{
    use HasFactory;
    protected $fillable =[
        'social_id',
        'ip_address'
    ];

    public function article(){
        return $this->belongsTo('App\Models\Article');
    }

}
