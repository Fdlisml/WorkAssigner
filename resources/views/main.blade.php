<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('css/' . session('role') . '/style.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    @php
        $page = '';
        if (Str::startsWith(Request::path(), 'karyawan/')) {
            $page = 'Karyawan';
        } elseif (Str::startsWith(Request::path(), 'admin/')) {
            $page = 'Admin';
        }
    @endphp
    <div class="container">
        @include('partials.navigation' . $page)
        <div class="main">
            <div class="secMain">
                @include('partials.topbar')
                @if (Str::startsWith(Request::path(), 'karyawan/'))
                    @include('partials.cardBox')
                @endif
                @yield('content')
            </div>
        </div>
        @include('partials.loader')
</body>
@include('partials.script' . $page)

</html>
