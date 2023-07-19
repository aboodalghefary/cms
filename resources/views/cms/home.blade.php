@php
    $lang = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
@endphp
<!DOCTYPE html>
<html dir="{{ $lang }}">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>لوحة التحكم - الرئيسية</title>

    <link href="{{ asset('cms/assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('cms/assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
    @if ($lang == 'rtl')
        <link href="{{ asset('cms/assets/css/rtl/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
        <link href="{{ asset('cms/assets/css/rtl/bootstrap_limitless.min.css') }}" id="stylesheet" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('cms/assets/css/rtl/bootstrap.min.css') }}" id="stylesheet" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('cms/assets/css/rtl/components.min.css') }}" id="stylesheet" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('cms/assets/css/rtl/layout.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
    @else
        <link href="{{ asset('cms/assets/css/ltr/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
        <link href="{{ asset('cms/assets/css/ltr/bootstrap.min.css') }}" id="stylesheet" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('cms/assets/css/ltr/bootstrap_limitless.min.css') }}" id="stylesheet" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('cms/assets/css/ltr/components.min.css') }}" id="stylesheet" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('cms/assets/css/ltr/layout.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
    @endif
    <link href="{{ asset('cms/assets/ckeditor5-38.1.0-utz9f2qmopbn/build/ckeditor.js') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
        rel="stylesheet">
    <!-- /global stylesheets -->
    <style>
        button.swal2-styled {
            border: none !important;
            outline: none !important;
            color: #ffffff !important;
            padding: 6px 15px !important;
            border-radius: 5px;
        }

        button.swal2-confirm {
            background-color: #252b36;
        }

        .progress-bar {
            width: 100%;
            height: 20px;
            background-color: #f2f2f2;
            position: relative;
        }

        .progress {
            width: 0%;
            height: 100%;
            background-color: #4caf50;
            transition: width 0.3s ease-in-out;
            position: relative;
        }

        .progress:before {
            content: "";
            position: absolute;
            top: 0;
            left: -15px;
            right: -15px;
            height: 100%;
            background-image: repeating-linear-gradient(45deg, rgba(60, 59, 117, 0.747) 10px, rgba(47, 45, 163, 0.493) 25px, rgba(59, 56, 250, 0.562) 25px);
        }

        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #ffffff;
            font-weight: bold;
        }

        #previewImage {
            width: 400px;
            margin-top: 15px;
            border-radius: 25px;
        }

        .nav.nav-sidebar {
            padding-inline: 0 !important;
        }

        .nav-link i {
            margin-right: 0 !important;
            margin-left: 0 !important;
            margin-inline: 10px !important;
        }

        .navbar-brand img {
            width: 35px !important;
            height: 45px;
        }

        .node circle {
            fill: #228794;
            stroke: #0000003d;
            stroke-width: 2px;
        }

        .node text {
            font-size: 10px;
            font-weight: bold;
            font-family: 'Cairo', sans-serif;
        }

        .link {
            fill: none;
            stroke: #ccc;
            stroke-width: 1px;
        }
    </style>
    @yield('styles')

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
        <div class="container-fluid">
            <div class="d-flex d-lg-none me-2">
                <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                    <i class="ph-list"></i>
                </button>
            </div>

            <div class="flex-1 navbar-brand flex-lg-0">
                <a href="#" class="d-inline-flex align-items-center">
                    <img src="{{ asset('cms/assets/icons/Group (1).png') }}" alt="">
                </a>
            </div>

            <ul class="flex-row order-1 nav justify-content-end order-lg-2">

                <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
                    <a href="#" class="p-1 navbar-nav-link align-items-center rounded-pill"
                        data-bs-toggle="dropdown">
                        <div class="status-indicator-container">
                            @php
                                $guard = Auth::getDefaultDriver();
                                $imagePath = $guard === 'admin' ? 'storage/images/admin/' : 'storage/images/author/';
                            @endphp

                            <img src="{{ asset($imagePath . Auth::user()->user->image) }}"
                                class="w-32px h-32px rounded-pill" alt="">
                            <span class="status-indicator bg-success"></span>
                        </div>
                        <span
                            class="d-none d-lg-inline-block mx-lg-2">{{ Auth::check() ? Auth::user()->user->name : null }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <form
                            action="{{ route('logout', (Auth::guard('admin') ? 'admin' : Auth::guard('author')) ? 'author' : null) }}"
                            method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit"><i class="ph-sign-out me-2"></i>تسجيل
                                الخروج</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        @include('cms.sidebar')


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">
                <div class="content">

                </div>
            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    <!-- Demo config -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="demo_config">
        <div class="visible position-absolute top-50 end-100">
            <button type="button" class="btn btn-primary btn-icon translate-middle-y rounded-100-0"
                data-bs-toggle="offcanvas" data-bs-target="#demo_config">
                <i class="ph-gear"></i>
            </button>
        </div>

        <div class="py-0 offcanvas-header border-bottom">
            <h5 class="py-3 offcanvas-title">المظهر</h5>
            <button type="button" class="border-transparent btn btn-light btn-sm btn-icon rounded-pill"
                data-bs-dismiss="offcanvas">
                <i class="ph-x"></i>
            </button>
        </div>

        <div class="offcanvas-body">
            <div class="mb-2 fw-semibold">اللغات</div>
            <div class="mb-3 list-group">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <label class="mb-2 rounded list-group-item list-group-item-action form-check border-width-1 w-100">
                        <div class="my-1">
                            <div class="form-check-label d-flex me-2 w-100">
                                <a rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"class="fw-bold d-inline-block w-100">
                                    {{ $properties['native'] }}
                                </a>
                            </div>
                        </div>
                    </label>
                @endforeach
            </div>
        </div>
    </div>

    <script src="{{ asset('cms/assets/js/jquery/jquery.min.js') }}"></script>
    <!-- Load plugin -->
    <script src="{{ asset('cms/assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"
        integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Load plugin -->
    <script src="{{ asset('cms/assets/js/vendor/notifications/sweet_alert.min.js') }}"></script>
    <script src="{{ asset('cms/assets/js/crud.js') }}"></script>
    <script src="{{ asset('cms/assets/js/app.js') }}"></script>
    <script src="{{ asset('cms/assets/js/custom.js') }}"></script>
    <!-- Core JS files -->
    <script src="{{ asset('cms/assets/demo/demo_configurator.js') }}"></script>
    <script src="https://d3js.org/d3.v7.min.js"></script>

    <script src="{{ asset('cms/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->
    <!-- Theme JS files -->
    <script src="{{ asset('cms/assets/demo/pages/dashboard.js') }}"></script>
    <!-- /theme JS files -->

</body>

</html>
