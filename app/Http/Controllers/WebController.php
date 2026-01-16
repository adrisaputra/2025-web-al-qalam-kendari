<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Album;
use App\Models\Article;
use App\Models\ArticleViewer;
use App\Models\News;
use App\Models\NewsViewer;
use App\Models\Profile;
use App\Models\Slider;
use App\Models\Social;
use App\Models\SocialViewer;
use App\Models\Structure;
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
        $video = Video::where('work_unit_id',Helpers::get_work_unit()->id)->orderBy('id', 'DESC')->limit(2)->get();
        $album = Album::where('work_unit_id',Helpers::get_work_unit()->id)->orderBy('id', 'DESC')->limit(10)->get();
        return view('web.home', compact('slider','profile','work_unit','social','news', 'article', 'video', 'album'));
    }

    public function news()
    {
        $title = "Berita";
        return view('web.news', compact('title'));
    }

    public function profile()
    {
        if (request()->is('page-profile')) {
            $title = "Profil";
        } elseif (request()->is('page-vision')) {
            $title = "Visi";
        } elseif (request()->is('page-mission')) {
            $title = "Misi";
        } elseif (request()->is('page-structure')) {
            $title = "Struktur Organisasi Desa";
        } elseif (request()->is('page-structure1')) {
            $title = "Dewan Pembina";
        } elseif (request()->is('page-structure2')) {
            $title = "Dewan Pengawas";
        } elseif (request()->is('page-structure3')) {
            $title = "Pengurus Yayasan";
        } 
        return view('web.profile', compact('title'));
    }

    public function profile_list($menu)
    {
        if ($menu=='profile') {
            $title = "Profil";
            $profile = Profile::where('menu', 'profile')->first();
            return view('web.profile_list', compact('title','profile'));
        } elseif ($menu=='vision') {
            $title = "Visi";
            $profile = Profile::where('menu', 'vision')->first();
            return view('web.profile_list', compact('title','profile'));
        } elseif ($menu=='mission') {
            $title = "Misi";
            $profile = Profile::where('menu', 'mission')->first();
            return view('web.profile_list', compact('title','profile'));
        } elseif ($menu=='structure') {
            $title = "Struktur";
            $profile = Profile::where('menu', 'structure')->first();
            return view('web.profile_list', compact('title','profile'));
        } elseif ($menu=='structure1') {
            $title = "Dewan Pembina";
            $structure = Structure::where('category', 'Dewan Pembina')->get();
            return view('web.structure_list', compact('title','structure'));
        }  elseif ($menu=='structure2') {
            $title = "Dewan Pengawas";
            $structure = Structure::where('category', 'Dewan Pengawas')->get();
            return view('web.structure_list', compact('title','structure'));
        }  elseif ($menu=='structure3') {
            $title = "Pengurus Yayasan";
            $structure = Structure::where('category', 'Pengurus Yayasan')->get();
            return view('web.structure_list', compact('title','structure'));
        } 

    }

    public function get_structure(Request $request, Structure $structure)
    {
        if($request->ajax()){
            return response()->json(['success' => true, 'structure' => $structure ]);
        }
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
        $title = "Berita";

        $news = $request->get('q');
        $news = News::where('slug', $news)->first();
        $get_news = News::where('id', '!=', $news->id)->limit(5)->get();
        $get_article = Article::limit(5)->get();

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

        return view('web.news_detail', compact('title', 'news', 'get_news','get_article'));
    }

    public function article()
    {
        $title = "Artikel";
        return view('web.article', compact('title'));
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
        $title = "Artikel";

        $article = $request->get('q');
        $article = Article::where('slug', $article)->first();
        $get_news = News::limit(5)->get();
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

        return view('web.article_detail', compact('title', 'article', 'get_news','get_article'));
    }

    public function social()
    {
        $title = "Sosial dan Dakwah";
        return view('web.social', compact('title'));
    }

    public function social_list(Request $request)
    {
        $search =  $request->search;
        $social = Social::where(function ($query) use ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        })->latest()->paginate(6)->onEachSide(1);

        if ($request->ajax()) {
            return view('web.social_list', compact('social'))->render();
        }

        return view('web.social', compact('social'));
    }

    public function social_detail(Request $request)
    {
        $title = "Sosial dan Dakwah";

        $social = $request->get('q');
        $social = Social::where('slug', $social)->first();
        $get_news = News::limit(5)->get();
        $get_social = Social::where('id', '!=', $social->id)->limit(5)->get();

        $ipAddress = $request->ip();
        $viewer = SocialViewer::where('social_id', $social->id)
            ->where('ip_address', $ipAddress)
            ->first();

        if (!$viewer) {
            $social->social_viewer()->create([
                'ip_address' => $ipAddress,
            ]);

            $social->count_view = $social->count_view + 1;
            $social->save();
        }

        return view('web.social_detail', compact('title', 'social', 'get_news','get_social'));
    }

    public function album()
    {
        $title = "Galeri Foto";
        return view('web.album', compact('title'));
    }

    public function album_list(Request $request)
    {
        $title = "Galeri Foto";

        $album = Album::where('work_unit_id',Helpers::get_work_unit()->id)->latest()->paginate(6)->onEachSide(1);

        if ($request->ajax()) {
            return view('web.album_list', compact('album'))->render();
        }

        return view('web.album', compact('title', 'album'));
    }

    public function video()
    {
        $title = "Galeri Video";
        return view('web.video', compact('title'));
    }

    public function video_list(Request $request)
    {
        $title = "Galeri Video";

        $video = Video::where('work_unit_id',Helpers::get_work_unit()->id)->latest()->paginate(6)->onEachSide(1);

        if ($request->ajax()) {
            return view('web.video_list', compact('video'))->render();
        }

        return view('web.video', compact('title', 'video'));
    }

    public function spmb()
    {
        $slider = Slider::where('category', 'SPMB')->get();
        $work_unit = WorkUnit::where('spmb_status','O')->get();
        return view('web.spmb', compact('slider','work_unit'));
    }

    public function spmb_detail($work_unit)
    {
        $work_unit = Crypt::decrypt($work_unit);
        $work_unit = WorkUnit::where('id', $work_unit)->first();
        return view('web.spmb_detail', compact('work_unit'));
    }

}
