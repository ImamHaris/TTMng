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
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <!-- Icons Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/@mdi/css/materialdesignicons.min.css') }}" />
</head>

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
            <div>
                <button class="menu-btn btn btn-link btn-44">
                    <span class="icon material-icons">menu</span>
                </button>
            </div>
            <div>
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="" height="40" style="border-radius: 8px;">
                </a>
            </div>
            <div>
                <form class="form-inline search">
                    <input class="form-control w-100" type="text" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-link btn-44" type="submit"><span class="icon_search"></span></button>
                </form>
                <button class="btn btn-link search-btn" type="button"><span class="icon_search"></span></button>
                <a href="#" class=""><span class="avatar avatar-30"><img src="{{ $profilData['avatarTumb'] }}" alt=""></span></a>
            </div>
        </nav>
    </header>
    <!-- Fixed navbar ends -->

    <!-- sidebar -->
    <div class="sidebar">
        <div class="row no-gutters">
            <div class="col-auto align-self-center">
                <figure class="avatar avatar-50">
                    <img src="{{ $profilData['avatarTumb'] }}" alt="">
                </figure>
            </div>
            <div class="col pl-3 align-self-center">
                <p class="my-0">{{ $profilData['nickname'] }}</p>
                <p class="text-mute my-0 small">{{ '@'.$profilData['username'] }}</p>
            </div>
            <div class="col-auto align-self-center">
                <a href="{{ route('logout') }}" class="btn btn-link text-white p-2"><i class="material-icons">power_settings_new</i></a>
            </div>
        </div>
        <div class="list-group main-menu my-4">
            <a href="{{ route('home') }}" class="list-group-item list-group-item-action active"><i class="material-icons">home</i>Home</a>
            <a data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="list-group-item list-group-item-action"><i class="material-icons">account_circle</i>Following<span class="badge badge-dark text-white">{{ $profilData['following'] }}</span></a>
            <a data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="list-group-item list-group-item-action"><i class="material-icons">account_circle</i>Followers<span class="badge badge-dark text-white">{{ $profilData['follower'] }}</span></a>
        </div>
    </div>
    <!-- sidebar ends -->

    <!-- Begin page content -->
    <main class="flex-shrink-0 main-container pb-0">
        <!-- page content goes here -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="container mt-4" id="video-container">
                    <!-- Cards loaded via JS -->
                </div>
                <!-- Skeleton Loading Placeholder -->
                <div class="container mt-4" id="skeleton-loader" style="display:none;">
                    @for ($i = 0; $i < 1; $i++)
                        <div class="skeleton-card">
                            <div class="d-flex align-items-center mb-3">
                                <div class="skeleton avatar mr-2"></div>
                                <div>
                                    <div class="skeleton text-md"></div>
                                    <div class="skeleton text-sm"></div>
                                </div>
                            </div>
                            <div class="skeleton video"></div>
                            <div class="skeleton meta"></div>
                            <div class="skeleton button"></div>
                        </div>
                    @endfor
                </div>
                <div class="text-center my-3" id="no-more" style="display:none;">
                    <p class="text-muted">No more videos</p>
                </div>
            </div>
            <div class="tab-pane fade" id="search" role="tabpanel" aria-labelledby="search-tab">
                <div class="container-fluid pt-5 h-150 bg-default">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group">
                                <input type="text" class="form-control" id="username" placeholder="Search username...">
                                <div class="input-group-text">
                                    <button class="btn btn-sm btn-primary text-white" id="searchBtn" type="button">
                                        <i class="material-icons">search</i>
                                    </button>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div id="results-container" class="container mt-4">
                    <h6 class="page-subtitle">Results</h6>
                    <div id="results-grid" class="row grid">
                        <div class="col-12 text-center text-muted" id="results-placeholder">
                            🔍 Please enter a username to search TikTok videos.
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="favorite" role="tabpanel" aria-labelledby="favorite-tab">
                <div class="container">
                    <h5 class="page-subtitle">Activity</h5>
                </div>
                <div class="container-fluid px-0">
                    <div class="list-group list-group-flush my-0 w-100 border-top border-bottom" id="notification-list">
                        <!-- AJAX content goes here -->
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="position-relative overflow-hidden h-200">
                    <div class="background">
                        <img src="{{ asset('assets/img/ecommercecover.jpg') }}" alt="">
                    </div>
                </div>
                <div class="container top-100 text-center mb-4">
                    <figure class="avatar avatar-180 rounded-circle shadow  mx-auto">
                        <img src="{{ $profilData['avatarMD'] }}" alt="">
                    </figure>
                </div>
                <div class="container-fluid text-center">
                    <h4 class="my-0">{{ $profilData['nickname'] }}</h4>
                    <p class="text-mute my-0 small">{{ '@'.$profilData['username'] }}</p>
                    <p class="mt-2">{{ $profilData['desc'] }}</p>
                    <div class="row py-4  bg-white mt-4">
                        <div class="col">
                            <h4 class="mb-1">{{ $profilData['following'] }}</h4>
                            <a href="#" class="text-mute">Following</a>
                        </div>
                        <div class="col">
                            <h4 class="mb-1">{{ $profilData['follower'] }}</h4>
                            <a href="#" class="text-mute">Followers</a>
                        </div>
                        <div class="col">
                            <h4 class="mb-1">{{ $profilData['likes'] }}</h4>
                            <a href="#" class="text-mute">Likes</a>
                        </div>
                    </div>
                </div>
                <div class="container">
                </div>
            </div>
        </div>

        <div class="toast bottom-center position-fixed mb-5" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
            <div class="toast-header">
                <div class="avatar avatar-20 mr-2">
                    <div class="background">
                        <img src="{{ $profilData['avatarTumb'] }}" class="rounded mr-2" alt="...">
                    </div>
                </div>
                <strong class="mr-auto">{{ $profilData['nickname'] }}</strong>
                <small>Just now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Hello, Welcome to our website.
            </div>
        </div>
    </main>
    <!-- End of page content -->

    <!-- Footer -->
    <footer class="footer mt-auto py-3">
        <div class="container section-100">
            <img src="{{ asset('assets/img/logo/logo.png') }}" alt="" height="40" style="border-radius: 8px;">
            <p class="text-mute mt-4">Get Your Favorite Video on TikTok Offline</p>
        </div>
        <hr class="mt-0">
    </footer>
    <!-- Footer ends -->

    <!-- sticky footer tabs -->
    <div class="footer-tabs border-top text-center">
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                    <i class="material-icons">home</i>
                    <small class="sr-only">Home</small>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="search-tab" data-toggle="tab" href="#search" role="tab" aria-controls="search" aria-selected="false">
                    <i class="material-icons">search</i>
                    <small class="sr-only">search</small>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="favorite-tab" data-toggle="tab" href="#favorite" role="tab" aria-controls="favorite" aria-selected="false">
                    <i class="material-icons">notifications</i>
                    <small class="sr-only">Notification</small>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                    <i class="material-icons">person</i>
                    <small class="sr-only">Profile</small>
                </a>
            </li>
        </ul>
    </div>
    <!-- sticky footer tabs ends -->


    <!-- scroll to top button -->
    <button type="button" class="btn btn-default default-shadow scrollup bottom-right position-fixed btn-44"><span class="arrow_carrot-up"></span></button>
    <!-- scroll to top button ends-->

    <!-- Color settings -->
    <button type="button" class="btn btn-light shadow-sm colorsettings bottom-right"><span class="icon_cog"></span></button>
    <div class="sidebar-right">
        <div class="card h-100 border-0 rounded-0">
            <div class="card-body">
                <div class="selectoption">
                    <input type="checkbox" id="roundlayout" name="layoutround">
                    <label for="roundlayout">Round</label>
                </div>
                <div class="selectoption mb-0">
                    <input type="checkbox" id="rtllayout" name="layoutrtl">
                    <label for="rtllayout">RTL</label>
                </div>
                <hr>
                <div class="colorselect">
                    <input type="radio" id="templatecolor1" name="sidebarcolorselect">
                    <label for="templatecolor1" class="bg-dark-blue" data-title="dark-blue"></label>
                </div>
                <div class="colorselect">
                    <input type="radio" id="templatecolor9" name="sidebarcolorselect">
                    <label for="templatecolor9" class="bg-purple" data-title="purple"></label>
                </div>
            </div>
        </div>
    </div>
    <!-- color settings ends -->

    <!-- Required jquery and libraries -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-4.4.1/js/bootstrap.min.js') }}"></script>

    <!-- cookie css -->
    <script src="{{ asset('assets/vendor/cookie/jquery.cookie.js') }}"></script>

    <!-- Swiper slider  -->
    <script src="{{ asset('assets/vendor/swiper/js/swiper.min.js') }}"></script>

    <!-- Masonry js -->
    <script src="{{ asset('assets/vendor/masonry/masonry.pkgd.min.js') }}"></script>

    <!-- Customized jquery file  -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/color-scheme-demo.js') }}"></script>

    <script>
        "use strict"
        $(document).ready(function() {
            /* Swiper slider */
            var swiper = new Swiper('.swiper-stories', {
                slidesPerView: 'auto',
                spaceBetween: 0,
                pagination: false,
            });

            /* masonry js */
            $('#search-tab[data-toggle="tab"]').on('shown.bs.tab', function(e) {

                $('.grid').masonry({
                    // use outer width of grid-sizer for columnWidth
                    columnWidth: '.grid-sizer',
                    // do not use .grid-sizer in layout
                    itemSelector: '.grid-item',
                    percentPosition: true,
                    gutter: 0
                });

                var swiper = new Swiper('.swiper-stories2', {
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    pagination: false,
                });
                var swiper = new Swiper('.swiper-people', {
                    slidesPerView: 'auto',
                    spaceBetween: 20,
                    pagination: false,
                });
                var swiper = new Swiper('.swiper-stories3', {
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    pagination: false,
                });
            })

            /* status */
            function start() {
                var duration = 4000; // it should finish in 3 seconds !
                $(".statusbar").stop().css("width", 0).animate({
                    width: '100%'
                }, {
                    duration: duration,
                });

                setTimeout(function() {
                    $('#statusmodal').modal('hide');
                    $(".statusbar").stop()
                    $(".statusbar").css("width", '0');
                }, duration)
            }
            $('#statusmodal').on('shown.bs.modal', function(e) {
                start()
            });
            $('#statusmodal').on('hide.bs.modal', function(e) {
                $(".statusbar").stop().css("width", '0');
            });
            
            /* toast message */
            setTimeout(function() {
                $('.toast').toast('show')
            },4000);
        });

    </script>

    <script>
        const listAccount = @json($listAccount);
        let page = 0;
        let loading = false;
        let hasMore = true;
        let perPage = 1;

        function loadMore() {
            if (loading || !hasMore) return;
            loading = true;
            $('#skeleton-loader').show();

            // Get unique_id for current page
            const sliced = listAccount.slice(page * perPage, (page + 1) * perPage);

            if (sliced.length === 0) {
                hasMore = false;
                $('#no-more').show();
                return;
            }

            $.ajax({
                url: "{{ route('getHomeData') }}",
                type: "GET",
                data: { unique_id: sliced[0] },
                success: function(response) {
                    $('#video-container').append(response.html);
                    hasMore = response.hasMore;
                    if (!hasMore) $('#no-more').show();
                    page++;
                },
                complete: function() {
                    $('#skeleton-loader').hide();
                    loading = false;
                },
                error: function() {
                    console.error('Failed to load videos.');
                }
            });
        }

        $(window).on('scroll', function() {
            if ($(window).scrollTop() + $(window).height() + 100 >= $(document).height()) {
                loadMore();
            }
        });

        loadMore(); // Initial load
    </script>


    <script>
        $('#searchBtn').on('click', function () {
            const username = $('#username').val().trim();

            $('#results-grid').html(`
                <div class="col-12 text-center text-muted">⏳ Loading...</div>
            `);

            if (!username) {
                $('#results-grid').html(`
                    <div class="col-12 text-center text-danger">❌ Please enter a username.</div>
                `);
                return;
            }

            $.ajax({
                url: '{{ route('find') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    username: username
                },
                success: function (response) {
                    if (response.results.length === 0) {
                        $('#results-grid').html(`
                            <div class="col-12 text-center text-warning">🙁 No videos found.</div>
                        `);
                        return;
                    }

                    let html = '';
                    response.results.forEach(function (video) {
                        let encoded = video.encodedUrl;
                        let username = video.username;

                        let downloadUrl = `{{ route('downloadVideo', ['encodedUrl' => '__ENCODED__', 'username' => '__USERNAME__']) }}`
                            .replace('__ENCODED__', encoded)
                            .replace('__USERNAME__', username);

                        html += `
                            <div class="grid-item col-6 col-md-4">
                                <div class="card mb-4 position-relative overflow-hidden text-white">
                                    <div class="background">
                                        <div class="video-wrapper">
                                            <video autoplay muted loop playsinline controls>
                                                <source src="${video.url}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                    <div class="card-header border-0 bg-none">
                                        <div class="media">
                                            <form action="${downloadUrl}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">
                                                    <i class="mdi mdi-download"></i> Download
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-footer border-0 z-1">
                                        <div class="media">
                                            <figure class="avatar avatar-40 mr-2">
                                                <img src="${video.avatar}" alt="Profile">
                                            </figure>
                                            <div class="media-body">
                                                <h6 class="mb-1">${video.nickname}</h6>
                                                <p class="mb-0 text-mute small">${video.username}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    $('#results-grid').html(html);
                },
                error: function () {
                    $('#results-grid').html(`
                        <div class="col-12 text-center text-danger">⚠️ Failed to fetch data.</div>
                    `);
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#favorite-tab').on('click', function () {
                const container = $('#notification-list');
                container.html('<div class="text-center my-3 text-muted">Loading...</div>');
        
                $.ajax({
                    url: '{{ route("notifications.latest") }}',
                    type: 'GET',
                    success: function (data) {
                        container.html(data);
                    },
                    error: function () {
                        container.html('<div class="text-center my-3 text-danger">Failed to load notifications.</div>');
                    }
                });
            });
        });
    </script>
    
</body>


</html>
