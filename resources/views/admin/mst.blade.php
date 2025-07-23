
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="TikTok Download Manager - Get Video You Interest Offline.">
    <meta name="author" content="TTDM">

    <title>TikTok Download Manager - Get Video You Interest Offline</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('public/assets/img/favicons/apple-touch-icon.html') }}" sizes="180x180">
    <link rel="mask-icon" href="{{ asset('public/assets/img/favicons/safari-pinned-tab.html') }}" color="#ffffff">
    <link rel="icon" href="{{ asset('public/assets/img/logo/logo-icon.png') }}" type="image/png">

    <!-- Elegant font icons -->
    <link href="{{ asset('public/assets/vendor/elegant_font/HTMLCSS/style.css') }}" rel="stylesheet">

    <!-- Elegant font icons -->
    <link href="{{ asset('public/assets/vendor/materializeicon/material-icons.css') }}" rel="stylesheet">

    <!-- Swiper Slider -->
    <link href="{{ asset('public/assets/vendor/swiper/css/swiper.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('public/assets/css/style-dark-blue.css') }}" rel="stylesheet" id="style">
    <link href="{{ asset('public/assets/css/custom.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />

    <!-- Icons Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/libs/@mdi/css/materialdesignicons.min.css') }}" />
</head>

<body class="ui-rounded">
    <!-- Page laoder -->
    <div class="container-fluid pageloader">
        <div class="row h-100">
            <div class="col-12 align-self-start text-center">
            </div>
            <div class="col-12 align-self-center text-center">
                <div class="loader-logo">
                    <img src="{{ asset('public/assets/img/logo/logo.png') }}" alt="" height="40" style="border-radius: 8px;">
                </div>
            </div>
            <div class="col-12 align-self-end text-center">
                <p class="my-5">Please wait<br><small class="text-mute">download manager is loading...</small></p>
            </div>
        </div>
    </div>
    <!-- Page laoder ends -->

    <!-- Fixed navbar -->
    <header class="header fixed-top header-fill">
        <nav class="navbar">
            <div>
                <button class="menu-btn btn btn-link btn-44">
                    <span class="icon material-icons">menu</span>
                </button>
            </div>
            <div>
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('public/assets/img/logo/logo.png') }}" alt="" height="40" style="border-radius: 8px;">
                </a>
            </div>
            <div>
                <form class="form-inline search">
                    <input class="form-control w-100" type="text" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-link btn-44" type="submit"><span class="icon_search"></span></button>
                </form>
                <button class="btn btn-link search-btn" type="button"><span class="icon_search"></span></button>
            </div>
        </nav>
    </header>
    <!-- Fixed navbar ends -->

    <!-- sidebar -->
    <div class="sidebar">
        <div class="list-group main-menu my-4">
            <a href="{{ route('listUser') }}" class="list-group-item list-group-item-action {{ request()->is('admin/user*') ? 'active' : '' }}">User</a>
            <a href="{{ route('listHomeFyp') }}" class="list-group-item list-group-item-action {{ request()->is('admin/homefyp*') ? 'active' : '' }}">Home FYP</a>
        </div>
    </div>
    <!-- sidebar ends -->

    <!-- Begin page content -->
    <main class="flex-shrink-0 main-container pb-0">
        <div class="tab-content">
            @yield('konten')
        </div>
    </main>
    <!-- End of page content -->

    <!-- Required jquery and libraries -->
    <script src="{{ asset('public/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/bootstrap-4.4.1/js/bootstrap.min.js') }}"></script>

    <!-- cookie css -->
    <script src="{{ asset('public/assets/vendor/cookie/jquery.cookie.js') }}"></script>

    <!-- Swiper slider  -->
    <script src="{{ asset('public/assets/vendor/swiper/js/swiper.min.js') }}"></script>

    <!-- Masonry js -->
    <script src="{{ asset('public/assets/vendor/masonry/masonry.pkgd.min.js') }}"></script>

    <!-- Customized jquery file  -->
    <script src="{{ asset('public/assets/js/main.js') }}"></script>
    <script src="{{ asset('public/assets/js/color-scheme-demo.js') }}"></script>
    
    <script src="{{ asset('public/assets/js/formLoad.js') }}"></script>

    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                searching: false,
                lengthChange: false
            });
        } );
    </script>
</body>
</html>
