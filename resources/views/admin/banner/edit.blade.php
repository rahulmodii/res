@extends('admin.layouts.app')

  @section('title')
    Edit Banner
  @endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('Edit Banner')}}</h1>
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
                  <h3 class="card-title">{{__('Edit Banner')}}</h3>
                @endif
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('banner.update',encrypt($banner->id))}}" enctype="multipart/form-data">                
                @csrf
                <div class="card-body">                    
                    <div class="row">
                    <div class="form-group col-md-6">
                      @error('heading') <label class="text-danger">* {{ $errors->first('heading') }} </label>
                      @else
                      <label>{{__('Banner Heading')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('heading') is-invalid @enderror" value="{{$banner->heading}}" name="heading" placeholder="Enter Banner Heading">
                    </div>
                    <div class="form-group col-md-6">
                      @error('link') <label class="text-danger">* {{ $errors->first('link') }} </label>
                      @else
                      <label>{{__('Link/URL')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('link') is-invalid @enderror" value="{{$banner->link}}" name="link" placeholder="Enter Link/URL">
                    </div>
                     <div class="form-group col-md-12">
                        @error('brief_description') <label class="text-danger">* {{ $errors->first('brief_description') }} </label>
                        @else
                        <label>{{__('Brief Description')}}</label>
                        @enderror
                        <textarea class="form-control @error('brief_description') is-invalid @enderror" name="brief_description" placeholder="Enter Brief Description">{{$banner->brief_description}}</textarea>                       
                      </div>                    
                    <div class="form-group col-md-2">
                      <label>{{__('')}}</label>
                      <img src="{{asset('public/uploads/banner')}}/{{$banner->image}}" class="float-sm-right" width="200">
                    </div>
                    <div class="form-group col-md-4">
                      @error('banner_image') <label class="text-danger">* {{ $errors->first('banner_image') }} </label>
                      @else
                      <label>{{__('Banner Image')}}</label>
                      @enderror
                      <input type="file" class="form-control @error('banner_image') is-invalid @enderror" name="banner_image">
                    </div>                               
                  </div>                  
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{__('Update Banner')}}</button>
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
@section('script')
@endsection