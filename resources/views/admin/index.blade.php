<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet"> --}}
    <link href="{{asset('admin/main/app.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/Toast.css')}}" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="{{asset('admin/scripts/jquery-3.1.1.min.js')}}"></script>
    @yield('css')
</head>
<body>
    @include('admin.partials.header')
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                @yield('content')
            </div>
        </div>
    </div>
    @include('admin.partials.footer')

    <script src="{{asset('admin/scripts/popper.min.js')}}"></script>
    <script src="{{asset('admin/scripts/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/scripts/highlight.pack.js')}}"></script>
    <script src="{{asset('admin/scripts/app.js')}}"></script>
    <script src="{{asset('admin/scripts/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/main/app.js')}}"></script>
    <script src="{{asset('js/Toast.js')}}"></script>
    @yield('js')
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
</body>
</html>
