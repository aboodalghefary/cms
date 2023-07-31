<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--  styles for this template -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">

    <!-- icons -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- fonts -->
    <!-- <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=neckar-bold" /> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Harmattan:wght@500&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Harmattan:wght@500&family=Marhey&display=swap">
</head>

<body>

    @include('partials.header')
    <ol class="breadcrumb" dir="rtl">
        <div class="bread container d-flex">
            <li class="breadcrumb-item active"> الرئيسية </li>
            <li class="breadcrumb-item ">
                <a href="index.html"> اتصل بنا</a>
            </li>
        </div>
    </ol>
    <div>
        <main class="">
            <div class="main container contact d-flex flex-column justify-content-center" style="min-height: 70vh;">
                <div class="row  no-gutters ">


                    <div class="col-lg-7  pb-4 ">
                        <form action="">
                            <div class="d-flex justify-content-between">
                                <input type="text" class="form-control my-3 px-4 py-3" name="name" id="name"
                                    placeholder="الاسم">
                                <input type="email" class="form-control my-3 px-4 py-3" name="email" id="email"
                                    placeholder="البريد الالكتروني">
                            </div>
                            <input style="width: 100%;" type="text" class="form-control px-4 py-3 mb-3"
                                name="title" id="title" placeholder="الموضوع">
                            <textarea style="outline: none" id="content" placeholder="نص الرسالة" class="p-3"></textarea>
                            <button type="button" onclick="performStore()" class="btn main-btn mt-5">ارسال
                                الرسالة</button>
                        </form>
                    </div>








                    <div class=" connect-title col-lg-5 pt-3 border mx-auto ">
                        <div class=" text-right mb-3">
                            <span style="font-weight: bold; " class="label">معلومات الاتصال</span>
                        </div>
                        <div class="sub-title border-right text-right pr-3  ">
                            <span class="main-location d-block">المقر الرئيسيي</span>
                            <span class="text-black-50">فلسطين - غزة - شارع الجلاء - برج وطن</span>
                        </div>
                        <div class="sub-title border-right text-right pr-3 my-5 ">
                            <span class="main-location d-block">تليفون </span>
                            <span class="text-black-50">0597564616</span>
                        </div>
                        <div class="sub-title border-right text-right pr-3  ">
                            <span class="main-location d-block">البريد الالكتروني </span>
                            <span class="text-black-50">adm@dd.com</span>
                        </div>

                    </div>

                </div>
            </div>
        </main>
    </div>
    <footer>
        <div class=" footer text-white  ">
            <div class=" mx-auto  ">الحقوق محفوظة لشبكة
                بيسان
                الإخبارية (2018)</div>
            <div class=" d-flex  justify-content-center  ">
                <ul class="d-flex links justify-content-center  ">
                    <li class="mt-4 bg-white text-danger mb-sm-3 "><a class="twitter" href=""><i
                                class="fab fa-twitter"></i></a></li>
                    <li class="mt-4 bg-white text-danger mb-sm-3 "><a class="facebook" href=""><i
                                class="fab fa-facebook-f"></i></a></li>
                    <li class="mt-4 bg-white text-danger mb-sm-3 "><a class="youtube" href=""><i
                                class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
            <div class="mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="54px"
                    height="43px">
                    <image x="0px" y="0px" width="54px" height="43px"
                        xlink:href="data:img/png;base64,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" />
                </svg>
            </div>
        </div>
    </footer>

    <!-- vendor files -->
    <script src="{{ asset('cms/assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('cms/assets/js/vendor/notifications/sweet_alert.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"
        integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('cms/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('cms/assets/js/crud.js') }}"></script>
    <script>
        function performStore() {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('content', document.getElementById('content').value);
            formData.append('title', document.getElementById('title').value);
            store('/contact_store', formData);
        }
    </script>
    <script src="{{ asset('front/assets/js/megaMenue.js') }}"></script>

</body>

</html>
