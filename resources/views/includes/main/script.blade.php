<script src="{{ url('main_page/libraries/jquery/jquery-3.5.1.min.js') }}"></script>
<script src="{{ url('main_page/libraries/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ url('main_page/libraries/retina/retina.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(session()->has('success_auth'))
        toastr.success('{{ session('success_auth') }}', 'Berhasil!')
    @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'Gagal!')
    @endif

</script>
