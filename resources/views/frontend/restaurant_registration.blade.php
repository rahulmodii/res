@extends('frontend.layouts.app')
@section('meta_title','')
@section('meta_description','')
@section('meanubar','header_in')
@section('content')
    <div class="hero_single inner_pages background-image" data-background="url(img/hero_submit.jpg)">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10 col-md-8">
                        <h1>Attract New Customers</h1>
                        <p>More bookings from diners around the corner</p>
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
    </div>
    <div class="bg_gray pattern" id="submit">
        <div class="container margin_60_40">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="text-center add_bottom_15">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @else
                        <h4>Please fill the form below</h4>
                        @endif
                        <p>Id persius indoctum sed, audiam verear his in, te eum quot comprehensam. Sed impetus vocibus repudiare et.</p>
                    </div>
                    <div id="message-register"></div>
                        <form method="post" action="{{ route('restaurant.register') }}" >
                            @csrf
                            <h6>{{ __('Personal Deatils') }}</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        @error('name') <label style="color: red">* {{ $errors->first('name') }} </label>
                                        @else
                                        <label>{{__('Name')}}</label>
                                        @enderror
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row add_bottom_15">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        @error('email') <label style="color: red">* {{ $errors->first('email') }} </label>
                                        @else
                                        <label>{{__('Email')}}</label>
                                        @enderror
                                        <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row add_bottom_15">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        @error('mobile') <label style="color: red">* {{ $errors->first('mobile') }} </label>
                                        @else
                                        <label>{{__('Mobile')}}</label>
                                        @enderror
                                        <input type="text" class="form-control  @error('mobile') is-invalid @enderror" placeholder="Mobile No." name="mobile" value="{{ old('mobile') }}">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <h6>Restaurant Deatils</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        @error('restaurant_name') <label style="color: red">* {{ $errors->first('restaurant_name') }} </label>
                                        @else
                                        <label>{{__('Restaurant Name')}}</label>
                                        @enderror
                                        <input type="text" class="form-control  @error('restaurant_name') is-invalid @enderror" placeholder="Restaurant Name" name="restaurant_name" value="{{ old('restaurant_name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row add_bottom_15">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        @error('phone') <label style="color: red">* {{ $errors->first('phone') }} </label>
                                        @else
                                        <label>{{__('Phone')}}</label>
                                        @enderror
                                        <input type="text" class="form-control  @error('phone') is-invalid @enderror" placeholder="Phone No." name="phone" value="{{ old('phone') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        @error('manager_name') <label style="color: red">* {{ $errors->first('manager_name') }} </label>
                                        @else
                                        <label>{{__('Manager Name')}}</label>
                                        @enderror
                                        <input type="text" class="form-control  @error('manager_name') is-invalid @enderror" placeholder="Manager Name" name="manager_name" value="{{ old('manager_name') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        @error('manager_contact') <label style="color: red">* {{ $errors->first('manager_contact') }} </label>
                                        @else
                                        <label>{{__('Manager Contact No.')}}</label>
                                        @enderror
                                        <input type="text" class="form-control  @error('manager_contact') is-invalid @enderror" placeholder="Manager Contact No." name="manager_contact" value="{{ old('manager_contact') }}">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row add_bottom_15">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @error('country') <label style="color: red">* {{ $errors->first('country') }} </label>
                                        @else
                                        <label>{{__('Country')}}</label>
                                        @enderror
                                        <select class="form-control  @error('country') is-invalid @enderror" name="country" id="country">
                                            <option value="">Country</option>
                                            @foreach (App\Models\Country::orderBy('name')->get() as $country)
                                                <option value="{{ $country->id }}" @if(old('country')==$country->id) selected @endif>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @error('state') <label style="color: red">* {{ $errors->first('state') }} </label>
                                        @else
                                        <label>{{__('State')}}</label>
                                        @enderror
                                        <select class="form-control  @error('state') is-invalid @enderror" name="state" id="state">
                                            <option value="">Select State</option>
                                            @if (old('country'))
                                                @foreach (App\Models\State::orderBy('name')->whereCountryId(old('country'))->get() as $state)
                                                    <option value="{{ $state->id }}" @if(old('state')==$state->id) selected @endif>{{ $state->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @error('city') <label style="color: red">* {{ $errors->first('city') }} </label>
                                        @else
                                        <label>{{__('City')}}</label>
                                        @enderror
                                        <select class="form-control  @error('city') is-invalid @enderror" name="city" id="city">
                                            <option value="">Select City</option>
                                            @if (old('state'))
                                                @foreach (App\Models\City::orderBy('name')->whereStateId(old('state'))->get() as $city)
                                                    <option value="{{ $city->id }}" @if(old('city')==$state->id) selected @endif>{{ $city->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @error('pin_code') <label style="color: red">* {{ $errors->first('pin_code') }} </label>
                                        @else
                                        <label>{{__('PIN Code/Post Code')}}</label>
                                        @enderror
                                        <input type="text" class="form-control  @error('pin_code') is-invalid @enderror" placeholder="Pin Code/Post Code" name="pin_code" value="{{ old('pin_code') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @error('latitude') <label style="color: red">* {{ $errors->first('latitude') }} </label>
                                        @else
                                        <label>{{__('Latitude')}}</label>
                                        @enderror
                                        <input type="text" class="form-control  @error('latitude') is-invalid @enderror" placeholder="Latitude" name="latitude" value="{{ old('latitude') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @error('longitude') <label style="color: red">* {{ $errors->first('longitude') }} </label>
                                        @else
                                        <label>{{__('Longitude')}}</label>
                                        @enderror
                                        <input type="text" class="form-control  @error('logitude') is-invalid @enderror" placeholder="Longitude" name="longitude" value="{{ old('longitude') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        @error('restaurant_address') <label style="color: red">* {{ $errors->first('restaurant_address') }} </label>
                                        @else
                                        <label>{{__('Restaurant Address')}}</label>
                                        @enderror
                                        <textarea name="restaurant_address" id="" class="form-control  @error('restaurant_address') is-invalid @enderror" rows="3" placeholder="Restaurant Address">{{ old('restaurant_address') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        @error('password') <label style="color: red">* {{ $errors->first('password') }} </label>
                                        @else
                                        <label>{{__('Password')}}</label>
                                        @enderror
                                        <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" name="password">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        @error('password_confirmation') <label style="color: red">* {{ $errors->first('password_confirmation') }} </label>
                                        @else
                                        <label>{{__('Confirm Password')}}</label>
                                        @enderror
                                        <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->

                            <div class="form-group text-center"><button type="submit" class="btn_1">Submit</button></div>
                        </form>
                </div>
            </div>
        </div>
        <!-- /container -->
    </div>
@endsection
@section('styles')

@endsection
@section('scripts')
<script type="text/javascript">
    $('#country').on('change', function() {
        get_country_by_state();
    });
    function get_country_by_state(){
      var country = $('#country').val();
      $.post('{{route('states')}}',{_token:'{{ csrf_token() }}', country_id:country}, function(data){
          $('#state').html(null);
          $('#state').append($('<option value="">Select State</option>', {

          }));
          for (var i = 0; i < data.length; i++) {
              $('#state').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));

          }
      });
    }
    $('#state').on('change', function() {
        get_state_by_cities();
    });
    function get_state_by_cities(){
      var state = $('#state').val();
      $.post('{{route('cities')}}',{_token:'{{ csrf_token() }}', state_id:state}, function(data){
          $('#city').html(null);
          $('#city').append($('<option value="">Select City</option>', {

          }));
          for (var i = 0; i < data.length; i++) {
              $('#city').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));

          }
      });
    }
 </script>
@endsection
