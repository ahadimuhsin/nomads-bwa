
  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('admin_page/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('admin_page/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ url('admin_page/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('admin_page/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ url('admin_page/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ url('admin_page/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ url('admin_page/js/demo/chart-pie-demo.js') }}"></script>

  {{-- CKEditor --}}
<script src="//cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
  {{-- Gijgo Script for datepicker --}}
<script src="{{ url('main_page/libraries/gijgo/js/gijgo.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="{{ url('main_page/images/ic_doe.jpg') }}">',
            }
        });
    });

    @if(session()->has('success'))
        toastr.success('{{ session('success') }}', 'Berhasil!')
    @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'Gagal!')
    @endif
    </script>

