<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class FacilityController extends Controller
{
    ## Show Data
    public function index()
    {
        $title = "Fasilitas";
		return view('admin.facility.index',compact('title'));
    }

    ## Get Data
    public function get_facility_index(Request $request)
    {

        if ($request->ajax()) {
            $counter = 1;

            $facility = Facility::limit(10);

            return DataTables::of($facility)
            ->addIndexColumn()
            ->addColumn('number', function () use (&$counter) {
                return $counter++;
            })
            ->addColumn('display_name', function ($v){
                return $v->name;
            })
            ->addColumn('display_image', function ($v){
                $url_image = asset('storage/upload/facility/'.$v->image);
                $image = '<a href='.$url_image.' target="_blank">'.$v->image.'</a>';
                return $image;
            })
            ->addColumn('action', function ($v) {
                $btn = '<a href="#" onClick="getData('.$v->id.')" id="'.$v->id.'" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_facility">
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
                'name'  => 'Nama Fasilitas Desa',
                'image'  => 'Gambar'
            ];

            if($action==="Simpan"){
                $rules = [
                    'name' => 'required|string|max:255',
                    'image' => 'required|mimes:jpg,png,jpeg|max:2048'
                ];
            } else {
                $rules = [
                    'name' => 'required|string|max:255',
                    'image' => 'mimes:jpg,png,jpeg|max:2048'
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
            $facility = New Facility();
            $facility->fill($request->all());

            if($request->image){
                $facility->image = time().'.'.$request->image->getClientOriginalExtension();
                Storage::putFileAs('upload/facility',$request->file('image'), $facility->image);
            }

            $facility->save();
            
            activity()->log('Create Data Facility');
            return response()->json(['success' => true,'message' => 'Tambah Data Berhasil']);
        }
    }

    ## Get Data
    public function edit(Request $request,$id)
    {
        if ($request->ajax()) {
            $facility = Facility::where('id',$id)->first();
            return response()->json(['success' => true,'data' => $facility]);
        }
    }

    ## Edit Data
    public function update(Request $request, Facility $facility)
    {
        if ($request->ajax()) {
            
            $facility->name = $request->name;

            if ($facility->image && $request->file('image') != "") {
                Storage::delete('upload/facility/'.$facility->image);
            }
    
            if($request->file('image')){	
                $facility->image = time().'.'.$request->image->getClientOriginalExtension();
                Storage::putFileAs('upload/facility',$request->file('image'), $facility->image);
            }
		
            $facility->save();
    
            activity()->log('Edit Data Facility With ID = '.$facility->id);
            return response()->json(['success' => true,'message' => 'Ubah Data Berhasil']);
        }
    }

    ## Delete Data
    public function delete(Request $request, Facility $facility)
    {
        if ($request->ajax()) {
            Storage::delete('upload/facility/'.$facility->image);
            $facility->delete();
            activity()->log('Delete Data Facility With ID = '.$facility->id);
            return response()->json(['success' => true,'message' => 'Hapus Data Berhasil']);
        }
    }

}
