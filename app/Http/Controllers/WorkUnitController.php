<?php

namespace App\Http\Controllers;

use App\Models\WorkUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class WorkUnitController extends Controller
{
    ## Show Data
    public function index()
    {
        $title = "Unit Kerja";
        return view('admin.work_unit.index',compact('title'));
    }

    ## Get Data
    public function get_work_unit_index(Request $request)
    {

        if ($request->ajax()) {
            $counter = 1;

            $work_unit = WorkUnit::limit(10);

            return DataTables::of($work_unit)
            ->addIndexColumn()
            ->addColumn('number', function () use (&$counter) {
                return $counter++;
            })
            ->addColumn('display_name', function ($v) {
                return $v->name;
            })
            ->addColumn('display_spmb_url', function ($v) {
                return $v->spmb_url;
            })
            ->addColumn('display_image', function ($v){
                $url_image = asset('storage/upload/work_unit/'.$v->image);
                $image = '<a href='.$url_image.' target="_blank">'.$v->image.'</a>';
                return $image;
            })
            ->addColumn('action', function ($v) {
                $btn = '<a href="#" onClick="getData('.$v->id.')" id="'.$v->id.'" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_work_unit">
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
                'name' => 'Nama Unit Kerja',
                'spmb_url' => 'URL Pendaftaran SPMB',
                'image' => 'Gambar',
            ];

            if($action==="Simpan"){
                $rules = [
                    'name' => 'required|string|max:255',
                    'spmb_url' => 'nullable|string|max:255',
                    'image' => 'image|mimes:jpg,png,jpeg|max:2000'
                ];
            } else {
                $rules = [
                    'name' => 'required|string|max:255',
                    'spmb_url' => 'nullable|string|max:255',
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
            $work_unit = New WorkUnit();
            $work_unit->fill($request->all());

            if($request->spmb_status == 'Y'){
                $work_unit->spmb_url = $request->spmb_url;
            } else {
                $work_unit->spmb_url = null;
            }
            
            if($request->image){
                $work_unit->image = time().'.'.$request->image->getClientOriginalExtension();
                Storage::putFileAs('upload/work_unit',$request->file('image'), $work_unit->image);
            }

            $work_unit->save();
            
            activity()->log('Create Data Work Unit');
            return response()->json(['success' => true,'message' => 'Tambah Data Berhasil']);
        }
    }

    ## Get Data
    public function edit(Request $request,$id)
    {
        if ($request->ajax()) {
            $work_unit = WorkUnit::where('id',$id)->first();
            return response()->json(['success' => true,'data' => $work_unit]);
        }
    }

    ## Edit Data
    public function update(Request $request, WorkUnit $work_unit)
    {
        if ($request->ajax()) {
            $work_unit->name = $request->name;
            $work_unit->spmb_status = $request->spmb_status;

            if($request->spmb_status == 'Y'){
                $work_unit->spmb_url = $request->spmb_url;
            } else {
                $work_unit->spmb_url = null;
            }
            
            if ($work_unit->image && $request->file('image') != "") {
                Storage::delete('upload/work_unit/'.$work_unit->image);
            }
    
            if($request->file('image')){	
                $work_unit->image = time().'.'.$request->image->getClientOriginalExtension();
                Storage::putFileAs('upload/work_unit',$request->file('image'), $work_unit->image);
            }
		
            $work_unit->save();
    
            activity()->log('Edit Data Work Unit With ID = '.$work_unit->id);
            return response()->json(['success' => true,'message' => 'Ubah Data Berhasil']);
        }
    }

    ## Delete Data
    public function delete(Request $request, WorkUnit $work_unit)
    {
        if ($request->ajax()) {
            Storage::delete('upload/work_unit/'.$work_unit->image);
            $work_unit->delete();
            activity()->log('Delete Data Work Unit With ID = '.$work_unit->id);
            return response()->json(['success' => true,'message' => 'Hapus Data Berhasil']);
        }
    }

}
