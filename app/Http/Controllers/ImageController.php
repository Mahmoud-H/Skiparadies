<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{

        public function index()
        {
             $image = Image::all();
           // dd($image);
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
    public function edit($image)
    {
         $image = Image::findOrFail($image);
       //  dd($image);
        return view('logo.edit',compact('image'));
    }
    public function update(Request $request,  $image)
    {
       // dd($image);
        $image = Image::findOrFail($image);
       //  dd($request->all());
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]); 
        $input = $request->all();

        if ($imagee = $request->file('image')) {
           // dd("1111");
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $imagee->getClientOriginalExtension();
            $imagee->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
      //  dd($input);
        $image->update($input);
       // dd($image);
 
        session()->flash('success', 'Image Upload successfully');

        return redirect()->route('logo.index');

      }

      public function destroy(  $image)
      {
        $image = Image::findOrFail($image);
          $image->delete();
    
          return redirect()->route('logo.index')
                          ->with('success','Image deleted successfully');
      }
    

    public function show($image)
    {
        $image = Image::findOrFail($image);
        return view('logo.show',compact('image'));
    }

}

