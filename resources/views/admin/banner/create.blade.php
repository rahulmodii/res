@extends('admin.layouts.app')

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
            <h1>{{__('Add Banner')}}</h1>
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
                  <h3 class="card-title">{{__('Add New Banner')}}</h3>
                @endif
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->             
                <div class="card-body">
                    <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="row">
                      <div class="form-group col-md-6 col-6">
                        @error('heading') <label class="text-danger">* {{ $errors->first('heading') }} </label>
                        @else
                        <label>{{__('Banner Heading')}}</label>
                        @enderror
                        <input type="text" class="form-control @error('heading') is-invalid @enderror" value="{{old('heading')}}" name="heading" placeholder="Enter Banner Heading">
                      </div>
                      <div class="form-group col-md-6 col-6">
                        @error('link') <label class="text-danger">* {{ $errors->first('link') }} </label>
                        @else
                        <label>{{__('Link/URL')}}</label>
                        @enderror
                        <input type="text" class="form-control @error('link') is-invalid @enderror" value="{{old('link')}}" name="link" placeholder="Enter Link/URL">
                      </div>
                      <div class="form-group col-md-12">
                        @error('brief_description') <label class="text-danger">* {{ $errors->first('brief_description') }} </label>
                        @else
                        <label>{{__('Brief Description')}}</label>
                        @enderror
                        <textarea class="form-control @error('brief_description') is-invalid @enderror" name="brief_description" placeholder="Enter Brief Description">{{old('brief_description')}}</textarea>                       
                      </div>
                      <div class="form-group col-md-12">
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
  <script type="text/javascript">
    $('#category_id').on('change', function() {
        get_subcategory_by_category();
    });
    function get_subcategory_by_category(){
      var category_id = $('#category_id').val();
      $.post('{{route('subcategory')}}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
          $('#subcategory_id').html(null);
          $('#subcategory_id').append($('<option value="">Select Subcategory</option>', {
               
          }));
          for (var i = 0; i < data.length; i++) {
              $('#subcategory_id').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));
              $('.demo-select2').select2();
          }        
      });
    }
  </script>
  <script type="text/javascript">
    $('#subcategory_id').on('change', function() {
        get_subsubcategory_by_subcategory();
    });
    function get_subsubcategory_by_subcategory(){
      var subcategory_id = $('#subcategory_id').val();
      $.post('{{route('subsubcategory')}}',{_token:'{{ csrf_token() }}', subcategory_id:subcategory_id}, function(data){
          $('#subsubcategory_id').html(null);
          $('#subsubcategory_id').append($('<option value="">Select Sub Subcategory</option>', {
               
          }));
          for (var i = 0; i < data.length; i++) {
              $('#subsubcategory_id').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));
              $('.demo-select2').select2();
          }        
      });
    }
  </script>
  <script type="text/javascript">
    $('#subsubcategory_id').on('change', function() {
        get_product_by_subsubcategory();
    });
    function get_product_by_subsubcategory(){
      var subsubcategory_id = $('#subsubcategory_id').val();
      $.post('{{route('product')}}',{_token:'{{ csrf_token() }}', subsubcategory_id:subsubcategory_id}, function(data){
          $('#product_id').html(null);
          $('#product_id').append($('<option value="">Select Product</option>', {
               
          }));
          for (var i = 0; i < data.length; i++) {
              $('#product_id').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));
              $('.demo-select2').select2();
          }        
      });
    }
  </script>
  <script type="text/javascript">
    $('#category2_id').on('change', function() {
        get_subcategory2_by_category2();
    });
    function get_subcategory2_by_category2(){
      var category2_id = $('#category2_id').val();
      $.post('{{route('subcategory')}}',{_token:'{{ csrf_token() }}', category_id:category2_id}, function(data){
          $('#subcategory2_id').html(null);
          $('#subcategory2_id').append($('<option value="">Select Subcategory</option>', {
               
          }));
          for (var i = 0; i < data.length; i++) {
              $('#subcategory2_id').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));
              $('.demo-select2').select2();
          }        
      });
    }
  </script>
  <script type="text/javascript">
    $('#subcategory2_id').on('change', function() {
        get_subsubcategory2_by_subcategory2();
    });
    function get_subsubcategory2_by_subcategory2(){
      var subcategory2_id = $('#subcategory2_id').val();
      $.post('{{route('subsubcategory')}}',{_token:'{{ csrf_token() }}', subcategory_id:subcategory2_id}, function(data){
          $('#subsubcategory2_id').html(null);
          $('#subsubcategory2_id').append($('<option value="">Select Sub Subcategory</option>', {
               
          }));
          for (var i = 0; i < data.length; i++) {
              $('#subsubcategory2_id').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));
              $('.demo-select2').select2();
          }        
      });
    }
  </script>
  <script type="text/javascript">
    $('#subsubcategory2_id').on('change', function() {
        get_product2_by_subsubcategory2();
    });
    function get_product2_by_subsubcategory2(){
      var subsubcategory2_id = $('#subsubcategory2_id').val();
      $.post('{{route('product')}}',{_token:'{{ csrf_token() }}', subsubcategory_id:subsubcategory2_id}, function(data){
          $('#product2_id').html(null);
          $('#product2_id').append($('<option value="">Select Product</option>', {
               
          }));
          for (var i = 0; i < data.length; i++) {
              $('#product2_id').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));
              $('.demo-select2').select2();
          }        
      });
    }
  </script>
  <script type="text/javascript">
    $('#book_category_id').on('change', function() {
        get_booksubcategory_by_bookcategory();
    });
    function get_booksubcategory_by_bookcategory(){
      var book_category_id = $('#book_category_id').val();
      $.post('{{route('booksubcategory')}}',{_token:'{{ csrf_token() }}', book_category_id:book_category_id}, function(data){
          $('#book_subcategory_id').html(null);
          $('#book_subcategory_id').append($('<option value="">Select Book Category</option>', {
               
          }));
          for (var i = 0; i < data.length; i++) {
              $('#book_subcategory_id').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));
              $('.demo-select2').select2();
          }        
      });
    }
  </script>
  <script type="text/javascript">
    $('#book_subcategory_id').on('change', function() {
        get_booksubcategory_by_book();
    });
    function get_booksubcategory_by_book(){
      var book_subcategory_id = $('#book_subcategory_id').val();
      $.post('{{route('book')}}',{_token:'{{ csrf_token() }}', book_subcategory_id:book_subcategory_id}, function(data){
          $('#book_id').html(null);
          $('#book_id').append($('<option value="">Select Book</option>', {
               
          }));
          for (var i = 0; i < data.length; i++) {
              $('#book_id').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));
              $('.demo-select2').select2();
          }        
      });
    }
  </script>
@endsection