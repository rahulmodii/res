@extends('admin.layouts.app')

  @section('title')
    Add Category
  @endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('Add Category')}}</h1>
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
                  <h3 class="card-title">{{__('Add New Category')}}</h3>
                @endif
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">                
                @csrf
                <div class="card-body row">
                    <div class="form-group col-md-6">
                      @error('name') <label class="text-danger">* {{ $errors->first('name') }} </label>
                      @else
                      <label>{{__('Category Name')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" placeholder="Enter Category Name">
                    </div>
                    <div class="form-group col-md-6">
                      @error('banner') <label class="text-danger">* {{ $errors->first('banner') }} </label>
                      @else
                      <label>{{__('Category Banner')}}</label>
                      @enderror
                      <input type="file" class="form-control @error('banner') is-invalid @enderror" name="banner">
                    </div>                                                             
                  </div>                  
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{__('Add Category')}}</button>
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