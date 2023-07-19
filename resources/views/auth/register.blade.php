<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="{{ asset('cms/assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('cms/assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('cms/assets/css/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('cms/assets/demo/demo_configurator.js') }}"></script>
    <script src="{{ asset('cms/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
    <!-- Theme JS files -->
    <script src="{{ asset('cms/assets/js/app.js') }}"></script>
    <!-- /theme JS files -->

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-dark navbar-static py-2">
        <div class="container-fluid">
            <div class="navbar-brand">
                <a href="index.html" class="d-inline-flex align-items-center">
                    <img src="{{ asset('cms/assets/images/logo_icon.svg') }}" alt="">
                    <img src="{{ asset('cms/assets/images/logo_text_light.svg') }}"
                        class="d-none d-sm-inline-block h-16px ms-3" alt="">
                </a>
            </div>

            <div class="d-flex justify-content-end align-items-center ms-auto">
                <ul class="navbar-nav flex-row">
                    <li class="nav-item">
                        <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded ms-1">
                            <div class="d-flex align-items-center mx-md-1">
                                <i class="ph-lifebuoy"></i>
                                <span class="d-none d-md-inline-block ms-2">Support</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded ms-1">
                            <div class="d-flex align-items-center mx-md-1">
                                <i class="ph-user-circle-plus"></i>
                                <span class="d-none d-md-inline-block ms-2">Register</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded ms-1">
                            <div class="d-flex align-items-center mx-md-1">
                                <i class="ph-user-circle"></i>
                                <span class="d-none d-md-inline-block ms-2">Login</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                <!-- Content area -->
                <div class="content d-flex justify-content-center align-items-center">

                    <!-- Registration form -->
                    <form class="login-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                        <img src="{{ asset('cms/assets/images/logo_icon.svg') }}" class="h-48px"
                                            alt="">
                                    </div>
                                    <h5 class="mb-0">Create account</h5>
                                    <span class="d-block text-muted">All fields are required</span>
                                </div>

                                <div class="text-center text-muted content-divider mb-3">
                                    <span class="px-2">Your credentials</span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Your email</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="text" class="form-control" name="email"
                                            placeholder="john@doe.com">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-at text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">كلمة المرور</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="•••••••••••">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-lock text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">كلمة المرور</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="•••••••••••">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-lock text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center text-muted content-divider mb-3">
                                    <span class="px-2">معلوماتك</span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">الاسم</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="الاسم">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-user-circle text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">رقم الهاتف</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="text" name="mobile" class="form-control"
                                            placeholder="رقم الهاتف">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-user-circle text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">العنوان</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="text" name="address" class="form-control"
                                            placeholder="العنوان">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-user-circle text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">المدينة</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="text" name="city" class="form-control"
                                            placeholder="المدينة">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-user-circle text-muted"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-form-label col-lg-3">الحالة</label>
                                    <div class="col-lg-9">
                                        <select data-placeholder="الحالة" name="status"
                                            class="form-control select-icons">
                                            <option value="married">متزوج</option>
                                            <option value="single">اعزب</option>
                                            <option value="separated">مطلق</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-form-label col-lg-3">الجنس</label>
                                    <div class="col-lg-9">
                                        <select data-placeholder="الجنس" name="gender"
                                            class="form-control select-icons">
                                            <option value="male">ذكر</option>
                                            <option value="female">انثى</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-form-label col-lg-3">التاريخ</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="date" name="birthday">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-teal w-100">Register</button>
                            </div>
                        </div>
                    </form>
                    <!-- /registration form -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $('.select-icons').select2({
            templateResult: iconFormat,
            minimumResultsForSearch: Infinity,
            templateSelection: iconFormat,
            escapeMarkup: function(m) {
                return m;
            }
        });
    </script>
    <script src="{{ asset('cms/assets/js/vendor/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('cms/assets/demo/pages/form_select2.js') }}"></script>

</body>

</html>
