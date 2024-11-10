<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Http\Requests\ImageRequest;

class ImageController extends Controller
{
    //
    public function index(){
        $images= Image::all();
        return view("upload", compact('images'));
    }

    public function upload(ImageRequest $request){
        $input = $request->all();
        $file = $request->file('image');

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($file){
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['filepath'] = $name;
        }
        Image::create(["filepath"=>$name]);
        return redirect("/");
    }
}
