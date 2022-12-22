<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type=$request->o_type;

        if($request->o_type == 'user')
            $object = User::find($request->o_id);
        if($request->o_type == 'product')
            $object = Product::find($request->o_id);

        return view('Image.create',compact('type','object'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->o_type == 'user')
            $user = User::find($request->o_id);
        if($request->o_type == 'product')
            $product = Product::find($request->o_id);
            $image= new Image();
            $image->o_id=$request->o_id;
            $image->o_type=$request->o_type;
            $image->description=$request->description;
          if (!empty ($request->file('path'))) {
                    $imageName = uniqid() . $request->file('path')->getClientOriginalName();
                    $request->file('path')->move(public_path('images'), $imageName);
                    $image->path = $imageName;
            }
            $image->save();
            return redirect()->route($image->o_type.'s.index')
                        ->with('successaddImage','add image successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
