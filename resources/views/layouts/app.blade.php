<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Favicon-->
        <link rel="icon" href="{{ asset('asset/images/logo.png') }}" type="image/x-icon">

        {{-- Toaster Style --}}
        <link rel="stylesheet" href="{{ asset('asset/plugins/Toastr/css/toastr.css') }}">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/980ae3f9ab.js" crossorigin="anonymous"></script>

        @stack('include-css')

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('asset/css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/loginModal.css') }}">


        <style>
            .tooltip {
                font-size: 12px;
            }

        </style>
    </head>

    <body>

        <!-- Header -->
        @yield('header')
        <!-- #Header -->

        @yield('content')

        <!--Footer -->
        @yield('footer')
        <!-- #END# Footer -->

        @include('includes.modal')


        @stack('include-js')

        {{-- Toaster Script --}}
        <script src="{{ asset('asset/plugins/Toastr/js/toastr.min.js') }}"></script>
        <script src="{{ asset('asset/plugins/Loading-Overlay/js/loadingoverlay.min.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            @if(Session::has('success'))
                toastr["success"]('{{ Session::get('success') }}');
            @endif

            @if(Session::has('error'))
                toastr["error"]('{{ Session::get('error') }}');
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr["error"]('{{ $error }}');
                @endforeach
            @endif

            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
            // $.LoadingOverlay("show");
            // setTimeout(function(){
            //     $.LoadingOverlay("hide");
            // }, 3000);
        </script>

    </body>

</html>
