<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Article;
use App\Models\News;
use App\Models\Profile;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Video;
use App\Models\WorkUnit;
use Illuminate\Support\Facades\Crypt;

class WebController extends Controller
{
    
    public function index()
    {
        $slider = Slider::orderBy('id', 'DESC')->get();
        $profile = Profile::where('menu','profile')->first();
        $work_unit = WorkUnit::where('id','!=',1)->get();
        $social = Social::orderBy('id', 'DESC')->limit(4)->get();
        $news = News::orderBy('id', 'DESC')->limit(4)->get();
        $article = Article::orderBy('id', 'DESC')->limit(4)->get();
        $video = Video::orderBy('id', 'DESC')->limit(2)->get();
        $album = Album::orderBy('id', 'DESC')->limit(10)->get();
        return view('web.home', compact('slider','profile','work_unit','social','news', 'article', 'video', 'album'));
    }

    public function spmb()
    {
        $slider = Slider::get();
        $work_unit = WorkUnit::where('spmb_status','Y')->get();
        return view('web.spmb', compact('slider','work_unit'));
    }

    public function spmb_detail($work_unit)
    {
        $work_unit = Crypt::decrypt($work_unit);
        $work_unit = WorkUnit::where('id', $work_unit)->first();
        return view('web.spmb_detail', compact('work_unit'));
    }

}
