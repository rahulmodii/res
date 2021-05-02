@extends('admin.layouts.app')

  @section('title','Manage Restaurant')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

            </ol>
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
          <div class="card">
            <div class="card-header">
                @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @else
                  <ol class="float-sm-left">
                        <a href="{{route('restaurant.create')}}" class="btn btn-primary">{{__('Add New Restaurant')}}</a>
                  </ol>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body row">
              <table id="" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Restaurant Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Register Date</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($restaurants as $key=>$restaurant)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{ $restaurant->restaurant_name }}</td>
                  <td>{{ $restaurant->user->mobile }}</td>
                  <td>{{ $restaurant->user->email }}</td>
                  <td>{{$restaurant->restaurant_address}}</td>
                  <td>{{ \Carbon\Carbon::parse($restaurant->updated_at)->format('jS F Y')}}</td>
                  <td>
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          Action
                        </button>
                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);">

                             <li class="dropdown-item"><a onclick="confirm_modal('{{route('restaurant.delete',encrypt($restaurant->id))}}')">{{__('Delete Restaurant')}}</a></li>

                        </ul>
                    </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Restaurant Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Address</th>
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
                      {{ $restaurants->links() }}
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
                    <p>{{__('Do you want delete Product ?')}}</p>
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

@endsection
