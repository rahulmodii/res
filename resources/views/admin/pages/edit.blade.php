@extends('admin.layouts.app')

  @section('title')
    Page
  @endsection

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">{{__('Edit Page')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-header">
                @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @else
                  <h3 class="card-title">{{__('Page Information')}}</h3>
                @endif
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('page.update',encrypt($page->id))}}" enctype="multipart/form-data">                
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    @error('page_name') <label class="text-danger">* {{ $errors->first('page_name') }} </label>
                    @else
                    <label>{{__('Page Name')}}</label>
                    @enderror
                    <input type="text" class="form-control @error('page_name') is-invalid @enderror" value="{{$page->name}}" disabled="" name="page_name">
                  </div>
                  <div class="form-group">
                    @error('position') <label class="text-danger">* {{ $errors->first('position') }} </label>
                    @else
                    <label>{{__('Page Potion')}}</label>
                    @enderror
                    <input type="number" min="1" class="form-control @error('position') is-invalid @enderror" value="{{$page->position}}" name="position" placeholder="Enter Page Potion">
                  </div>
                  <div class="form-group">
                    @error('meta_title') <label class="text-danger">* {{ $errors->first('meta_title') }} </label>
                    @else
                    <label>{{__('Meta Title')}}</label>
                    @enderror
                    <input type="text" class="form-control @error('meta_title') is-invalid @enderror" value="{{$page->meta_title}}" name="meta_title">
                  </div>
                  <div class="form-group">
                    @error('meta_description') <label class="text-danger">* {{ $errors->first('meta_description') }} </label>
                    @else
                    <label>{{__('Meta Description')}}</label>
                    @enderror
                    <input type="text" class="form-control @error('meta_description') is-invalid @enderror" value="{{$page->meta_description}}" name="meta_description">
                  </div>
                  <div class="form-group">
                    @error('description') <label class="text-danger">* {{ $errors->first('description') }} </label>
                    @else
                    <label>{{__('Page Details')}}</label>
                    @enderror
                    <textarea name="page_details" id="page_details"  class="form-control @error('description') is-invalid @enderror">{{$page->description}}</textarea>
                  </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
                </div>
              </form>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>
@endsection
@section('script')
  

  <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
  <script>
    
    CKEDITOR.replace( 'page_details' );
    extraPlugins: 'abbr'
  </script>
  
@endsection
