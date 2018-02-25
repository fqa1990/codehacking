<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMediaController extends Controller
{
    //
    
    public function index() {
        
        $photos = Photo::all();
        
        return view('admin.media.index', compact('photos')); 
        
    }
    
    public function create() {
        
        return view('admin.media.create');
    }
    
    public function store(Request $request) {
        
        $file = $request->file('file');
        
        $name = time() . $file->getClientOriginalName();
        
        $file->move('images', $name);
        
        Photo::create(['file'=>$name]);
        
        return view('admin.media.index');
    }
    
    public function show() {
        
        // return 
        
    }
    
    public function destroy($id) {
        
        $photo = Photo::findOrFail($id);
        
        unlink(public_path() . $photo->file);
        
        $photo->delete();
        
        Session::flash('media_deleted', 'The photo has been deleted');
        
    }
    
    public function deleteMedia(Request $request) {
        
        if(isset($request->delete_single)){
            
            $this->destroy($request->photo);
            
            return redirect()->back();
            
        }
        
        if(isset($request->delete_all) && !empty($request->checkBoxArray)){
            
            $photos = Photo::findOrFail($request->checkBoxArray);
            
            foreach ($photos as $photo) {
                
                $photo->delete();
                
            }
            Session::flash('media_deleted', 'The photo has been deleted');
            return redirect()->back();
            
        } else {
            
            return redirect()->back();
            
        }
     
                //dd($request);
        
    }
    
    
    
    
    
    
    
    
    
    
    
}
