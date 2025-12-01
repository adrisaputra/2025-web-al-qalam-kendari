<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\WorkUnit;
use Illuminate\Http\Request;

class WebController extends Controller
{
    
    public function index()
    {
        return view('web.home');
    }

    public function spmb()
    {
        $slider = Slider::get();
        $work_unit = WorkUnit::where('spmb_status','Y')->get();
        return view('web.spmb', compact('slider','work_unit'));
    }

    public function spmb_detail()
    {
        $slider = Slider::get();
        $work_unit = WorkUnit::where('spmb_status','Y')->get();
        return view('web.spmb_detail', compact('slider','work_unit'));
    }

}
