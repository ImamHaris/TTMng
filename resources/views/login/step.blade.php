<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="TikTok Download Manager - Get Video You Interest Offline.">
        <meta name="author" content="TTDM">
    
        <title>TikTok Download Manager - Get Video You Interest Offline</title>
    
        <!-- Favicons -->
        <link rel="apple-touch-icon" href="{{ asset('assets/img/favicons/apple-touch-icon.html') }}" sizes="180x180">
        <link rel="mask-icon" href="{{ asset('assets/img/favicons/safari-pinned-tab.html') }}" color="#ffffff">
        <link rel="icon" href="{{ asset('assets/img/logo/logo-icon.png') }}" type="image/png">
    
        <!-- Elegant font icons -->
        <link href="{{ asset('assets/vendor/elegant_font/HTMLCSS/style.css') }}" rel="stylesheet">
    
        <!-- Elegant font icons -->
        <link href="{{ asset('assets/vendor/materializeicon/material-icons.css') }}" rel="stylesheet">
    
        <!-- Swiper Slider -->
        <link href="{{ asset('assets/vendor/swiper/css/swiper.min.css') }}" rel="stylesheet">
    
        <!-- Custom styles for this template -->
        <link href="{{ asset('assets/css/style-dark-blue.css') }}" rel="stylesheet" id="style">
    
        <!-- Icons Css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/@mdi/css/materialdesignicons.min.css') }}" />
    </head>

    <!-- Loading -->
    @include('layouts.loading')
    
    <body class="ui-rounded">
        <!-- Page laoder -->
        <div class="container-fluid pageloader">
            <div class="row h-100">
                <div class="col-12 align-self-start text-center">
                </div>
                <div class="col-12 align-self-center text-center">
                    <div class="loader-logo">
                        <img src="{{ asset('assets/img/logo/logo.png') }}" alt="" height="40" style="border-radius: 8px;">
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
                <div></div>
                <div>
                    <a class="navbar-brand" href="{{ route('login') }}">
                        <img src="{{ asset('assets/img/logo/logo.png') }}" alt="" height="40" style="border-radius: 8px;">
                    </a>
                </div>
                <div></div>
            </nav>
        </header>
        <!-- Fixed navbar ends -->

        <!-- Begin page content -->
        <main class="flex-shrink-0 main-container">
            <!-- page content goes here -->
            <div class="banner-hero vh-100 scroll-y bg-default">
                <div class="background opacity-20" >
                    <img src="assets/img/team6.jpg" alt="">
                </div>
                <div class="container h-100 text-white">
                    <div class="row h-100 h-sm-auto">
                        <div class="col-12 col-md-8 col-lg-5 col-xl-4 mx-auto align-self-center text-center">
                            <h6 class="font-weight-light mb-5">We Send Verification Code,</h6>

                            <form class="formLoad" action="{{ route('verifStore') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="first_col" value="{{ $first_col }}">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg border-0" name="code" placeholder="Input Verification Code.." required>
                                </div>
                                <div class="mb-4 mt-5">
                                    <button class="btn btn-lg btn-primary text-white default-shadow btn-block" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        @if (session('success') || session('fail') || session('info') || session('warning') || count($errors)>0)
            <div class="toast bottom-center position-fixed mb-5" role="alert" aria-live="assertive" aria-atomic="true">
                @if (session('success'))
                    <div class="toast-header bg-success text-white">
                        <div class="row w-100">
                            <div class="col-6 d-flex align-items-center">
                                <span class="badge bg-white text-primary"><i class="mdi mdi-check-all label-icon"></i></span>&nbsp;
                                <strong class="me-auto">Success</strong>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="toast-body">{{ session('success') }}</div>
                @endif
                @if (session('fail'))
                    <div class="toast-header bg-danger text-white">
                        <div class="row w-100">
                            <div class="col-6 d-flex align-items-center">
                                <span class="badge bg-white text-primary"><i class="mdi mdi-check-all label-icon"></i></span>&nbsp;
                                <strong class="me-auto">Fail</strong>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="toast-body">{{ session('fail') }}</div>
                @endif
                @if (session('info'))
                    <div class="toast-header bg-info text-white">
                        <div class="row w-100">
                            <div class="col-6 d-flex align-items-center">
                                <span class="badge bg-white text-primary"><i class="mdi mdi-check-all label-icon"></i></span>&nbsp;
                                <strong class="me-auto">Info</strong>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="toast-body">{{ session('info') }}</div>
                @endif
                @if (session('warning'))
                    <div class="toast-header bg-warning text-white">
                        <div class="row w-100">
                            <div class="col-6 d-flex align-items-center">
                                <span class="badge bg-white text-primary"><i class="mdi mdi-check-all label-icon"></i></span>&nbsp;
                                <strong class="me-auto">Warning</strong>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="toast-body">{{ session('warning') }}</div>
                @endif
                @if (count($errors)>0)
                    <div class="toast-header bg-warning text-white">
                        <div class="row w-100">
                            <div class="col-6 d-flex align-items-center">
                                <span class="badge bg-white text-primary"><i class="mdi mdi-check-all label-icon"></i></span>&nbsp;
                                <strong class="me-auto">Failed</strong>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="toast-body">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @endif

        <!-- End of page content -->
        
        <!-- Required jquery and libraries -->
        <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap-4.4.1/js/bootstrap.min.js') }}"></script>

        <!-- cookie css -->
        <script src="{{ asset('assets/vendor/cookie/jquery.cookie.js') }}"></script>

        <!-- Swiper slider  -->
        <script src="{{ asset('assets/vendor/swiper/js/swiper.min.js') }}"></script>

        <!-- Customized jquery file  -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/color-scheme-demo.js') }}"></script>

        <script src="{{ asset('assets/js/formLoad.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('.toast').toast({
                    autohide: false
                }).toast('show');
            });
        </script>
    </body>
</html>
