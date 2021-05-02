<?php

namespace App\Http\Controllers;

use App\Mail\RestaurentBooking;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Str;
use App\Models\Category;
use App\Models\RestaurantBanner;
use App\Models\RestaurantGallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $restaurants=Restaurant::latest()->paginate(10);
        } else {
            $restaurants=Restaurant::latest()->paginate(10);
        }

        return view('admin.restaurant.index',compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurant.create');
    }


    public function registeration()
    {
        return view('frontend.restaurant_registration');
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
            'name' => 'required|string|max:120',
            'mobile' => 'required|digits:10|unique:App\Models\User',
            'email' => 'required|email|max:120|unique:App\Models\User',
            'restaurant_name' => 'required|string|max:250',
            'phone' => 'required|string|max:15',
            'manager_name' => 'required|string|max:120',
            'manager_contact' => 'required|digits:10',
            'restaurant_address' => 'required|string|max:250',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'pin_code' => 'required|digits:6',
            'country' => 'required|numeric',
            'state' => 'required|numeric',
            'city' => 'required|numeric',
            'password' => 'required|min:6|confirmed',
        ]);
        $user=new User;
        $user->user_type='vendor';
        $user->name=$request->name;
        $user->mobile=$request->mobile;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        if ($user->save()) {
           $vendor=new Restaurant;
           $vendor->user_id=$user->id;
           $vendor->name=$request->restaurant_name;
           $vendor->contact_email=$request->email;
           $vendor->phone=$request->phone;
           $vendor->manager_name=$request->manager_name;
           $vendor->manager_contact=$request->manager_contact;
           $vendor->address=$request->restaurant_address;
           $vendor->latitude=$request->latitude;
           $vendor->longitude=$request->longitude;
           $vendor->pin_code=$request->pin_code;
           $vendor->country_id=$request->country;
           $vendor->state_id=$request->state;
           $vendor->city_id=$request->city;
           $vendor->slug=Str::slug($request->restaurant_name.'-'.Str::random(5));
           if ($vendor->save()) {
               return back()->with('success','Restaurant Register Successfully');
           }

        }

    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:120',
            'mobile' => 'required|digits:10|unique:App\Models\User',
            'email' => 'required|email|max:120|unique:App\Models\User',
            'restaurant_name' => 'required|string|max:250',
            'phone' => 'required|string|max:15',
            'manager_name' => 'required|string|max:120',
            'manager_contact' => 'required|digits:10',
            'restaurant_address' => 'required|string|max:250',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'pin_code' => 'required|digits:6',
            'country' => 'required|numeric',
            'state' => 'required|numeric',
            'city' => 'required|numeric',
            'password' => 'required|min:6|confirmed',
        ]);
        $user=new User;
        $user->user_type='vendor';
        $user->name=$request->name;
        $user->mobile=$request->mobile;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        if ($user->save()) {
           $vendor=new Restaurant;
           $vendor->user_id=$user->id;
           $vendor->name=$request->restaurant_name;
           $vendor->contact_email=$request->email;
           $vendor->phone=$request->phone;
           $vendor->manager_name=$request->manager_name;
           $vendor->manager_contact=$request->manager_contact;
           $vendor->address=$request->restaurant_address;
           $vendor->latitude=$request->latitude;
           $vendor->longitude=$request->longitude;
           $vendor->pin_code=$request->pin_code;
           $vendor->country_id=$request->country;
           $vendor->state_id=$request->state;
           $vendor->city_id=$request->city;
           $vendor->slug=Str::slug($request->restaurant_name.'-'.Str::random(5));
           if ($vendor->save()) {
               return back()->with('success','Restaurant Register Successfully');
           }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $restaurant=Restaurant::whereSlug($slug)->first();
        if ($restaurant) {
            $categories=Category::whereRestaurantId($restaurant->id)->get();
            $banners=RestaurantBanner::whereRestaurantId($restaurant->id)->get();
            $galleries=RestaurantGallery::whereRestaurantId($restaurant->id)->get();
           return view('frontend.restaurant',compact('restaurant','categories','banners','galleries'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $restaurant=Restaurant::find(Auth::user()->restaurant->id);
        if ($restaurant) {
            return view('vendor.restaurant_info',compact('restaurant'));
        } else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }


    public function booking(Request $request,$slug){
        $restaurant=Restaurant::whereSlug($slug)->first();
        Mail::to('rmodi2407@gmail.com')->send(new RestaurentBooking($request->time,$request->people));
        return redirect()->back();
    }

    public function listing(Request $request)
    {
        $restaurants=Restaurant::orderBy('name')->paginate(12);
        return view('frontend.restaurant_listing',compact('restaurants'));
    }
}
