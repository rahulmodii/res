<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus=Menu::whereRestaurantId(Auth::user()->restaurant->id)->paginate(10);
        return view('vendor.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::whereRestaurantId(Auth::user()->restaurant->id)->get();
        return view('vendor.menu.create',compact('categories'));
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
            'category' => 'required|numeric',
            'price' => 'required|numeric|min:10',
            'brief_description' => 'required|max:250',
        ]);
        $menu=new Menu;
        $menu->restaurant_id=Auth::user()->restaurant->id;
        $menu->name=$request->name;
        $menu->category_id=$request->category;
        $menu->price=$request->price;
        $menu->discount=0;
        $menu->brief_description=$request->brief_description;
        if ($menu->save()) {
            return back()->with('success','Menu Add Successfully.');
        } else{
            return back()->with('error','Something Went Wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($menu_id)
    {

        Menu::find(decrypt($menu_id))->delete();
        return back()->with('success','Menu Delete Successfully.');
    }
}
