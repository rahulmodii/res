@extends('admin.layouts.app')

  @section('title')
    Reset Password | {{env('APP_NAME')}}
  @endsection

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('Reset Password')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin">Home</a></li>
              <li class="breadcrumb-item active">{{__('Reset Password')}}</li>
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
                  <h3 class="card-title">{{__('Reset Password')}}</h3>
                @endif
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('password.update')}}" enctype="multipart/form-data">                
                @csrf
                <div class="card-body row">
                  <div class="form-group col-md-12">
                    @error('current_password') <label class="text-danger">* {{ $errors->first('current_password') }} </label>
                    @else
                    <label>{{__('Current Password')}}</label>
                    @enderror
                    <input type="password" class="form-control" value="" name="current_password">                    
                  </div>
                  <div class="form-group col-md-12">
                    @error('new_password') <label class="text-danger">* {{ $errors->first('new_password') }} </label>
                    @else
                    <label>{{__('New Password')}}</label>
                    @enderror
                    <input type="password" class="form-control" value="" name="new_password">                    
                  </div>
                  <div class="form-group col-md-12">
                    @error('new_confirm_password') <label class="text-danger">* {{ $errors->first('new_confirm_password') }} </label>
                    @else
                    <label>{{__('New Confirm Password')}}</label>
                    @enderror
                    <input type="password" class="form-control" value="" name="new_confirm_password">                    
                  </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{__('Update Password')}}</button>
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