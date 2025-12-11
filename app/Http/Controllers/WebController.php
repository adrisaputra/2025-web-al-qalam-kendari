<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Article;
use App\Models\ArticleViewer;
use App\Models\News;
use App\Models\NewsViewer;
use App\Models\Profile;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Video;
use App\Models\WorkUnit;
use Illuminate\Http\Request;
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

    public function news()
    {
        $slider = Slider::orderBy('id', 'DESC')->first();
        $title = "Berita";
        return view('web.news', compact('title', 'slider'));
    }

    public function news_list(Request $request)
    {
        $search =  $request->search;
        $news = News::where(function ($query) use ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        })->latest()->paginate(6)->onEachSide(1);

        if ($request->ajax()) {
            return view('web.news_list', compact('news'))->render();
        }

        $social = Social::orderBy('id', 'DESC')->limit(5)->get();
        $article = Article::orderBy('id', 'DESC')->limit(5)->get();

        return view('web.news', compact('news','social','article'));
    }

    public function news_detail(Request $request)
    {
        $slider = Slider::orderBy('id', 'DESC')->first();
        $title = "Berita";

        $news = $request->get('q');
        $news = News::where('slug', $news)->first();
        $get_news = News::where('id', '!=', $news->id)->limit(5)->get();
        $get_article = Article::where('id', '!=', $news->id)->limit(5)->get();

        $ipAddress = $request->ip();
        $viewer = NewsViewer::where('news_id', $news->id)
            ->where('ip_address', $ipAddress)
            ->first();

        if (!$viewer) {
            $news->news_viewer()->create([
                'ip_address' => $ipAddress,
            ]);

            $news->count_view = $news->count_view + 1;
            $news->save();
        }

        return view('web.news_detail', compact('title', 'slider', 'news', 'get_news','get_article'));
    }

    public function article()
    {
        $slider = Slider::orderBy('id', 'DESC')->first();
        $title = "Artikel";
        return view('web.article', compact('title', 'slider'));
    }

    public function article_list(Request $request)
    {
        $search =  $request->search;
        $article = Article::where(function ($query) use ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        })->latest()->paginate(6)->onEachSide(1);

        if ($request->ajax()) {
            return view('web.article_list', compact('article'))->render();
        }

        $social = Social::orderBy('id', 'DESC')->limit(5)->get();
        $article = Article::orderBy('id', 'DESC')->limit(5)->get();

        return view('web.article', compact('article','social','article'));
    }

    public function article_detail(Request $request)
    {
        $slider = Slider::orderBy('id', 'DESC')->first();
        $title = "Artikel";

        $article = $request->get('q');
        $article = Article::where('slug', $article)->first();
        $get_article = Article::where('id', '!=', $article->id)->limit(5)->get();
        $get_article = Article::where('id', '!=', $article->id)->limit(5)->get();

        $ipAddress = $request->ip();
        $viewer = ArticleViewer::where('article_id', $article->id)
            ->where('ip_address', $ipAddress)
            ->first();

        if (!$viewer) {
            $article->article_viewer()->create([
                'ip_address' => $ipAddress,
            ]);

            $article->count_view = $article->count_view + 1;
            $article->save();
        }

        return view('web.article_detail', compact('title', 'slider', 'article', 'get_article','get_article'));
    }

    public function album()
    {
        $slider = Slider::orderBy('id', 'DESC')->first();
        $title = "Galeri Foto";
        return view('web.album', compact('title', 'slider'));
    }

    public function album_list(Request $request)
    {
        $slider = Slider::orderBy('id', 'DESC')->first();
        $title = "Galeri Foto";

        $album = Album::latest()->paginate(6)->onEachSide(1);

        if ($request->ajax()) {
            return view('web.album_list', compact('album'))->render();
        }

        return view('web.album', compact('title', 'slider', 'album'));
    }

    public function video()
    {
        $slider = Slider::orderBy('id', 'DESC')->first();
        $title = "Galeri Video";
        $video = Video::orderBy('id', 'DESC')->paginate(6)->onEachSide(1);
        return view('web.video', compact('title', 'slider','video'));
    }

    public function video_list(Request $request)
    {
        $slider = Slider::orderBy('id', 'DESC')->first();
        $title = "Galeri Video";

        $video = Video::latest()->paginate(6)->onEachSide(1);

        if ($request->ajax()) {
            return view('web.video_list', compact('video'))->render();
        }

        return view('web.video', compact('title', 'slider', 'video'));
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
