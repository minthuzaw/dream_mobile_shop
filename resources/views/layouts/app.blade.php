<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
                <!-- Font Awesome -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css"
        rel="stylesheet"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    </head>

    <body class="font-sans antialiased">
        <div class="page-wrapper chiller-theme">
            
            <x-side-nav />
            <div class="app-bar">
                <div class="d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="d-flex justify-content-md-between justify-content-sm-between">
                            <a id="show-sidebar" href="#">
                                <i class="fas fa-bars"></i>
                              </a>
                            @yield('title')
                            <a href=""></a>
                        </div>
                    </div>
                </div>
            </div>

            <main class="p-4">
                <div class="d-flex justify-content-center">
                    <div class="col-md-8">
                        {{ $slot }}
                    </div>
                </div>
            </main>
            
            <div class="bottom-bar">
                <div class="d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="d-flex justify-content-between">
                            <a href="">
                                <i class="fas fa-home"></i>
                                <p class="mb-0">Home</p>
                            </a>
                            <a href="">
                                <i class="fas fa-home"></i>
                                <p class="mb-0">Home</p>
                            </a>
                            <a href="">
                                <i class="fas fa-home"></i>
                                <p class="mb-0">Home</p>
                            </a>
                            <a href="">
                                <i class="fas fa-home"></i>
                                <p class="mb-0">Home</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div> 
          </div>

        <!-- MDB -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

        <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"
        ></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
        </script>

        <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js">

        </script>
        


        <script>
            jQuery(function ($) {

            $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if ( $(this).parent().hasClass("active")) 
            {
                $(".sidebar-dropdown").removeClass("active");
                $(this).parent().removeClass("active");
            }else {
                $(".sidebar-dropdown").removeClass("active");
                $(this).next(".sidebar-submenu").slideDown(200);
                $(this).parent().addClass("active");
            }

            });

            $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
            });
            $("#show-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
            });
});
        </script>

        @yield('scripts')
    </body>
</html>
