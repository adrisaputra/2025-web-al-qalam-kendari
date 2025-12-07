<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Yajra\DataTables\DataTables;

class ProgramController extends Controller
{
    ## Show Data
    public function index()
    {
        if(request()->segment(1)=='featured_program'){
            $title = "Program Unggulan";
        } else {
            $title = "Ekstrakulikuler";
        }
        return view('admin.program.index', compact('title'));
    }

    ## Get Data
    public function get_program_index(Request $request, $url)
    {

        if ($request->ajax()) {
            $counter = 1;

            $query = Program::query();

            if($url=='featured_program'){
                $query = $query->where('category','Featured Program');
            } else {
                $query = $query->where('category','Extracurricular');
            }

            $program = $query->where('work_unit_id', Auth::user()->work_unit_id)->limit(10);

            return DataTables::of($program)
                ->addIndexColumn()
                ->addColumn('number', function () use (&$counter) {
                    return $counter++;
                })
                ->addColumn('created_at', function ($v) {
                    return Helpers::month_indo_full($v->created_at);
                })
                ->addColumn('user', function ($v) {
                    return $v->user ? $v->user->name : '';
                })
                ->addColumn('action', function ($v) {
                    $btn = '<a href="#" onClick="getData(' . $v->id . ')" id="' . $v->id . '" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_program">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </a>';
                    $btn .= '<a href="#" onclick="deleteData(' . $v->id . ')" id="' . $v->id . '" class="warning confirm" data-toggle="tooltip" data-placement="top" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </a>';
                    return $btn;
                })
                ->rawColumns(['cover', 'action'])->make(true);
        }
    }

    public function validate(Request $request, $action)
    {
        if ($request->ajax()) {

            $attributes = [
                'title' => 'Judul',
                'text'  => 'Isi',
                'cover' => 'Cover',
            ];

            if ($action === "Simpan") {
                $rules = [
                    'title' => 'required',
                    'text' => 'required',
                    'cover' => 'required|image|mimes:jpeg,png,jpg|max:5000'
                ];
            } else {
                $rules = [
                    'title' => 'required',
                    'text' => 'required',
                    'cover' => 'image|mimes:jpeg,png,jpg|max:5000'
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
            $program = new Program();
            $program->fill($request->all());
            $program->slug = Str::slug($request->title);
            
            if($request->category=='featured_program'){
                $program->category = 'Featured Program';
            } else {
                $program->category = 'Extracurricular';
            }

            $program->work_unit_id = Auth::user()->work_unit_id;
            $program->user_id = Auth::user()->id;

            ## Ubah width dan Height
            if ($request->hasFile('cover')) {
                $file = $request->file('cover');
                $fileName = time() . '.' . $file->getClientOriginalExtension();

                // Tentukan ukuran
                $width = 1600;
                $height = 1068;

                // Baca file langsung dari upload (tanpa pindah ke temp folder)
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file->getRealPath())
                    ->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                // Encode gambar ke format tertentu (setara dengan ->encode('png', 75))
                $encoded = $image->encodeByExtension('png', quality: 75);

                // Simpan ke storage
                Storage::put('upload/program/' . $fileName, (string) $encoded);

                // Simpan nama file ke database
                $program->cover = $fileName;
            }

            $program->save();

            activity()->log('Create Data Program');
            return response()->json(['success' => true, 'message' => 'Tambah Data Berhasil']);
        }
    }

    ## Get Data
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $program = Program::where('id', $id)->first();
            return response()->json(['success' => true, 'data' => $program]);
        }
    }

    ## Edit Data
    public function update(Request $request, Program $program)
    {
        if ($request->ajax()) {
            $program->title = $request->title;
            $program->text = $request->text;
            $program->slug = Str::slug($request->title);

            if ($program->cover && $request->file('cover') != "") {
                Storage::delete('upload/program/' . $program->cover);
            }

            ## Ubah width dan Height
            if ($request->hasFile('cover')) {
                $file = $request->file('cover');
                $fileName = time() . '.' . $file->getClientOriginalExtension();

                // Tentukan ukuran
                $width = 1600;
                $height = 1068;

                // Baca file langsung dari upload (tanpa pindah ke temp folder)
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file->getRealPath())
                    ->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                // Encode gambar ke format tertentu (setara dengan ->encode('png', 75))
                $encoded = $image->encodeByExtension('png', quality: 75);

                // Simpan ke storage
                Storage::put('upload/program/' . $fileName, (string) $encoded);

                // Simpan nama file ke database
                $program->cover = $fileName;
            }

            $program->save();

            activity()->log('Edit Data Program With ID = ' . $program->id);
            return response()->json(['success' => true, 'message' => 'Ubah Data Berhasil']);
        }
    }

    ## Delete Data
    public function delete(Request $request, Program $program)
    {
        if ($request->ajax()) {
            Storage::delete('upload/program/' . $program->cover);
            $program->delete();
            activity()->log('Delete Data Program With ID = ' . $program->id);
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

            // Simpan ke storage/app/public/program_image
            $request->file('upload')->storeAs('program_image', $fileName);

            // URL yang dapat diakses publik
            $url = asset('storage/program_image/' . $fileName);

            // CKEditor callback
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $msg = 'Image uploaded successfully';

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
