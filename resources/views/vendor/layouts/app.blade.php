<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') | {{env('APP_NAME')}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{asset('admin/dist/css/bootstrap-tagsinput.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/sweetalert2/sweetalert2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">
  <!-- <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('ckeditor/adapters/jquery.js')}}"></script> -->
  <script src="{{asset('vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('vendor/includes/navbar')
  @include('vendor/includes/sidebar')

  @yield('content')

  <footer class="main-footer">
    <strong>Copyright &copy; {{ now()->year }} <a href="">{{env('APP_NAME')}}</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<script type="text/javascript" src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/dist/js/adminlte.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/dist/js/demo.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/dist/js/bootstrap-tagsinput.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/raphael/raphael.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/flot/jquery.flot.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/flot-old/jquery.flot.resize.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/flot-old/jquery.flot.pie.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
@yield('script')
@foreach (session('flash_notification', collect())->toArray() as $message)
    <script type="text/javascript">
        $(function() {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
             });
            Toast.fire({
              type: '{{ $message['level'] }}',
              title: '{{ $message['message'] }}'
            })
            console.log();
          });
      </script>
@endforeach

<script>
  $(function () {
    $('.select2').select2()
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    $('[data-mask]').inputmask()
    $('#reservation').daterangepicker()

    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })

    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    $('.duallistbox').bootstrapDualListbox()

    $('.my-colorpicker1').colorpicker()
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
