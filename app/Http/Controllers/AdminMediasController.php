<?php

namespace App\Http\Controllers;

use App\Photo;

use App\Http\Requests;
use Illuminate\Http\Request;

class AdminMediasController extends Controller
{
    public function index(){

        $photos = Photo::all();
        return view('admin.medias.index', compact('photos'));

    }


    public function create()
    {
        return view('admin.medias.create');
        

    }

    public function store(Request $request){
        
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images',$name);
        Photo::create(['path'=>$name]);

        return redirect('/admin/medias/index');

    }

    public function destroy($id)
    {
        $photo = Photo::findorFail($id);
        unlink(public_path().$photo->path);
        $photo->delete();
        return redirect('/admin/medias/index');
            


    }
    public function show($id)
    {
        return view('admin.medias.create');


    }
}
