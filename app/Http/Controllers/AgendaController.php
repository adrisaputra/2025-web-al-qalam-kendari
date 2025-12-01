<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class AgendaController extends Controller
{
    ## Show Data
    public function index()
    {
        $title = "Agenda";
		return view('admin.agenda.index',compact('title'));
    }

    ## Get Data
    public function get_agenda_index(Request $request)
    {

        if ($request->ajax()) {
            $counter = 1;

            $agenda = Agenda::limit(10);

            return DataTables::of($agenda)
            ->addIndexColumn()
            ->addColumn('number', function () use (&$counter) {
                return $counter++;
            })
            ->addColumn('display_date', function ($v){
                return Helpers::date_indo_full($v->date);
            })
            ->addColumn('display_time', function ($v){
                return date('H:i', strtotime($v->time));
            })
            ->addColumn('display_desc', function ($v){
                return $v->desc;
            })
            ->addColumn('display_place', function ($v){
                return $v->place;
            })
            ->addColumn('display_responsible_person', function ($v){
                return $v->responsible_person;
            })
            ->addColumn('action', function ($v) {
                $btn = '<a href="#" onClick="getData('.$v->id.')" id="'.$v->id.'" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_agenda">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </a>';
                $btn .= '<a href="#" onclick="deleteData('.$v->id.')" id="'.$v->id.'" class="warning confirm" data-toggle="tooltip" data-placement="top" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </a>';
                return $btn;
            })
            ->rawColumns(['action'])->make(true);
        }
        
    }

    public function validate(Request $request, $action)
    {
        if ($request->ajax()) {

            $attributes = [
                'date' => 'Tanggal Kegiatan',
                'time' => 'Jam',
                'desc' => 'Agenda Kegiatan',
                'place' => 'Tempat Kegiatan',
                'responsible_person' => 'Penanggung Jawab',
            ];

            if($action==="Simpan"){
                $rules = [
                    'date' => 'required|string',
                    'time' => 'required|string',
                    'desc' => 'required|string',
                    'place' => 'required|string',
                    'responsible_person' => 'required|string',
                ];
            } else {
                $rules = [
                    'date' => 'required|string',
                    'time' => 'required|string',
                    'desc' => 'required|string',
                    'place' => 'required|string',
                    'responsible_person' => 'required|string',
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
            $agenda = New Agenda();
            $agenda->fill($request->all());
            $agenda->user_id = Auth::user()->id;
            $agenda->save();
            
            activity()->log('Create Data Agenda');
            return response()->json(['success' => true,'message' => 'Tambah Data Berhasil']);
        }
    }

    ## Get Data
    public function edit(Request $request,$id)
    {
        if ($request->ajax()) {
            $agenda = Agenda::where('id',$id)->first();
            return response()->json(['success' => true,'data' => $agenda]);
        }
    }

    ## Edit Data
    public function update(Request $request, Agenda $agenda)
    {
        if ($request->ajax()) {
            
            $agenda->date = $request->date;
            $agenda->time = $request->time;
            $agenda->desc = $request->desc;
            $agenda->place = $request->place;
            $agenda->responsible_person = $request->responsible_person;
            $agenda->save();
    
            activity()->log('Edit Data Agenda With ID = '.$agenda->id);
            return response()->json(['success' => true,'message' => 'Ubah Data Berhasil']);
        }
    }

    ## Delete Data
    public function delete(Request $request, Agenda $agenda)
    {
        if ($request->ajax()) {
            $agenda->delete();
            activity()->log('Delete Data Agenda With ID = '.$agenda->id);
            return response()->json(['success' => true,'message' => 'Hapus Data Berhasil']);
        }
    }

}
