@extends('admin.layouts.app')

  @section('title')
    Manage Subcategories
  @endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('Manage Subcategories')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{route('subcategory.create')}}" class="btn btn-primary">{{__('Add New Subcategory')}}</a>
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
                    <h3 class="card-title">{{__('Manage Subcategories')}}</h3>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body row">
              <table id="" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Category</th>
                  <th>Name</th>                  
                  <th>Slug</th>
                  <th>Total Products</th>
                  <th>Updated Date</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subcategories as $key=>$subcategory)
                <tr>
                  <td>{{$key+1}}</td>                  
                  <td>{{$subcategory->category->name}}</td>
                 <td>
                    @if($subcategory->trashed())
                      <a class="text-danger">{{$subcategory->name}}</a> 
                    @else
                      <a>{{$subcategory->name}}</a>  
                    @endif                    
                  </td>
                  <td>{{$subcategory->slug}}</td>
                  <td>{{count(App\Product::whereSubcategoryId($subcategory->id)->get())}}</td>
                  <td>{{ \Carbon\Carbon::parse($subcategory->updated_at)->format('jS F Y')}}</td>
                  <td>
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          Action
                        </button>
                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);">
                          @if($subcategory->trashed())
                             <li class="dropdown-item"><a href="{{route('subcategory.restore',encrypt($subcategory->id))}}">{{__('Restore Subcategory')}}</a></li>
                          @else
                             <li class="dropdown-item"><a href="{{route('subcategory.edit',encrypt($subcategory->id))}}">{{__('Edit Subcategory')}}</a></li>
                             <li class="dropdown-item"><a onclick="confirm_modal('{{route('subcategory.delete',encrypt($subcategory->id))}}')">{{__('Delete Subcategory')}}</a></li>
                          @endif
                        </ul>
                    </div>
                  </td>
                </tr> 
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Category</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Total Products</th>
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
                      {{ $subcategories->links() }}
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
            </div>

            <div class="modal-body">
                <p>{{__('Do you want delete Subcategory ?')}}</p>
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