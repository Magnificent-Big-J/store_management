<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Product Bid</title>
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

@include('include_files.frontendHeader')

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Album example</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
            <p>
                <a href="#" class="btn btn-primary my-2">Main call to action</a>
                <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

           @yield('content')
        </div>
    </div>

</main>

@include('include_files.footer')



<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/holder.min.js')}}"></script>
</body>
</html>
