@extends('vendor.layouts.app')

  @section('title')
    {{ $restaurant->name }}
  @endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
            <div class="card-header">
              @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @else
              <h3 class="card-title">
                 <i class="fas fa-hotel"></i>
                 {{ $restaurant->name }}
              </h3>
              @endif
            </div>
            <div class="card-body">
               <form method="post" action="{{route('vendor.restaurant.update',encrypt($restaurant->slug))}}" id="choice_form" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-5 col-sm-3">
                      <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                          <a class="nav-link active" id="general-info-tab" data-toggle="pill" href="#general-info" role="tab" aria-controls="general-info" aria-selected="true">General Information</a>
                          <a class="nav-link" id="location-tab" data-toggle="pill" href="#location" role="tab" aria-controls="location" aria-selected="false">Location</a>
                          <a class="nav-link" id="social-tab" data-toggle="pill" href="#social" role="tab" aria-controls="social" aria-selected="false">Social Setting</a>
                          <a class="nav-link" id="description-tab" data-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="false">About Us</a>
                          <a class="nav-link" id="media-tab" data-toggle="pill" href="#media" role="tab" aria-controls="media" aria-selected="false">Media</a>
                      </div>
                    </div>
                    <div class="col-7 col-sm-9">
                      <div class="tab-content" id="vert-tabs-tabContent">
                          <div class="tab-pane text-left fade show active" id="general-info" role="tabpanel" aria-labelledby="general-info-tab">
                              <div class="row">
                                  <div class="form-group col-md-6">
                                    @error('name') <label class="text-danger">* {{ $errors->first('name') }} </label>
                                    @else
                                    <label>{{__('Restaurant/Hotel Name')}}</label>
                                    @enderror
                                    <input type="text" class="form-control input-sm @error('name') is-invalid @enderror" value="{{$restaurant->name}}" name="name" placeholder="Enter Restaurant Name">
                                  </div>
                                  <div class="form-group col-md-6">
                                    @error('tag_line') <label class="text-danger">* {{ $errors->first('tag_line') }} </label>
                                    @else
                                    <label>{{__('Tage Line')}}</label>
                                    @enderror
                                    <input type="text" class="form-control input-sm @error('tag_line') is-invalid @enderror" value="{{$restaurant->tag_line}}" name="tag_line" placeholder="Enter Tag Line">
                                  </div>
                                  <div class="form-group col-md-6">
                                    @error('phone') <label class="text-danger">* {{ $errors->first('phone') }} </label>
                                    @else
                                    <label>{{__('Phone')}}</label>
                                    @enderror
                                    <input type="text" class="form-control input-sm @error('phone') is-invalid @enderror" value="{{$restaurant->phone}}" name="phone" placeholder="Enter Phone">
                                  </div>
                                  <div class="form-group col-md-6">
                                    @error('manager_name') <label class="text-danger">* {{ $errors->first('manager_name') }} </label>
                                    @else
                                    <label>{{__('Manager Name')}}</label>
                                    @enderror
                                    <input type="text" class="form-control input-sm @error('manager_name') is-invalid @enderror" value="{{$restaurant->manager_name}}" name="manager_name" placeholder="Enter Manager Name">
                                  </div>
                                  <div class="form-group col-md-6">
                                    @error('manager_contact') <label class="text-danger">* {{ $errors->first('manager_contact') }} </label>
                                    @else
                                    <label>{{__('Manager Contact No.')}}</label>
                                    @enderror
                                    <input type="text" class="form-control input-sm @error('manager_contact') is-invalid @enderror" value="{{$restaurant->manager_contact}}" name="manager_contact" placeholder="Enter Manager Contact Number">
                                  </div>
                                  <div class="form-group col-md-6">
                                    @error('contact_email') <label class="text-danger">* {{ $errors->first('contact_email') }} </label>
                                    @else
                                    <label>{{__('Contact Email')}}</label>
                                    @enderror
                                    <input type="text" class="form-control input-sm @error('contact_email') is-invalid @enderror" value="{{$restaurant->contact_email}}" name="contact_email" placeholder="Enter Contact Email">
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-sm-right">{{__('Update')}}</button>
                  </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
    <!-- /.content -->
  </div>
  <!-- Order Modal -->
@endsection
@section('script')
@endsection
