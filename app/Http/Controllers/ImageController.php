<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
        public function index()
        {
             $image = Image::all();
        //    return view('logo.image',compact('image'));
            return view('logo.index',compact('image'));
        }
    
      public function create()
    {
          return view('logo.create');
    }

    public function store(Request $request)
    {
       //  dd("1123");
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // $image_path = $request->file('image')->store('image', 'public');

        // $data = Image::create([
        //     'image' => $image_path,
        // ]);

        $input = $request->all();
       // dd($input);
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
  
        Image::create($input);

        session()->flash('success', 'Image Upload successfully');

        return redirect()->route('logo.index');
    }
    public function edit(Image $image)
    {
       // dd($setting);
        return view('logo.edit',compact('image'));
    }
    public function update(Request $request, Image $image)
    {
       // dd($image);
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]); 

        $image_path = $request->file('image')->store('image', 'public');

        $image->update([
            'image' => $image_path,
        ]);

        session()->flash('success', 'Image Upload successfully');

        return redirect()->route('image.index');

      


    
     }

}

