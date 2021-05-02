@extends('vendor.layouts.app')

  @section('title')
    Add Menu Item
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
          <div class="card card-primary">
              <div class="card-header">
                <div class="card-header">
                @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @else
                  <h3 class="card-title">{{__('Menu Item Info')}}</h3>
                @endif
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('restaurant.menu.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="form-group col-md-4">
                        @error('name') <label class="text-danger">* {{ $errors->first('name') }} </label>
                        @else
                        <label>{{__('Select Category')}}</label>
                        @enderror
                        <select name="category" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $key => $category)
                            <option value="{{ $category->id }}" @if(old('category')==$category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="form-group col-md-4">
                      @error('name') <label class="text-danger">* {{ $errors->first('name') }} </label>
                      @else
                      <label>{{__('Menu Item Name')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" placeholder="Enter Category Name">
                    </div>
                    <div class="form-group col-md-4">
                        @error('price') <label class="text-danger">* {{ $errors->first('price') }} </label>
                        @else
                        <label>{{__('Price')}}</label>
                        @enderror
                        <input type="number" min="10" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" name="price" placeholder="Enter Price">
                    </div>
                    <div class="form-group col-md-12">
                        @error('brief_description') <label class="text-danger">* {{ $errors->first('brief_description') }} </label>
                        @else
                        <label>{{__('Price')}}</label>
                        @enderror
                        <textarea class="form-control @error('brief_description') is-invalid @enderror" name="brief_description" placeholder="Enter Brief Description" rows="5"></textarea>
                    </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
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
