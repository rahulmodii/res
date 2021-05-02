@extends('admin.layouts.app')

  @section('title')
    Edit Blog
  @endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('Edit Blog')}}</h1>
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
                  <h3 class="card-title">{{__('Edit Blog')}}</h3>
                @endif
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('blog.update',encrypt($blog->id))}}" enctype="multipart/form-data">                
                @csrf
                <div class="card-body row">
                    <div class="form-group col-md-6">
                      @error('heading') <label class="text-danger">* {{ $errors->first('heading') }} </label>
                      @else
                      <label>{{__('Blog Heading')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('heading') is-invalid @enderror" value="{{$blog->heading}}" name="heading" placeholder="Enter Blog Heading">
                    </div>
                    <div class="form-group col-md-6">
                      @error('meta_title') <label class="text-danger">* {{ $errors->first('meta_title') }} </label>
                      @else
                      <label>{{__('Blog Meta Title')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('meta_title') is-invalid @enderror" value="{{$blog->meta_title}}" name="meta_title" placeholder="Enter Blog Name">
                    </div>
                    <div class="form-group col-md-12">
                      @error('meta_description') <label class="text-danger">* {{ $errors->first('meta_description') }} </label>
                      @else
                      <label>{{__('Blog Meta Description')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('meta_description') is-invalid @enderror" value="{{$blog->meta_description}}" name="meta_description" placeholder="Enter Blog Name">
                    </div>
                    <div class="form-group col-md-4">
                      <img src="{{asset('public/uploads/blog')}}/{{$blog->image}}" class="float-sm-right" width="96">
                    </div>
                    <div class="form-group col-md-8">
                      @error('image') <label class="text-danger">* {{ $errors->first('image') }} </label>
                      @else
                      <label>{{__('Blog image')}}</label>
                      @enderror
                      <input type="file" class="form-control @error('image') is-invalid @enderror" value="{{$blog->image}}" name="image">
                    </div>                    
                    <div class="form-group col-md-4">
                      @error('author') <label class="text-danger">* {{ $errors->first('author') }} </label>
                      @else
                      <label>{{__('Blog Author')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('author') is-invalid @enderror" value="{{$blog->author}}" name="author" placeholder="Enter Blog Name">
                    </div>                 
                    <div class="form-group col-md-4">
                      @error('slug') <label class="text-danger">* {{ $errors->first('slug') }} </label>
                      @else
                      <label>{{__('Slug Name')}}</label>
                      @enderror
                      <input type="text" class="form-control @error('slug') is-invalid @enderror" value="{{$blog->slug}}" name="slug" placeholder="Enter Slug Name" disabled="disabled">
                    </div>
                    <div class="form-group col-md-12">
                      @error('descriptions') <label class="text-danger">* {{ $errors->first('descriptions') }} </label>
                      @else
                      <label>{{__('Blog Descriptions')}}</label>
                      @enderror
                      <textarea name="descriptions" id="descriptions"  class="form-control @error('descriptions') is-invalid @enderror">{{$blog->descriptions}}</textarea>
                    </div>
                                               
                  </div>                  
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{__('Update Blog')}}</button>
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
  <script>
      $(function () {
      // Summernote
      $('#descriptions').summernote()
      })
  </script>
@endsection