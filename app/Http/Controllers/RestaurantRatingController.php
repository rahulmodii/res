<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\RestaurantRating;
use Illuminate\Http\Request;
use AUth;
class RestaurantRatingController extends Controller
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
    public function create($slug)
    {
        $restaurant=Restaurant::whereSlug($slug)->first();
        if ($restaurant) {
            return view('frontend.leave_review',compact('restaurant'));
        } else {
            abort(404);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$slug)
    {
        $request->validate([
            'rating_food_quality' => 'required|numeric|min:1',
            'rating_service' => 'required|numeric|min:1',
            'rating_location' => 'required|numeric|min:1',
            'price_rating' => 'required|numeric|min:1',
            'title' => 'required|string|max:120',
            'comment' => 'required|string|max:500',
        ]);
        if (Auth::check()) {
            $restaurant=Restaurant::whereSlug($slug)->first();
            if ($restaurant) {
                $rating=RestaurantRating::whereUserId(Auth::user()->id)->whereRestaurantId($restaurant->id)->first();
            } else{
                return back()->with('error','Something Went Wrong');
            }
            if ($rating) {
                $rating->rating_food_quality=$request->rating_food_quality;
                $rating->rating_service=$request->rating_service;
                $rating->rating_location=$request->rating_location;
                $rating->price_rating=$request->price_rating;
                $rating->title=$request->title;
                $rating->comment=$request->comment;
                $rating->update();
                return back()->with('success','Review Submitted Successfully');
            } else{
                $rating=new Restaurant;
                $rating->rating_food_quality=$request->rating_food_quality;
                $rating->rating_service=$request->rating_service;
                $rating->rating_location=$request->rating_location;
                $rating->price_rating=$request->price_rating;
                $rating->title=$request->title;
                $rating->comment=$request->comment;
                $rating->save();
                return back()->with('success','Review Submitted Successfully');
            }
        } else{
            return back()->with('error','Login First');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RestaurantRating  $restaurantRating
     * @return \Illuminate\Http\Response
     */
    public function show(RestaurantRating $restaurantRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RestaurantRating  $restaurantRating
     * @return \Illuminate\Http\Response
     */
    public function edit(RestaurantRating $restaurantRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RestaurantRating  $restaurantRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RestaurantRating $restaurantRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RestaurantRating  $restaurantRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestaurantRating $restaurantRating)
    {
        //
    }
}
