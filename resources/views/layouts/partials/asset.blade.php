<!-- Default -->

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="{{ url('img/logo_saka_milenial.png') }}">
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])

<!-- ./Default -->

<!-- SB Admin 2 -->

<!-- Custom fonts for this template-->
<link href="{{ asset('sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="{{ asset('sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

<!-- ---------- -->

<script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>

<script src="{{ asset('js/sweetalert2@11.js') }}"></script>

{{-- <!-- Bootstrap core JavaScript-->
<script src="{{ asset('sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('sb-admin-2/js/sb-admin-2.min.js') }}"></script> --}}

<!-- Page level plugins -->
{{-- <script src="{{ asset('sb-admin-2/vendor/chart.js/Chart.min.js') }}"></script> --}}

<!-- Page level custom scripts -->
{{-- <script src="{{ asset('sb-admin-2/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('sb-admin-2/js/demo/chart-pie-demo.js') }}"></script> --}}

<!-- ./SB Admin 2 -->
