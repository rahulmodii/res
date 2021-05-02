<?php

namespace App\Http\Controllers;

use App\Models\RestaurantGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RestaurantGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries=RestaurantGallery::whereRestaurantId(Auth::user()->restaurant->id)->latest()->paginate(10);
        return view('vendor.gallery.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:120',
            'image' => 'required|mimes:jpeg,png,jpg,|max:1024',
        ]);
        $gallery=new RestaurantGallery;
        $gallery->restaurant_id=Auth::user()->restaurant->id;
        $gallery->heading=$request->heading;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = Auth::user()->id.date('Ymdhis').time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/restaurant/gallery');
            $file->move($destinationPath, $image_name);
            $gallery->image = $image_name;

        }
        if ($gallery->save()) {
           return back()->with('success','Gallery Add Successfully.');
        }else{
            return back()->with('error','Somthing Went Wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RestaurantGallery  $restaurantGallery
     * @return \Illuminate\Http\Response
     */
    public function show(RestaurantGallery $restaurantGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RestaurantGallery  $restaurantGallery
     * @return \Illuminate\Http\Response
     */
    public function edit($gallery_id)
    {
        $gallery=RestaurantGallery::find(decrypt($gallery_id));
        return view('vendor.gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RestaurantGallery  $restaurantGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$gallery_id)
    {
        $request->validate([
            'heading' => 'required|string|max:120',
        ]);
        $gallery=RestaurantGallery::find(decrypt($gallery_id));
        $gallery->heading=$request->heading;
        if($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,|max:1024',
            ]);
            $file = $request->file('image');
            $image_name = Auth::user()->id.date('Ymdhis').time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/restaurant/gallery');
            $file->move($destinationPath, $image_name);
            $gallery->image = $image_name;

        }
        if ($gallery->update()) {
           return back()->with('success','Gallery Update Successfully.');
        }else{
            return back()->with('error','Somthing Went Wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RestaurantGallery  $restaurantGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($gallery_id)
    {
        RestaurantGallery::find(decrypt($gallery_id))->delete();
        return back()->with('success','Gallery Delete Successfully.');
    }
}
