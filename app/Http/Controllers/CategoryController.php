<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::whereRestaurantId(Auth::user()->restaurant->id)->paginate(10);
        return view('vendor.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.category.create');
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
            'position' => 'required|numeric|min:1',
        ]);
        $category=new Category;
        $category->restaurant_id=Auth::user()->restaurant->id;
        $category->name=$request->name;
        $category->position=$request->position;
        $category->slug=Str::slug($request->name.Str::random(5));
        if ($category->save()) {
            return back()->with('success','Category Add Successfully.');
        } else{
            return back()->with('error','Something Went Wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        $category=Category::find(decrypt($category_id));
        return view('vendor.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$category_id)
    {
        $request->validate([
            'name' => 'required|string|max:120',
            'position' => 'required|numeric|min:1',
        ]);
        $category=Category::find(decrypt($category_id));
        $category->name=$request->name;
        $category->position=$request->position;
        if ($category->update()) {
            return back()->with('success','Category Update Successfully.');
        } else{
            return back()->with('error','Something Went Wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
       Category::find(decrypt($category_id))->delete();
       Menu::whereCategoryId(decrypt($category_id))->delete();
       return back()->with('success','Category Delete Successfully.');
    }
}
