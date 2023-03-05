<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Teacher Dashboard </title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('fonts\B691-Deco Regular.ttf') }}">
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet'>


        <link rel="stylesheet" href="{{ asset('vendor/megaphone/css/megaphone.css') }}">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
        @yield('style')
    </head>

    <body id="page-top">
        <div id="wrapper">

            <!-- side navigation bar -->
            <nav class="navbar  navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">

                <div class="container-fluid  d-flex flex-column p-0">


                    <hr class="sidebar-divider my-0">
                    <ul class="navbar-nav text-light" id="accordionSidebar">
                        <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}"><span>Dashboard</span></a></li>

                        

                    </ul>
                    <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
                </div>
            </nav>



            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                            <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group"></div>
                            </form>
                            <ul class="navbar-nav flex-nowrap ms-auto">


                                <li class="nav-item dropdown no-arrow mx-1">

                                </li>
                                <div class="d-none d-sm-block topbar-divider"></div>
                                <li class="nav-item dropdown no-arrow">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">{{ Auth::user()->name }}</span></a>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i></a>
                                            <a class="dropdown-item" href="" method="Post" >

                                                {{ Auth::user()->name }}

                                            </a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                                          <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            <footer class="bg-white sticky-footer"></footer>
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>


    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js//theme.js') }}" ></script>

</body>

</html>
