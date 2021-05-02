@extends('admin.layouts.app')

  @section('title')
    Manage Banner
  @endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('Manage Banner')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{route('banner.create')}}" class="btn btn-primary">{{__('Add New Banner')}}</a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @else
                    <h3 class="card-title">{{__('Manage Banner')}}</h3>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body row">
              <table id="" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Banner</th>
                  <th>Heading</th>                  
                  <th>Link/URL</th>                  
                  <th>Updated Date</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banners as $key=>$banner)
                <tr>
                  <td>{{$key+1}}</td>
                  <td><img src="{{asset('public/uploads/banner')}}/{{$banner->image}}" width="210"></td>
                  <td>{{$banner->heading}}</td>
                  <td>{{$banner->link}}</td>
                  <td>{{ \Carbon\Carbon::parse($banner->updated_at)->format('jS F Y')}}</td>
                  <td>
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          Action
                        </button>
                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);">
                          <li class="dropdown-item"><a href="{{route('banner.edit',encrypt($banner->id))}}">{{__('Edit Banner')}}</a></li>
                          <li class="dropdown-item"><a onclick="confirm_modal('{{route('banner.delete',encrypt($banner->id))}}')">{{__('Delete Banner')}}</a></li>
                        </ul>
                    </div>
                  </td>
                </tr> 
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Banner</th>
                  <th>Heading</th>                  
                  <th>Banner Type</th>                  
                  <th>Updated Date</th>
                  <th>Option</th>
                </tr>
                </tfoot>
              </table>              
            </div>
              <div class="row">
                <div class="col-sm-12 col-md-5">
                  <div class="dataTables_info" id="example1_info" role="status" aria-live="polite"></div>
                </div>
                <div class="col-sm-12 col-md-7">
                  <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                    <ul class="pagination">
                      {{ $banners->links() }}
                    </ul>
                  </div>
                </div>
              </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Order Modal -->

<div class="modal fade" id="quiz_details">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Quiz Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="quiz-details-modal-body">
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-primary float-right" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
                <h4 class="modal-title" id="myModalLabel">{{__('Confirmation')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div class="modal-body">
                <p>{{__('Do you want delete banner ?')}}</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Cancel')}}</button>
                <a id="delete_link" class="btn btn-danger btn-ok">{{__('Delete')}}</a>
            </div>
        </div>
    </div>
</div>
    <!-- /.modal -->
@endsection
@section('script')
   <script type="text/javascript">
        function confirm_modal(delete_url)
        {
            jQuery('#confirm-delete').modal('show', {backdrop: 'static'});
            document.getElementById('delete_link').setAttribute('href' , delete_url);
        }
   </script> 
@endsection