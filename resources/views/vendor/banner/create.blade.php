@extends('vendor.layouts.app')

  @section('title')
    Add Banner
  @endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1>{{__('Add Banner')}}</h1> --}}
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
                  <h3 class="card-title">{{__('Banner Info')}}</h3>
                @endif
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                    <form action="{{route('restaurant.banner.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="row">
                      <div class="form-group col-md-6 col-6">
                        @error('heading') <label class="text-danger">* {{ $errors->first('heading') }} </label>
                        @else
                        <label>{{__('Banner Heading')}}</label>
                        @enderror
                        <input type="text" class="form-control @error('heading') is-invalid @enderror" value="{{old('heading')}}" name="heading" placeholder="Enter Banner Heading">
                      </div>
                      <div class="form-group col-md-6">
                        @error('image') <label class="text-danger">* {{ $errors->first('image') }} </label>
                        @else
                        <label>{{__('Banner Image')}}</label>
                        @enderror
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                      </div>
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-primary float-sm-right">{{__('Submit')}}</button>
                      </div>
                    </div>
                    </form>
                </div>

                <!-- /.card-body -->
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
