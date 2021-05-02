<?php

namespace App\Http\Controllers;

use App\Models\RestaurantBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RestaurantBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners=RestaurantBanner::whereRestaurantId(Auth::user()->restaurant->id)->latest()->paginate(10);
        return view('vendor.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.banner.create');
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
        $banner=new RestaurantBanner;
        $banner->restaurant_id=Auth::user()->restaurant->id;
        $banner->heading=$request->heading;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = Auth::user()->id.date('Ymdhis').time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/restaurant/banner');
            $file->move($destinationPath, $image_name);
            $banner->image = $image_name;

        }
        if ($banner->save()) {
           return back()->with('success','Banner Add Successfully.');
        }else{
            return back()->with('error','Somthing Went Wrong.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RestaurantBanner  $restaurantBanner
     * @return \Illuminate\Http\Response
     */
    public function show(RestaurantBanner $restaurantBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RestaurantBanner  $restaurantBanner
     * @return \Illuminate\Http\Response
     */
    public function edit($banner_id)
    {
        $banner=RestaurantBanner::find(decrypt($banner_id));
        return view('vendor.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RestaurantBanner  $restaurantBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$banner_id)
    {
        $request->validate([
            'heading' => 'required|string|max:120',
        ]);
        $banner=RestaurantBanner::find(decrypt($banner_id));
        $banner->heading=$request->heading;
        if($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,|max:1024',
            ]);
            $file = $request->file('image');
            $image_name = Auth::user()->id.date('Ymdhis').time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/restaurant/banner');
            $file->move($destinationPath, $image_name);
            $banner->image = $image_name;

        }
        if ($banner->update()) {
           return back()->with('success','Banner Update Successfully.');
        }else{
            return back()->with('error','Somthing Went Wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RestaurantBanner  $restaurantBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy($banner_id)
    {
        RestaurantBanner::find(decrypt($banner_id))->delete();
        return back()->with('success','Banner Delete Successfully.');
    }
}
