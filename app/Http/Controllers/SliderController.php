<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    ## Show Data
    public function index()
    {
        $title = "Slider";
		return view('admin.slider.index',compact('title'));
    }

    ## Get Data
    public function get_slider_index(Request $request)
    {

        if ($request->ajax()) {
            $counter = 1;

            $slider = Slider::limit(10);

            return DataTables::of($slider)
            ->addIndexColumn()
            ->addColumn('number', function () use (&$counter) {
                return $counter++;
            })
            ->addColumn('display_image', function ($v){
                $url_image = asset('storage/upload/slider/'.$v->image);
                $image = '<a href='.$url_image.' target="_blank">'.$v->image.'</a>';
                return $image;
            })
            ->addColumn('action', function ($v) {
                $btn = '<a href="#" onClick="getData('.$v->id.')" id="'.$v->id.'" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_slider">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </a>';
                $btn .= '<a href="#" onclick="deleteData('.$v->id.')" id="'.$v->id.'" class="warning confirm" data-toggle="tooltip" data-placement="top" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </a>';
                return $btn;
            })
            ->rawColumns(['display_image','action'])->make(true);
        }
        
    }

    public function validate(Request $request, $action)
    {

        if ($request->ajax()) {

            $attributes = [
                'image'  => 'Gambar'
            ];

            if($action==="Simpan"){
                $rules = [
                    'image' => 'required|image|mimes:jpg,png,jpeg|max:2000'
                ];
            } else {
                $rules = [
                    'image' => 'image|mimes:jpg,png,jpeg|max:2000'
                ];
            }
            
            $request->validate($rules, [],$attributes);
            
            return response()->json(['success' => true]);
        }
    }

    ## Save Data
	public function store(Request $request)
    {
        if ($request->ajax()) {
            $slider = New Slider();
            $slider->fill($request->all());

            if($request->image){
                $slider->image = time().'.'.$request->image->getClientOriginalExtension();
                Storage::putFileAs('upload/slider',$request->file('image'), $slider->image);
            }

            $slider->save();
            
            activity()->log('Create Data Slider');
            return response()->json(['success' => true,'message' => 'Tambah Data Berhasil']);
        }
    }

    ## Get Data
    public function edit(Request $request,$id)
    {
        if ($request->ajax()) {
            $slider = Slider::where('id',$id)->first();
            return response()->json(['success' => true,'data' => $slider]);
        }
    }

    ## Edit Data
    public function update(Request $request, Slider $slider)
    {
        if ($request->ajax()) {
            if ($slider->image && $request->file('image') != "") {
                Storage::delete('upload/slider/'.$slider->image);
            }
    
            if($request->file('image')){	
                $slider->image = time().'.'.$request->image->getClientOriginalExtension();
                Storage::putFileAs('upload/slider',$request->file('image'), $slider->image);
            }
		
            $slider->save();
    
            activity()->log('Edit Data Slider With ID = '.$slider->id);
            return response()->json(['success' => true,'message' => 'Ubah Data Berhasil']);
        }
    }

    ## Delete Data
    public function delete(Request $request, Slider $slider)
    {
        if ($request->ajax()) {
            Storage::delete('upload/slider/'.$slider->image);
            $slider->delete();
            activity()->log('Delete Data Slider With ID = '.$slider->id);
            return response()->json(['success' => true,'message' => 'Hapus Data Berhasil']);
        }
    }

}
