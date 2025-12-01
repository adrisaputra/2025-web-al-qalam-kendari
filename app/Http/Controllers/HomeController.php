<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;

class HomeController extends Controller
{
    ## Show Data
    public function index()
    {
        $title = "Dashboard";
        $news = News::count();
        $user = User::count();
		return view('admin.home',compact('title','user','news'));
    }
}
