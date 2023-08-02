<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="{{ asset('cms/assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('cms/assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('cms/assets/css/rtl/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('cms/assets/demo/demo_configurator.js') }}"></script>
    <script src="{{ asset('cms/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

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
        </div>
    </div>


    <div class="page-content">

        <div class="content-wrapper">

            <div class="content-inner">


                <div class="content d-flex justify-content-center align-items-center">
                    <form method="POST" action="{{ route('login', $guard) }}">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                        <img src="{{ asset('cms/assets/images/logo_icon.svg') }}" class="h-48px"
                                            alt="">
                                    </div>
                                    <h5 class="mb-0">صفحة تسجيل الدخول</h5>
                                    <span class="d-block text-muted">ادخل البيانات ادناه</span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">الايميل</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input name="email" type="text" class="form-control"
                                            placeholder="john@doe.com">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-user-circle text-muted"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">كلمة المرور</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input name="password" type="password" class="form-control"
                                            placeholder="•••••••••••">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-lock text-muted"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-100">تسجيل الدخول</button>
                                </div>

                                {{-- <div class="text-center">
                                    <a href="login_password_recover.html">Forgot password?</a>
                                </div> --}}
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>

</body>

</html>
