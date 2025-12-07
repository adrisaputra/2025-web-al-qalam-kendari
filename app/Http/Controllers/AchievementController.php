<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Yajra\DataTables\DataTables;

class AchievementController extends Controller
{
    ## Show Data
    public function index()
    {
        if(request()->segment(1)=='academic'){
            $title = "Prestasi Akademik";
        } else {
            $title = "Prestasi Non Akademik";
        }
        return view('admin.achievement.index', compact('title'));
    }

    ## Get Data
    public function get_achievement_index(Request $request, $url)
    {

        if ($request->ajax()) {
            $counter = 1;

            $query = Achievement::query();

            if($url=='academic'){
                $query = $query->where('category','Academic');
            } else {
                $query = $query->where('category','Non Academic');
            }

            $achievement =$query->where('work_unit_id', Auth::user()->work_unit_id)->limit(10);

            return DataTables::of($achievement)
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
                    $btn = '<a href="#" onClick="getData(' . $v->id . ')" id="' . $v->id . '" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_achievement">
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
            $achievement = new Achievement();
            $achievement->fill($request->all());
            $achievement->slug = Str::slug($request->title);
            
            if($request->category=='academic'){
                $achievement->category = 'Academic';
            } else {
                $achievement->category = 'Non Academic';
            }

            $achievement->work_unit_id = Auth::user()->work_unit_id;
            $achievement->user_id = Auth::user()->id;

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
                Storage::put('upload/achievement/' . $fileName, (string) $encoded);

                // Simpan nama file ke database
                $achievement->cover = $fileName;
            }

            $achievement->save();

            activity()->log('Create Data Achievement');
            return response()->json(['success' => true, 'message' => 'Tambah Data Berhasil']);
        }
    }

    ## Get Data
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $achievement = Achievement::where('id', $id)->first();
            return response()->json(['success' => true, 'data' => $achievement]);
        }
    }

    ## Edit Data
    public function update(Request $request, Achievement $achievement)
    {
        if ($request->ajax()) {
            $achievement->title = $request->title;
            $achievement->text = $request->text;
            $achievement->slug = Str::slug($request->title);

            if ($achievement->cover && $request->file('cover') != "") {
                Storage::delete('upload/achievement/' . $achievement->cover);
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
                Storage::put('upload/achievement/' . $fileName, (string) $encoded);

                // Simpan nama file ke database
                $achievement->cover = $fileName;
            }

            $achievement->save();

            activity()->log('Edit Data Achievement With ID = ' . $achievement->id);
            return response()->json(['success' => true, 'message' => 'Ubah Data Berhasil']);
        }
    }

    ## Delete Data
    public function delete(Request $request, Achievement $achievement)
    {
        if ($request->ajax()) {
            Storage::delete('upload/achievement/' . $achievement->cover);
            $achievement->delete();
            activity()->log('Delete Data Achievement With ID = ' . $achievement->id);
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

            // Simpan ke storage/app/public/achievement_image
            $request->file('upload')->storeAs('achievement_image', $fileName);

            // URL yang dapat diakses publik
            $url = asset('storage/achievement_image/' . $fileName);

            // CKEditor callback
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $msg = 'Image uploaded successfully';

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
