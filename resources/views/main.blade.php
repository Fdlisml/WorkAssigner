<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    {{-- <link rel="stylesheet" href="{{ asset('css/user/' . $slug . '.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
</head>

<body>
    <div class="container">
        @include('partials.navigationAdmin')
        <div class="main">
            <div class="secMain">
                @include('partials.topbar')
                {{-- @include('partials.cardBox') --}}
                @yield('content')
            </div>
        </div>
        @include('partials.loader')
</body>
@include('partials.scriptAdmin')

</html>
