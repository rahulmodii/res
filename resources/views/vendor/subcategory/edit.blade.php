@extends('admin.layouts.app')

  @section('title')
    Edit Subcategory
  @endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('Edit Subcategory')}}</h1>
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
                  <h3 class="card-title">{{__('Edit Subcategory')}}</h3>
                @endif
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('subcategory.update',encrypt($subcategory->id))}}" enctype="multipart/form-data">                
                @csrf
                <div class="card-body row">
                    <div class="form-group col-md-6">
                      @error('category') <label class="text-danger">* {{ $errors->first('category') }} </label>
                      @else
                      <label>{{__('Category Name')}}</label>
                      @enderror
                      <select class="form-control @error('name') is-invalid @enderror" name="category">
                        <option value="">Select Category</option>
                        @foreach(App\Category::orderBy('name')->get() as $key=>$category)
                        <option value="{{$category->id}}"  @if ($category->id == $subcategory->category_id) selected="selected" @endif>{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      @error('name') <label class="text-danger">* {{ $errors->first('name') }} </label>
                      @else
                      <label>{{__('Category Name')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$subcategory->name}}" name="name" placeholder="Enter Category Name">
                    </div>                                                   
                  </div>                  
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{__('Update Category')}}</button>
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