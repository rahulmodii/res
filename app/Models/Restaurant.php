<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function user() {
    	return $this->belongsTo('App\Models\User');
	}
    public function country() {
    	return $this->belongsTo('App\Models\Country');
	}
    public function state() {
    	return $this->belongsTo('App\Models\State');
	}
    public function city() {
    	return $this->belongsTo('App\Models\City');
	}
    public function ratings() {
    	return $this->hasMany('App\Models\RestaurantRating');
	}
}
