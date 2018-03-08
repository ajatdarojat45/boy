<!DOCTYPE html>
<html>

<head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>@yield('title')</title>

   <link href="{{asset('inspinia/css/bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('inspinia/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
   {{-- gallery --}}
   <link href="{{asset('inspinia/css/plugins/blueimp/css/blueimp-gallery.min.css')}}" rel="stylesheet">
   {{--  --}}
   <link href="{{asset('inspinia/css/animate.css')}}" rel="stylesheet">
   <link href="{{asset('inspinia/css/style.css')}}" rel="stylesheet">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('datatables/dataTables.bootstrap.css') }}">
   {{-- autocomplete --}}
   <link rel="stylesheet" type="text/css" href="">
   <link href="{{ asset('autocomplete/jquery.ui.autocomplete.css') }}" rel="stylesheet">
   {{-- summernote --}}
   <link href="{{asset('inspinia/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
   <link href="{{asset('inspinia/css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
   <!-- Sweet Alert -->
   <link href="{{ asset('inspinia/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
</head>

<body class="gray-bg">
   @yield('content')
   <br><br>
   <div class="text-center">
      <div>
         <strong>Copyright</strong>  &copy; Yosef Almeida Boy 2018 | Powered by <a href="#">lazyCode</a>
      </div>
   </div>
   <br>
   <!-- Mainly scripts -->
   <script src="{{asset('inspinia/js/jquery-3.1.1.min.js')}} "></script>
   <script src="{{asset('inspinia/js/bootstrap.min.js')}}"></script>
   {{-- <script src="{{asset('inspinia/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
   <script src="{{asset('inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script> --}}
   <!-- Custom and plugin javascript -->
   <script src="{{asset('inspinia/js/inspinia.js')}}"></script>
   <script src="{{asset('inspinia/js/plugins/pace/pace.min.js')}}"></script>
   <!-- blueimp gallery -->
   <script src="{{asset('inspinia/js/plugins/blueimp/jquery.blueimp-gallery.min.js')}}"></script>
   <!-- DataTables -->
   <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('datatables/dataTables.bootstrap.min.js') }}"></script>
   <script>
      $(function () {
         $("#example1").DataTable();
         $("#example3").DataTable();
         $("#example4").DataTable();
         $("#example5").DataTable();
         $("#example6").DataTable();
         $("#example7").DataTable();
         $("#example8").DataTable();
         $("#example9").DataTable();
         $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
         });
     });
   </script>
   <!-- SUMMERNOTE -->
   <script src="{{asset('inspinia/js/plugins/summernote/summernote.min.js')}}"></script>
   <script>
      $(document).ready(function(){
         $('.summernote').summernote();
      });
   </script>
   <!-- Sweet alert -->
   <script src="{{ asset('inspinia/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
   <script>
     jQuery(document).ready(function($){
         $('.confirm').on('click',function(){
             var getLink = $(this).attr('href');
             swal({
                  title: "Are you sure?",
                  text: "do this action",
                  type: "warning",
                  html: true,
                  confirmButtonColor: '#d9534f',
                  showCancelButton: true,
                  },
                  function(){
                  window.location.href = getLink
                 });
             return false;
         });
     });
   </script>
   {{-- autocomplete --}}
   <script src="{{ asset('autocomplete/jquery-ui.min.js') }}"></script>
   {{-- <script type="text/javascript">
      src = "{{ route('desa/autoComplete') }}";
      $(function() {
         $("#search_text").autocomplete({
            source: src,
            minLength: 3,
            select: function( event, ui ) {
                $("#search_text").val(ui.item.value);
                $("#desa_id").val(ui.item.id);
            }
         });
      });
   </script> --}}
</body>

</html>
