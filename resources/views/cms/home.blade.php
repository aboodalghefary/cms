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
                    <div class="row">
                        <div class="col-xl-3 col-lg-6">
                            @php
                                $logoDiv = $divs->where('name', 'logo')->first();
                            @endphp
                            <div class="card card-body">
                                <div class="d-flex">
                                    <div class="flex-fill">
                                        <div class="fw-semibold">اللوجو</div>
                                        <span class="text-muted" data-bs-toggle="modal"
                                            data-bs-target="#modal_form_horizontal"
                                            onclick="openEditModal(this , '{{ $logoDiv->name }}' , '{{ $logoDiv->id }}')">تعديل</span>
                                    </div>
                                    <a href="#" class="ms-3">
                                        <img src="{{ asset('storage/images/div/' . $logoDiv->image) }}"
                                            class="rounded-circle" width="44" height="44" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-6">
                            @php
                                $ad1Div = $divs->where('name', 'home_ad1')->first();
                                $ad2Div = $divs->where('name', 'home_ad2')->first();
                                $ad3Div = $divs->where('name', 'home_ad3')->first();
                                $ad4Div = $divs->where('name', 'home_ad4')->first();
                                $ad5Div = $divs->where('name', 'home_ad5')->first();
                                $ad6Div = $divs->where('name', 'home_ad6')->first();
                                $ad7Div = $divs->where('name', 'home_ad7')->first();
                                $ad8Div = $divs->where('name', 'home_ad8')->first();
                            @endphp
                            <div class="card card-body">
                                <div class="d-flex">
                                    <div class="flex-fill">
                                        <div class="fw-semibold"> اعلان الرئيسية الاول </div>
                                        <span class="text-muted" data-bs-toggle="modal"
                                            data-bs-target="#modal_form_horizontal"
                                            onclick="openEditModal(this , '{{ $ad1Div->name }}' , '{{ $ad1Div->id }}' ,'{{ $ad1Div->href }}','{{ $ad1Div->content }}' )">تعديل</span>
                                    </div>
                                    <a href="#" class="ms-3">
                                        <img src="{{ asset('storage/images/div/' . $ad1Div->image) }}" width="140"
                                            height="55" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-body">
                                <div class="d-flex">
                                    <div class="flex-fill">
                                        <div class="fw-semibold"> اعلان الرئيسية الثاني </div>
                                        <span class="text-muted" data-bs-toggle="modal"
                                            data-bs-target="#modal_form_horizontal"
                                            onclick="openEditModal(this , '{{ $ad2Div->name }}' , '{{ $ad2Div->id }}' ,'{{ $ad2Div->href }}','{{ $ad2Div->content }}' )">تعديل</span>
                                    </div>
                                    <a href="#" class="ms-3">
                                        <img src="{{ asset('storage/images/div/' . $ad2Div->image) }}" width="140"
                                            height="55" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-body">
                                <div class="d-flex">
                                    <div class="flex-fill">
                                        <div class="fw-semibold"> اعلان الرئيسية الثالث </div>
                                        <span class="text-muted" data-bs-toggle="modal"
                                            data-bs-target="#modal_form_horizontal"
                                            onclick="openEditModal(this , '{{ $ad3Div->name }}' , '{{ $ad3Div->id }}' ,'{{ $ad3Div->href }}','{{ $ad3Div->content }}' )">تعديل</span>
                                    </div>
                                    <a href="#" class="ms-3">
                                        <img src="{{ asset('storage/images/div/' . $ad3Div->image) }}" width="140"
                                            height="55" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-body">
                                <div class="d-flex">
                                    <div class="flex-fill">
                                        <div class="fw-semibold"> اعلان الرئيسية الرابع </div>
                                        <span class="text-muted" data-bs-toggle="modal"
                                            data-bs-target="#modal_form_horizontal"
                                            onclick="openEditModal(this , '{{ $ad4Div->name }}' , '{{ $ad4Div->id }}' ,'{{ $ad4Div->href }}','{{ $ad4Div->content }}' )">تعديل</span>
                                    </div>
                                    <a href="#" class="ms-3">
                                        <img src="{{ asset('storage/images/div/' . $ad4Div->image) }}" width="140"
                                            height="55" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-body">
                                <div class="d-flex">
                                    <div class="flex-fill">
                                        <div class="fw-semibold"> اعلان الرئيسية الخامس </div>
                                        <span class="text-muted" data-bs-toggle="modal"
                                            data-bs-target="#modal_form_horizontal"
                                            onclick="openEditModal(this , '{{ $ad5Div->name }}' , '{{ $ad5Div->id }}' ,'{{ $ad5Div->href }}','{{ $ad5Div->content }}' )">تعديل</span>
                                    </div>
                                    <a href="#" class="ms-3">
                                        <img src="{{ asset('storage/images/div/' . $ad5Div->image) }}" width="140"
                                            height="55" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-body">
                                <div class="d-flex">
                                    <div class="flex-fill">
                                        <div class="fw-semibold"> اعلان الرئيسية السادس </div>
                                        <span class="text-muted" data-bs-toggle="modal"
                                            data-bs-target="#modal_form_horizontal"
                                            onclick="openEditModal(this , '{{ $ad6Div->name }}' , '{{ $ad6Div->id }}' ,'{{ $ad6Div->href }}','{{ $ad6Div->content }}' )">تعديل</span>
                                    </div>
                                    <a href="#" class="ms-3">
                                        <img src="{{ asset('storage/images/div/' . $ad6Div->image) }}" width="140"
                                            height="55" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-body">
                                <div class="d-flex">
                                    <div class="flex-fill">
                                        <div class="fw-semibold"> اعلان الرئيسية السابع </div>
                                        <span class="text-muted" data-bs-toggle="modal"
                                            data-bs-target="#modal_form_horizontal"
                                            onclick="openEditModal(this , '{{ $ad7Div->name }}' , '{{ $ad7Div->id }}' ,'{{ $ad7Div->href }}','{{ $ad7Div->content }}' )">تعديل</span>
                                    </div>
                                    <a href="#" class="ms-3">
                                        <img src="{{ asset('storage/images/div/' . $ad7Div->image) }}" width="140"
                                            height="55" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-body">
                                <div class="d-flex">
                                    <div class="flex-fill">
                                        <div class="fw-semibold"> اعلان الرئيسية الثامن </div>
                                        <span class="text-muted" data-bs-toggle="modal"
                                            data-bs-target="#modal_form_horizontal"
                                            onclick="openEditModal(this , '{{ $ad8Div->name }}' , '{{ $ad8Div->id }}' ,'{{ $ad8Div->href }}','{{ $ad8Div->content }}' )">تعديل</span>
                                    </div>
                                    <a href="#" class="ms-3">
                                        <img src="{{ asset('storage/images/div/' . $ad8Div->image) }}" width="140"
                                            height="55" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-6">
                            @php
                                $privacyDiv = $divs->where('name', 'privacy')->first();
                            @endphp
                            <div class="card card-body">
                                <div class="d-flex">
                                    <div class="flex-fill">
                                        <div class="fw-semibold"> حقوق الطبع والنشر </div>
                                        <span class="text-muted" data-bs-toggle="modal"
                                            data-bs-target="#modal_form_horizontal"
                                            onclick="openEditModal(this , '{{ $privacyDiv->name }}' , '{{ $privacyDiv->id }}' ,'{{ $privacyDiv->href }}','{{ $privacyDiv->content }}' )">تعديل</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->
        <div id="modal_form_horizontal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">تعديل</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form action="#" class="form-horizontal">
                        <div class="modal-body ">
                            <div class="row mb-3 d-none hrefInput">
                                <label class="col-form-label col-sm-3">اللينك</label>
                                <div class="col-sm-9">
                                    <input type="text" id="href" placeholder="اللينك" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3 d-none imageInput">
                                <label class="col-form-label col-sm-3">صورة</label>
                                <div class="col-sm-9">
                                    <input type="file" id="image" placeholder="صورة" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3 d-none contentInput">
                                <label class="col-form-label col-sm-3">المحتوى</label>
                                <div class="col-sm-9">
                                    <textarea placeholder="المحتوى" id="content" class="form-control"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-bs-dismiss="modal">اغلاق</button>
                            <button type="button" id="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
