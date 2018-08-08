<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Store Management Dashboard</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/noty.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nest.css') }}" rel="stylesheet">
    <link href="{{ asset('css/metroui.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/noty.js') }}"></script>
    <script src="{{ asset('js/feather.js') }}"></script>
</head>

<body>
@include('include_files.header')

<div class="container-fluid">
    <div class="row">
        @include('include_files.sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('content')
        </main>
    </div>
</div>


<script src="{{asset('js/popper.min.js')}}"></script>
<!-- Icons -->
<script>
    feather.replace()
</script>
@yield('scripts')
</body>
</html>
