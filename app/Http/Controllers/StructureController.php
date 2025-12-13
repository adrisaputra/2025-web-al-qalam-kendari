<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Yajra\DataTables\DataTables;

class StructureController extends Controller
{
    ## Show Data
    public function index()
    {
        if(request()->segment(1)=='structure1'){
            $title = "Dewan Pembina";
        } else if(request()->segment(1)=='structure2'){
            $title = "Dewan Pengawas";
        } else {
            $title = "Pengurus Yayasan";
        }
        return view('admin.structure.index', compact('title'));
    }

    ## Get Data
    public function get_structure_index(Request $request, $url)
    {

        if ($request->ajax()) {
            $counter = 1;

            $query = Structure::query();

            if($url=='structure1'){
                $query = $query->where('category','Dewan Pembina');
            } else if($url=='structure2'){
                $query = $query->where('category','Dewan Pengawas');
            } else {
                $query = $query->where('category','Pengurus Yayasan');
            }

            $structure =$query->limit(10);

            return DataTables::of($structure)
                ->addIndexColumn()
                ->addColumn('number', function () use (&$counter) {
                    return $counter++;
                })
                ->addColumn('name', function ($v) {
                    return $v->name;
                })
                ->addColumn('position', function ($v) {
                    return $v->position;
                })
                ->addColumn('action', function ($v) {
                    $btn = '<a href="#" onClick="getData(' . $v->id . ')" id="' . $v->id . '" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_structure">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </a>';
                    $btn .= '<a href="#" onclick="deleteData(' . $v->id . ')" id="' . $v->id . '" class="warning confirm" data-toggle="tooltip" data-placement="top" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </a>';
                    return $btn;
                })
                ->rawColumns(['photo', 'action'])->make(true);
        }
    }

    public function validate(Request $request, $action)
    {
        if ($request->ajax()) {

            $attributes = [
                'name' => 'Nama',
                'position' => 'Jabatan',
                'desc'  => 'Deskripsi',
                'photo' => 'Foto',
            ];

            if ($action === "Simpan") {
                $rules = [
                    'name' => 'required|string',
                    'position' => 'required|string',
                    'desc' => 'nullable|string',
                    'photo' => 'image|mimes:jpeg,png,jpg|max:5000'
                ];
            } else {
                $rules = [
                    'name' => 'required|string',
                    'position' => 'required|string',
                    'desc' => 'nullable|string',
                    'photo' => 'image|mimes:jpeg,png,jpg|max:5000'
                ];
            }

            $request->validate($rules, [], $attributes);

            return response()->json(['success' => true]);
        }
    }

    ## Save Data
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $structure = new Structure();
            $structure->fill($request->all());

            if($structure->category=='structure1'){
                $structure->category = 'Dewan Pembina';
            } else if($structure->category=='structure2'){
                $structure->category = 'Dewan Pengawas';
            } else {
                $structure->category = 'Pengurus Yayasan';
            }

            ## Ubah width dan Height
            ## Ubah width dan Height
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $file->getClientOriginalExtension();

                // Tentukan ukuran
                $width = 1000;
                $height = 1000;

                // Baca file langsung dari upload (tanpa pindah ke temp folder)
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file->getRealPath())
                    ->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                // Encode gambar ke format tertentu (setara dengan ->encode('png', 75))
                // $encoded = $image->encodeByExtension('png', quality: 75);
                $encoded = $image->encodeByExtension($extension); // TANPA quality

                // Simpan ke storage
                Storage::put('upload/structure/' . $fileName, (string) $encoded);

                // Simpan nama file ke database
                $structure->photo = $fileName;
            }

            $structure->save();

            activity()->log('Create Data Structure');
            return response()->json(['success' => true, 'message' => 'Tambah Data Berhasil']);
        }
    }

    ## Get Data
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $structure = Structure::where('id', $id)->first();
            return response()->json(['success' => true, 'data' => $structure]);
        }
    }

    ## Edit Data
    public function update(Request $request, Structure $structure)
    {
        if ($request->ajax()) {
            
            if($request->category=='structure1'){
                $structure->category = 'Dewan Pembina';
            } else if($request->category=='structure2'){
                $structure->category = 'Dewan Pengawas';
            } else {
                $structure->category = 'Pengurus Yayasan';
            }

            $structure->name = $request->name;
            $structure->position = $request->position;
            $structure->desc = $request->desc;

            if ($structure->photo && $request->file('photo') != "") {
                Storage::delete('upload/structure/' . $structure->photo);
            }

            ## Ubah width dan Height
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $file->getClientOriginalExtension();

                // Tentukan ukuran
                $width = 1000;
                $height = 1000;

                // Baca file langsung dari upload (tanpa pindah ke temp folder)
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file->getRealPath())
                    ->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                // Encode gambar ke format tertentu (setara dengan ->encode('png', 75))
                // $encoded = $image->encodeByExtension('png', quality: 75);
                $encoded = $image->encodeByExtension($extension); // TANPA quality

                // Simpan ke storage
                Storage::put('upload/structure/' . $fileName, (string) $encoded);

                // Simpan nama file ke database
                $structure->photo = $fileName;
            }

            $structure->save();

            activity()->log('Edit Data Structure With ID = ' . $structure->id);
            return response()->json(['success' => true, 'message' => 'Ubah Data Berhasil']);
        }
    }

    ## Delete Data
    public function delete(Request $request, Structure $structure)
    {
        if ($request->ajax()) {
            Storage::delete('upload/structure/' . $structure->photo);
            $structure->delete();
            activity()->log('Delete Data Structure With ID = ' . $structure->id);
            return response()->json(['success' => true, 'message' => 'Hapus Data Berhasil']);
        }
    }

    public function upload_image(Request $request)
    {
        if ($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            // Simpan ke storage/app/public/structure_image
            $request->file('upload')->storeAs('structure_image', $fileName);

            // URL yang dapat diakses publik
            $url = asset('storage/structure_image/' . $fileName);

            // CKEditor callback
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $msg = 'Image uploaded successfully';

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
