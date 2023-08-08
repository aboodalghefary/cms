@php
    $lang = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
@endphp
<!DOCTYPE html>
<html dir="{{ $lang }}">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>لوحة التحكم - الرئيسية</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles

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
        .sidebar-main-resized .nav-sidebar {
            align-items: center;
        }

        .sidebar-main-unfold .nav-sidebar {
            align-items: inherit;
        }

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

        .card-file {
            width: fit-content;
            position: relative;
        }


        .card-file:hover .card-image-overlay {
            opacity: 1
        }

        .card-image {
            width: 200px;
            height: 180px;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-image video {
            width: 200px;
            height: 180px;
        }

        .card-image-overlay {
            position: absolute;
            transition-duration: .5s;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            opacity: 0;
            background-color: #012125c9;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card-image-overlay span {
            font-size: 11px;
            margin-block: 10px;
            color: #fff;
            text-align: center;
        }

        .card-image-overlay a {
            transition-duration: .5s;
            background: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 35px;
            height: 35px;
            margin-inline: 5px;
        }
    </style>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

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
                <li class="nav-item">
                    <button type="button" onclick="fetchFiles('all')" class="btn btn-info" data-bs-toggle="modal"
                        data-bs-target="#files_library">
                        مكتبة الملفات
                    </button>
                </li>

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
                            class="d-none d-lg-inline-block mx-lg-2">{{ Auth::check() ? ucwords(Auth::user()->user->name) : null }}</span>
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
                <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal"
                    data-bs-target="#create-breakingNews">
                    خبر عاجل
                </button>

                <div class="modal fade" id="create-breakingNews" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> انشاء فرع </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @livewire('create-breaking-news')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /inner content -->

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
    <div class="modal fade" id="files_library" tabindex="-1" aria-labelledby="files_libraryLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="files_libraryLabel">مكتبة الملفات</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-lg-flex align-items-lg-start">

                        <!-- Left sidebar component -->
                        <div class="sidebar sidebar-component sidebar-expand-lg border rounded shadow-sm me-lg-3 mb-3">

                            <!-- Sidebar content -->
                            <div class="sidebar-content">

                                <!-- Header -->
                                <div
                                    class="sidebar-section sidebar-section-body d-flex align-items-center d-lg-none pb-2">
                                    <h5 class="mb-0">Sidebar</h5>
                                    <div class="ms-auto">
                                        <button type="button"
                                            class="btn btn-light border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-component-toggle">
                                            <i class="ph-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /header -->


                                <!-- Sidebar search -->
                                <div class="sidebar-section">
                                    <div class="sidebar-section-header border-bottom">
                                        <span class="fw-semibold">Sidebar search</span>
                                        <div class="ms-auto">
                                            <a href="#sidebar-search" class="text-reset" data-bs-toggle="collapse"
                                                aria-expanded="true">
                                                <i class="ph-caret-down collapsible-indicator"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="collapse show" id="sidebar-search" style="">
                                        <div class="sidebar-section-body">
                                            <div class="form-control-feedback form-control-feedback-end">
                                                <input type="search" class="form-control searchForFile"
                                                    placeholder="Search">
                                                <div class="form-control-feedback-icon">
                                                    <i class="ph-magnifying-glass opacity-50"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /sidebar search -->


                                <!-- Actions -->
                                <div class="sidebar-section">
                                    <div class="sidebar-section-header border-bottom">
                                        <span class="fw-semibold"> نوع الملفات </span>
                                        <div class="ms-auto">
                                            <a href="#sidebar-actions" class="text-reset" data-bs-toggle="collapse"
                                                aria-expanded="true">
                                                <i class="ph-caret-down collapsible-indicator"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="collapse show" id="sidebar-actions" style="">
                                        <div class="sidebar-section-body">
                                            <div class="row row-tile g-0">
                                                <div class="col">
                                                    <button type="button" onclick="fetchFiles('all')"
                                                        class="btn btn-light w-100 flex-column rounded-0 rounded-top-start py-2">
                                                        <i class="ph-squares-four text-primary ph-2x mb-1"></i>
                                                        الكل
                                                    </button>

                                                    <button type="button" onclick="fetchFiles('video')"
                                                        class="btn btn-light w-100 flex-column rounded-0 rounded-bottom-start py-2">
                                                        <i class="ph-monitor-play text-info ph-2x mb-1"></i>
                                                        الفيديوهات
                                                    </button>
                                                </div>

                                                <div class="col">
                                                    <button type="button" onclick="fetchFiles('image')"
                                                        class="btn btn-light w-100 flex-column rounded-0 rounded-top-end py-2">
                                                        <i class="ph-image text-pink ph-2x mb-1"></i>
                                                        الصور
                                                    </button>

                                                    <button type="button" onclick="fetchFiles('document')"
                                                        class="btn btn-light w-100 flex-column rounded-0 rounded-bottom-end py-2">
                                                        <i class="ph-files text-success ph-2x mb-1"></i>
                                                        المستندات
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /actions -->

                            </div>
                            <!-- /sidebar content -->

                        </div>
                        <!-- /left sidebar component -->


                        <!-- Right content -->
                        <div class="flex-1">

                            <!-- Info alert -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0"> رفع الملفات </h5>
                                </div>

                                <div class="card-body">
                                    <p class="fw-semibold"> اقصى عدد ملفات 4 واقصى حجم للملف 15 ميغا </p>
                                    <form action="#" class="dropzone" id="dropzone_file_limits"></form>
                                    <div id="progress-bar-container" style="width: 100%; background-color: #f1f1f1;">
                                        <div id="progress-bar" class="my-5 text-center"
                                            style="height: 0px;
                                            background-color: rgb(76, 175, 80);
                                            width: 0;
                                            color: white;
                                            font-weight: bold;
                                            border-radius: 10px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /info alert -->


                            <!-- Sidebars overview -->
                            <div class="card overview">
                                <div class="card-header">
                                    <h5 class="mb-0"> كل الملفات </h5>
                                </div>
                                <input type="text" id="clipboard-input"
                                    style="position: absolute; left: -9999px; top: -9999px;" />

                                <div class="card-body d-flex justify-content-center p-3 flex-wrap gap-1"
                                    data-type="all">
                                </div>
                            </div>

                            <!-- /sidebar classes -->

                        </div>
                        <!-- /right content -->

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button type="button" class="btn btn-info"> حفظ </button>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
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
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="{{ asset('cms/assets/js/vendor/uploaders/dropzone.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let dropzoneFileLimits = new Dropzone("#dropzone_file_limits", {
            url: "{{ route('upload_files') }}",
            paramName: "file",
            dictDefaultMessage: 'Drop files to upload <span>or CLICK</span>',
            maxFilesize: 55,
            maxFiles: 4,
            maxThumbnailFilesize: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(data, status) {
                var response = JSON.parse(data.xhr
                    .responseText); // قد تحتاج لتحويل البيانات من JSON إلى كائن JavaScript
                Swal.fire({
                    icon: response.icon,
                    title: response.title,
                });
            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
                Swal.fire({
                    icon: "error",
                    title: "فشل في التحميل",
                    text: "تﺃكد من حجم او عدد الملفات المرفوعة",
                });
            }
        });
        const progressBar = document.getElementById("progress-bar");

        dropzoneFileLimits.on("totaluploadprogress", function(progress) {
            var progressPercentage = Math.round(progress);
            progressBar.style.width = progressPercentage + "%";
            progressBar.style.height = '20px';
            progressBar.innerText = progressPercentage + "%";
        });
    </script>
    <!-- /core JS files -->
    <!-- Theme JS files -->
    <script src="{{ asset('cms/assets/demo/pages/dashboard.js') }}"></script>
    <script src="{{ asset('cms/assets/js/library_files.js') }}"></script>
    <script src="{{ asset('cms/assets/js/vendor/notifications/noty.min.js') }}"></script>
    <script src="{{ asset('cms/assets/demo/pages/components_progress.js') }}"></script>

    <!-- /theme JS files -->
    @yield('scripts')
</body>

</html>
