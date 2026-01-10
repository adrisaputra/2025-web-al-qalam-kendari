<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\News;
use App\Models\User;

class HomeController extends Controller
{
    ## Show Data
    public function index()
    {
        $title = "Dashboard";
        $news = News::where('work_unit_id', Helpers::get_work_unit()->id)->count();
        $user = User::count();
		return view('admin.home',compact('title','user','news'));
    }
}
