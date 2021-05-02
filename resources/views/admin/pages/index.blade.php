@extends('admin.layouts.app')
@section('title') Pages @endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('Manage Pages')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{route('page.create')}}" class="btn btn-primary">{{__('Add Page')}}</a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
                @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @else
                    <h3 class="card-title">{{__('Manage Pages')}}</h3>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Page Name</th>
                  <th>Meta Title</th>
                  <th>Meta Descripotion</th>
                  <th>Page URL</th>
                  <th>Page Details</th>
                  <th>Last Update</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $key => $page)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$page->name}}</td>
                  <td>{{$page->meta_title}}</td>
                  <td>{{Str::words($page->meta_description,20)}}</td>
                  <td>{{$page->slug}}</td>
                  <td>{{strip_tags(Str::words($page->description,50))}}</td>
                  <td>{{$page->updated_at->diffForHumans()}}</td>
                  <td>
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          Action
                        </button>
                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);">
                          <li class="dropdown-item"><a href="{{route('page.edit',encrypt($page->id))}}">{{__('Edit Page')}}</a></li> 
                        </ul>
                    </div>
                  </td>
                </tr>
                @endforeach                
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Page Name</th>
                  <th>Meta Title</th>
                  <th>Meta Descripotion</th>
                  <th>Page URL</th>
                  <th>Page Details</th>
                  <th>Last Update</th>
                  <th>Option</th>
                </tr>
                </tfoot>
              </table>
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

 <script type="text/javascript">
        function confirm_modal(delete_url)
        {
            jQuery('#confirm-delete').modal('show', {backdrop: 'static'});
            document.getElementById('delete_link').setAttribute('href' , delete_url);
        }
</script>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{__('Confirmation')}}</h4>
            </div>

            <div class="modal-body">
                <p>{{__('Delete confirmation message')}}</p>
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
