<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Yajra\DataTables\Facades\DataTables;

class PhotoController extends Controller
{
    ## Show Data
    public function index($album)
    {
        $title = "Foto";
        $album = Crypt::decrypt($album);
        $album = Album::where('id',$album)->first();
		return view('admin.photo.index',compact('title','album'));
    }

    ## Get Data
    public function get_photo_index(Request $request, $album)
    {

        if ($request->ajax()) {
            $counter = 1;

            $album = Crypt::decrypt($album);
            $album = Album::where('id',$album)->first();

            $photo = Photo::where('album_id',$album->id)->limit(10);

            return DataTables::of($photo)
            ->addIndexColumn()
            ->addColumn('number', function () use (&$counter) {
                return $counter++;
            })
            ->addColumn('image', function ($v){
                $url_image = asset('storage/upload/photo/'.$v->image);
                $image = '<img src='.$url_image.' width="150px" height="100%">';
                return $image;
            })
            ->addColumn('action', function ($v) {
                $btn = '<a href="#" onClick="getData('.$v->id.')" id="'.$v->id.'" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_photo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </a>';
                $btn .= '<a href="#" onclick="deleteData('.$v->id.')" id="'.$v->id.'" class="warning confirm" data-toggle="tooltip" data-placement="top" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </a>';
                return $btn;
            })
            ->rawColumns(['image','action'])->make(true);
        }
        
    }

    public function validate(Request $request, $action)
    {
        if ($request->ajax()) {

            if($action==="Simpan"){
                $request->validate([
                    'image' => 'required|image|mimes:jpg,png,jpeg|max:1000'
                ]);
            } else {
                $request->validate([
                    'image' => 'required|image|mimes:jpg,png,jpeg|max:1000'
                ]);
            }
    
            return response()->json(['success' => true]);
        }
    }

    ## Save Data
	public function store(Request $request)
    {
        if ($request->ajax()) {
            $photo = New Photo();
            $photo->fill($request->all());

            if($request->image){
                // Get the original file extension
                $fileExtension = $request->image->getClientOriginalExtension();
                $fileName = time() . '.' . $fileExtension;
            
                // Move the uploaded file to a temporary directory
                $tempPath = $request->file('image')->storeAs('upload/photo/temp', $fileName);
            
                // Define the desired dimensions
                $width = 1600;
                $height = 1068;
            
                $manager = new ImageManager(new Driver());
                
                // Load the image from the temporary path
                $imagePath = storage_path('app/public/' . $tempPath);
                $image = $manager->read($imagePath);
            
                // Resize the image
                $image->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            
                // Define the final storage path
                $finalPath = 'upload/photo/' . $fileName;
            
                // Save the resized image to the final directory
                $image->save(storage_path('app/public/' . $finalPath), 75);
            
                // Store the file name in the database
                $photo->image = $fileName;
            
                // Remove the original temporary file
                unlink($imagePath);
            }

            $photo->save();
            
            activity()->log('Create Data Photo');
            return response()->json(['success' => true,'message' => 'Tambah Data Berhasil']);
        }
    }

    ## Get Data
    public function edit(Request $request,$id)
    {
        if ($request->ajax()) {
            $photo = Photo::where('id',$id)->first();
            return response()->json(['success' => true,'data' => $photo]);
        }
    }

    ## Edit Data
    public function update(Request $request, Photo $photo)
    {
        if ($request->ajax()) {
            
            if ($photo->image && $request->file('image') != "") {
                Storage::delete('upload/photo/'.$photo->image);
            }

            if($request->image){
                // Get the original file extension
                $fileExtension = $request->image->getClientOriginalExtension();
                $fileName = time() . '.' . $fileExtension;
            
                // Move the uploaded file to a temporary directory
                $tempPath = $request->file('image')->storeAs('upload/photo/temp', $fileName);
            
                // Define the desired dimensions
                $width = 1600;
                $height = 1068;
            
                $manager = new ImageManager(new Driver());
                
                // Load the image from the temporary path
                $imagePath = storage_path('app/public/' . $tempPath);
                $image = $manager->read($imagePath);
            
                // Resize the image
                $image->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            
                // Define the final storage path
                $finalPath = 'upload/photo/' . $fileName;
            
                // Save the resized image to the final directory
                $image->save(storage_path('app/public/' . $finalPath), 75);
            
                // Store the file name in the database
                $photo->image = $fileName;
            
                // Remove the original temporary file
                unlink($imagePath);
            }
		
            $photo->save();
    
            activity()->log('Edit Data Photo With ID = '.$photo->id);
            return response()->json(['success' => true,'message' => 'Ubah Data Berhasil']);
        }
    }

    ## Delete Data
    public function delete(Request $request, $photo)
    {
        if ($request->ajax()) {
            $photo = Photo::where('id',$photo)->first();

            Storage::delete('upload/photo/'.$photo->image);
       
            $photo->delete();
            activity()->log('Delete Data Photo With ID = '.$photo->id);
            return response()->json(['success' => true,'message' => 'Hapus Data Berhasil']);
        }
    }

}
