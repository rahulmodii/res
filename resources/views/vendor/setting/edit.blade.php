@extends('admin.layouts.app')

  @section('title')
  Update Setting
  @endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('Update Setting')}}</h1>
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
          <div class="card card-primary">
              <div class="card-header">
                <div class="card-header">
                @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @else
                  <h3 class="card-title">{{__('Update Setting')}}</h3>
                @endif
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('general.setting.update',encrypt($setting->id))}}" enctype="multipart/form-data">                
                @csrf
                <div class="card-body row">
                    <div class="form-group col-md-12">
                      @error('site_name') <label class="text-danger">* {{ $errors->first('site_name') }} </label>
                      @else
                      <label>{{__('Site Name')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('site_name') is-invalid @enderror" value="{{$setting->site_name}}" name="site_name" placeholder="Enter Site Name">
                    </div>
                    <div class="form-group col-md-12">
                      @error('tag_line') <label class="text-danger">* {{ $errors->first('tag_line') }} </label>
                      @else
                      <label>{{__('Tag Line')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('tag_line') is-invalid @enderror" value="{{$setting->tag_line}}" name="tag_line" placeholder="Enter Tag Line/Welcome Line">
                    </div>
                    <div class="form-group col-md-6">
                      @error('meta_title') <label class="text-danger">* {{ $errors->first('meta_title') }} </label>
                      @else
                      <label>{{__('Meta Title')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('meta_title') is-invalid @enderror" value="{{$setting->meta_title}}" name="meta_title" placeholder="Enter Meta Title">
                    </div>
                    <div class="form-group col-md-6">
                      @error('meta_description') <label class="text-danger">* {{ $errors->first('meta_description') }} </label>
                      @else
                      <label>{{__('Meta Description')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('meta_description') is-invalid @enderror" value="{{$setting->meta_description}}" name="meta_description" placeholder="Enter Meta Description">
                    </div>
                                        
                    <div class="form-group col-md-6">
                      @error('phone') <label class="text-danger">* {{ $errors->first('phone') }} </label>
                      @else
                      <label>{{__('Phone')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{$setting->phone}}" name="phone" placeholder="Enter Phone">
                    </div>
                    <div class="form-group col-md-6">
                      @error('email') <label class="text-danger">* {{ $errors->first('email') }} </label>
                      @else
                      <label>{{__('Email')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{$setting->email}}" name="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group col-md-6">
                      @error('facebook') <label class="text-danger">* {{ $errors->first('facebook') }} </label>
                      @else
                      <label>{{__('Facebook')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('facebook') is-invalid @enderror" value="{{$setting->facebook}}" name="facebook" placeholder="Enter Facebook">
                    </div>
                    <div class="form-group col-md-6">
                      @error('instagram') <label class="text-danger">* {{ $errors->first('instagram') }} </label>
                      @else
                      <label>{{__('Instagram')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('instagram') is-invalid @enderror" value="{{$setting->instagram}}" name="instagram" placeholder="Enter Instagram">
                    </div>
                    <div class="form-group col-md-6">
                      @error('tripadvisor') <label class="text-danger">* {{ $errors->first('tripadvisor') }} </label>
                      @else
                      <label>{{__('Tripadvisor')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('tripadvisor') is-invalid @enderror" value="{{$setting->tripadvisor}}" name="tripadvisor" placeholder="Enter tripadvisor">
                    </div>
                    <div class="form-group col-md-6">
                      @error('youtube') <label class="text-danger">* {{ $errors->first('youtube') }} </label>
                      @else
                      <label>{{__('Youtube')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('youtube') is-invalid @enderror" value="{{$setting->youtube}}" name="youtube" placeholder="Enter Youtube">
                    </div>
                    <div class="form-group col-md-6">
                      @error('address') <label class="text-danger">* {{ $errors->first('address') }} </label>
                      @else
                      <label>{{__('Address')}}</label>
                      @enderror
                      <textarea name="address" id="page_details"  class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address">{{$setting->address}}</textarea>                                            
                    </div>
                    <div class="form-group col-md-6">
                      @error('description') <label class="text-danger">* {{ $errors->first('description') }} </label>
                      @else
                      <label>{{__('Brief Description')}}</label>
                      @enderror
                      <textarea name="description" id="page_details1"  class="form-control @error('description') is-invalid @enderror" placeholder="Enter Brief Description">{{$setting->description}}</textarea>                                            
                    </div>
                    <div class="form-group col-md-4">
                      <label>{{__('')}}</label>
                      <img src="{{asset('public/uploads/setting')}}/{{$setting->header_logo}}" class="float-sm-right" width="200">
                    </div>                     
                    <div class="form-group col-md-8">
                      @error('header_logo') <label class="text-danger">* {{ $errors->first('header_logo') }} </label>
                      @else
                      <label>{{__('Header Logo')}}</label>
                      @enderror
                      <input type="file" class="form-control @error('header_logo') is-invalid @enderror" value="{{$setting->header_logo}}" name="header_logo" placeholder="Enter Web Header Logo">
                    </div>
                    <div class="form-group col-md-4">
                      <label>{{__('')}}</label>
                      <img src="{{asset('public/uploads/setting')}}/{{$setting->footer_logo}}" class="float-sm-right" width="200">
                    </div>
                    <div class="form-group col-md-8">
                      @error('footer_logo') <label class="text-danger">* {{ $errors->first('footer_logo') }} </label>
                      @else
                      <label>{{__('Footer Logo')}}</label>
                      @enderror
                      <input type="file" class="form-control @error('footer_logo') is-invalid @enderror" value="{{$setting->footer_logo}}" name="footer_logo" placeholder="Enter Footer Logo">
                    </div>

                    <div class="form-group col-md-4">
                      <img src="{{asset('public/uploads/setting')}}/{{$setting->favicon}}" class="float-sm-right" width="96">
                    </div>
                    <div class="form-group col-md-8">
                      @error('favicon') <label class="text-danger">* {{ $errors->first('favicon') }} </label>
                      @else
                      <label>{{__('Favicon')}}</label>
                      @enderror
                      <input type="file" class="form-control @error('favicon') is-invalid @enderror" value="{{$setting->favicon}}" name="favicon" placeholder="Enter Favicon">
                    </div>                           
                  </div>                  
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{__('Update Web Setting')}}</button>
                </div>
              </form>
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
