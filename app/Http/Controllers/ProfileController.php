<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    ## Show Data
    public function index(Request $request)
    {
        $profile = Profile::where('menu',  $request->segment(1))->first();
        $title =  $profile->title;
        return view('admin.profile.index', compact('title', 'profile'));
    }

    public function validation(Request $request)
    {
        if ($request->ajax()) {

            $attributes = [
                'text' => 'Teks',
                'image' => 'Gambar'
            ];

            $rules = [
                'text' => 'required',
                'image' => 'max:2000|mimes:png,jpg,jpeg',
            ];

            $request->validate($rules, [],$attributes);
    
            return response()->json(['success' => true]);
        }
    }

    
    ## Edit Data
    public function update(Request $request, Profile $profile)
    {
        if ($request->ajax()) {
            $profile->text = $request->text;
            $profile->url = $request->url;
            
            if ($profile->image && $request->file('image') != "") {
                Storage::delete('upload/profile/'.$profile->image);
            }
    
            if($request->file('image')){	
                $profile->image = time().'.'.$request->image->getClientOriginalExtension();
                Storage::putFileAs('upload/profile',$request->file('image'), $profile->image);
            }

            $profile->save();
    
            activity()->log('Edit Data Profile With ID = '.$profile->id);
            return response()->json(['success' => true,'message' => 'Ubah Data Berhasil']);
        }
    }


}
