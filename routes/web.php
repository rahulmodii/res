<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurantRatingController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\Auth\Auth\RegisterController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantBannerController;
use App\Http\Controllers\RestaurantGalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', function () {
    return view('frontend.home');
});

Route::get('admin/login',[HomeController::class, 'adminLogin'])->name('admin.login');
Route::get('vendor/login',[HomeController::class, 'vendorLogin'])->name('vendor.login');

Route::post('login',[LoginController::class, 'login'])->name('login');
Route::get('logout',[LoginController::class, 'logout'])->name('logout');

Route::get('home', [HomeController::class, 'home'])->name('home');

Route::get('restaurant/registeration',[RestaurantController::class, 'registeration'])->name('restaurant.registeration');
Route::post('restaurant/register',[RegisterController::class, 'store'])->name('restaurant.register');

Route::get('user/registration',[HomeController::class,'userRegistration'])->name('user.registration');
Route::get('user/register',[HomeController::class,'userRegister'])->name('user.register');

Route::get('restaurants',[RestaurantController::class, 'listing'])->name('restaurant.list');
Route::get('restaurant/{slug}',[RestaurantController::class, 'show'])->name('restaurant.deatils');
Route::post('restaurant/{slug}',[RestaurantController::class, 'booking']);
Route::get('leave/reaview/{slug}',[RestaurantRatingController::class,'create'])->name('leave.review');
Route::post('review/submit/{slug}',[RestaurantRatingController::class,'store'])->name('review.submit');

Route::post('states',[StateController::class, 'statesGetByCountry'])->name('states');
Route::post('cities',[CityController::class, 'statesGetByState'])->name('cities');

Route::group(['prefix' =>'admin', 'middleware' => ['admin']], function(){
    //DashBoard Related Works
	Route::get('dashboard',[HomeController::class, 'adminDashboard'])->name('admin.dashboard');

    //Category Related Works
    Route::get('restaurant.',[CategoryController::class, 'index'])->name('categories');
    Route::get('category/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store',[CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{category_id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update/{category_id}',[CategoryController::class, 'update'])->name('category.update');
    Route::get('category/delete/{category_id}',[CategoryController::class, 'destroy'])->name('category.delete');

    //Category Related Works
    Route::get('subcategories',[SubcategoryController::class, 'index'])->name('subcategories');
    Route::get('subcategory/create',[SubcategoryController::class, 'create'])->name('subcategory.create');
    Route::post('subcategory/store',[SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::get('subcategory/edit/{category_id}',[SubcategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('subcategory/update/{category_id}',[SubcategoryController::class, 'update'])->name('subcategory.update');
    Route::get('subcategory/delete/{category_id}',[SubcategoryController::class, 'destroy'])->name('subcategory.delete');

    //Restoraunt Related Works
    Route::get('restaurants',[RestaurantController::class, 'index'])->name('restaurants');
    Route::get('restaurant/create',[RestaurantController::class, 'create'])->name('restaurant.create');
    Route::post('restaurant/store',[RestaurantController::class, 'store'])->name('restaurant.store');
    Route::get('restaurant/edit/{category_id}',[RestaurantController::class, 'edit'])->name('restaurant.edit');
    Route::post('restaurant/update/{category_id}',[RestaurantController::class, 'update'])->name('restaurant.update');
    Route::get('restaurant/delete/{category_id}',[RestaurantController::class, 'destroy'])->name('restaurant.delete');
});

Route::group(['prefix' =>'vendor', 'middleware' => ['vendor']], function(){
    //DashBoard Related Works
	Route::get('dashboard',[HomeController::class, 'vendorDashboard'])->name('vendor.dashboard');

    Route::get('restaurant/{slug}',[RestaurantController::class, 'edit'])->name('vendor.restaurant.edit');
    Route::post('restaurant/update/{slug}',[RestaurantController::class, 'update'])->name('vendor.restaurant.update');

    //Restaurant Banner Related Works
    Route::get('banners',[RestaurantBannerController::class, 'index'])->name('restaurant.banners');
    Route::get('banner/create',[RestaurantBannerController::class, 'create'])->name('restaurant.banner.create');
    Route::post('banner/store',[RestaurantBannerController::class, 'store'])->name('restaurant.banner.store');
    Route::get('banner/edit/{banner_id}',[RestaurantBannerController::class, 'edit'])->name('restaurant.banner.edit');
    Route::post('banner/update/{banner_id}',[RestaurantBannerController::class, 'update'])->name('restaurant.banner.update');
    Route::get('banner/delete/{banner_id}',[RestaurantBannerController::class, 'destroy'])->name('restaurant.banner.delete');

    //Restaurant Gallery Related Works
    Route::get('galleries',[RestaurantGalleryController::class, 'index'])->name('restaurant.galleries');
    Route::get('gallery/create',[RestaurantGalleryController::class, 'create'])->name('restaurant.gallery.create');
    Route::post('gallery/store',[RestaurantGalleryController::class, 'store'])->name('restaurant.gallery.store');
    Route::get('gallery/edit/{banner_id}',[RestaurantGalleryController::class, 'edit'])->name('restaurant.gallery.edit');
    Route::post('gallery/update/{banner_id}',[RestaurantGalleryController::class, 'update'])->name('restaurant.gallery.update');
    Route::get('gallery/delete/{banner_id}',[RestaurantGalleryController::class, 'destroy'])->name('restaurant.gallery.delete');

    //Restaurant Category Related Works
    Route::get('categories',[CategoryController::class, 'index'])->name('restaurant.categories');
    Route::get('category/create',[CategoryController::class, 'create'])->name('restaurant.category.create');
    Route::post('category/store',[CategoryController::class, 'store'])->name('restaurant.category.store');
    Route::get('category/edit/{category_id}',[CategoryController::class, 'edit'])->name('restaurant.category.edit');
    Route::post('category/update/{category_id}',[CategoryController::class, 'update'])->name('restaurant.category.update');
    Route::get('category/delete/{category_id}',[CategoryController::class, 'destroy'])->name('restaurant.category.delete');
    //Restaurant Category Related Works
    Route::get('menus',[MenuController::class, 'index'])->name('restaurant.menus');
    Route::get('menu/create',[MenuController::class, 'create'])->name('restaurant.menu.create');
    Route::post('menu/store',[MenuController::class, 'store'])->name('restaurant.menu.store');
    Route::get('menu/edit/{menu_id}',[MenuController::class, 'edit'])->name('restaurant.menu.edit');
    Route::post('menu/update/{menu_id}',[MenuController::class, 'update'])->name('restaurant.menu.update');
    Route::get('menu/delete/{menu_id}',[MenuController::class, 'destroy'])->name('restaurant.menu.delete');

});
Auth::routes();


