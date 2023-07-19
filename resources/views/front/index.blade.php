<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- lightgallery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-autoplay.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-fullscreen.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-share.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-zoom.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-thumbnail.min.css" />

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--  styles for this template -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">

    <!-- icons -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">

    <!-- fonts -->
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=neckar-bold" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Harmattan:wght@500&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Harmattan:wght@500&family=Marhey&display=swap">
    <style>
        .column {
            background-size: cover;
            background-repeat: no-repeat;

        }
    </style>
</head>

<body>

    <header class="nav-scrolled" dir="rtl">
        <nav class="navbar navbar-light navbar-expand-lg bg-body-tertiary">
            <div class="container align-items-center">
                <a class="navbar-brand" href="#">
                    <div class="logo  d-flex flex-column align-items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="87px" height="51px">
                            <image x="0px" y="0px" width="87px" height="51px"
                                xlink:href="data:img/png;base64,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" />
                        </svg>
                        <span class="logo-text ">الاخباري</span>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa-duotone fa-bars text-danger"></i>
                </button>
                <div class="collapse  navbar-collapse" id="navbarSupportedContent">
                    <ul class=" navbar-nav mr-auto mb-2 ml3 mb-lg-0">
                        <li class="nav-item active-item">
                            <a class="nav-link active " aria-current="page" href="../pages/index.html">الرئيسية</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="#">الاخبار</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">تقارير خاصة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">مقالات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/video-library.html">فيديو </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/contact.html">اتصل بنا</a>
                        </li>
                        <ul class="navbar-nav mr-5 text-white nav-links links d-flex flex-row pt-2 pr-5 mr-auto">
                            <li class="  "><a class="twitter" href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class=" "><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="  "><a class="youtube" href="#"><i class="fab fa-youtube"></i></a>
                            </li>
                            <li class=" "><a href="#"><i class="fal fa-search"></i></a></li>
                        </ul>
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <main class="py-3" dir="rtl">
        <div class="container home-intro">
            <!-- شريط الاخبار -->
            <div class="row news-ticker text-justify border py-4  border-1 ">

                <div class="col-lg-2 col-md-2 col-sm-2  border-left d-flex align-items-center">
                    <span class="s1 d-block"> شريط الاخبار</span>
                </div>

                <div id="carouselExampleControls" class="col-lg-8 col-md-6 col-sm-6 carousel slide "
                    data-ride="carousel">
                    <div class="carousel-inner ">
                        <div class="carousel-item active  ">
                            <p class="text-right  text-black-50 ">مسيرات العودة" شهداء وجرحى برصاص الاحتلال على حدود
                                غزة
                            </p>
                        </div>
                        <div class="carousel-item ">
                            <p class="text-right text-black-50">مسيرات العودة" شهداء وجرحى برصاص الاحتلال على حدود غزة
                            </p>
                        </div>
                        <div class="carousel-item ">
                            <p class="text-right text-black-50">مسيرات العودة" شهداء وجرحى برصاص الاحتلال على حدود غزة
                            </p>
                        </div>
                    </div>

                </div>

                <div class="col-lg-2 col-md-4 col-sm-4 border-right ">
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                        data-slide="prev">
                        <!-- <span class="carousel-control-prev-icon " aria-hidden="true"></span> -->
                        <i class="fa-solid fa-chevron-left "></i> <!-- <span class="sr-only">Previous</span> -->
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                        data-slide="next">
                        <!-- <span class="carousel-control-next-icon " aria-hidden="true"></span> -->
                        <i class="fa-solid fa-chevron-right"></i>
                        <!-- <span class="sr-only">Next</span> -->
                    </a>
                </div>

            </div>

            <!-- مساحة اعلانية -->
            <div class="advertise-space container-2-columns py-3  ">
                <p class=" bg-light py-5  "> مساحة اعلانية </p>

                <p class=" bg-light  py-5  "> مساحة اعلانية </p>

            </div>

            <!-- فالب التصنيف الاول (خبران بارزان و3 فرعي)-->
            <div class="template-one ">
                <!-- الاخبار الرئيسية البارزة للتنصيف )  هنا ضع اول خبرين للتصنيف الذي تريده)-->
                <div class="row  template-main  two-main-news  pb-0 ">
                    <div class="col-sm-6 mb-4  ">
                        <div class="column position-relative ">
                            <a href="../pages/details-new.html"> <img
                                    src="{{ asset('front/assets/images/mainnew2.png') }}" alt="Image 1">
                                <div class="text text-right bottom-right text-white ">
                                    <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                        .</h6>
                                    <span class="time ">قبل 25 دقيقة </span>
                                </div>
                            </a>

                        </div>
                        <div class="label top-right">
                            <span>محليات</span>
                        </div>
                    </div>

                    <div class="col-sm-6 mb-4  ">
                        <div class="column position-relative">
                            <a href="../pages/details-new.html"> <img
                                    src="{{ asset('front/assets/images/mainnew2.png') }}" alt="Image 1">
                                <div class="text text-right bottom-right text-white ">
                                    <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                        .</h6>
                                    <span class="time ">قبل 25 دقيقة </span>
                                </div>
                            </a>

                        </div>
                        <div class="label top-right">
                            <span>محليات</span>
                        </div>
                    </div>

                </div>
                <!--  الاخبار الفرعية للتنصيف)  هنا ضع  ثلاثة اخبار للتصنيف)-->
                <div class="row template-sub  three-sub-news">
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="column position-relative">
                            <a href="../pages/details-new.html"> <img
                                    src="{{ asset('front/assets/images/mainnew2.png') }}" alt="Image 1">
                                <div class="text text-right bottom-right text-white ">
                                    <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                        .</h6>
                                    <span class="time ">قبل 25 دقيقة </span>
                                </div>
                            </a>

                        </div>
                        <div class="label top-right">
                            <span>محليات</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="column position-relative">
                            <a href="../pages/details-new.html"> <img
                                    src="{{ asset('front/assets/images/mainnew2.png') }}" alt="Image 1">
                                <div class="text text-right bottom-right text-white ">
                                    <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                        .</h6>
                                    <span class="time ">قبل 25 دقيقة </span>
                                </div>
                            </a>

                        </div>
                        <div class="label top-right">
                            <span>محليات</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4   ">
                        <div class="column position-relative">
                            <a href="../pages/details-new.html"> <img
                                    src="{{ asset('front/assets/images/mainnew2.png') }}" alt="Image 1">
                                <div class="text text-right bottom-right text-white ">
                                    <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                        .</h6>
                                    <span class="time ">قبل 25 دقيقة </span>
                                </div>
                            </a>

                        </div>
                        <div class="label top-right">
                            <span>محليات</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- مساحة اعلانية -->
            <div class="advertise-space container-2-columns py-3  ">
                <p class=" bg-light py-5  "> مساحة اعلانية </p>

                <p class=" bg-light  py-5  "> مساحة اعلانية </p>

            </div>

            <!-- اخر الاخبار -->
            <div class="row ">
                <div class="text-right  mb-3">
                    <span class=" mark-title">
                    </span>
                    <span class="title-sec text-black">اخر الاخبار
                    </span>
                </div>
                <div class="container-4-columns">

                    <div class="card ">
                        <a href="../pages/details-new.html"><img class="card-img-top"
                                src="{{ asset('front/assets/images/mainnew.png') }}" alt=""></a>
                        <div class="card-body">
                            <span class="category-title d-block  text-right pb-2">تكنولوجيا</span>
                            <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                .</h6>
                        </div>
                        <div class="container text-black-50 pb-2 bg-white text-right">
                            <span class="time">قبل 2 دقيقة</span>
                        </div>
                    </div>
                    <div class="card ">
                        <a href="../pages/details-new.html"><img class="card-img-top"
                                src="{{ asset('front/assets/images/mainnew.png') }}" alt=""></a>
                        <div class="card-body">
                            <span class="category-title d-block  text-right pb-2">تكنولوجيا</span>

                            <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                .</h6>
                        </div>
                        <div class="container text-black-50 pb-2 bg-white text-right">
                            <span class="time">قبل 2 دقيقة</span>
                        </div>
                    </div>
                    <div class="card ">
                        <a href="../pages/details-new.html"><img class="card-img-top"
                                src="{{ asset('front/assets/images/mainnew.png') }}" alt=""></a>
                        <div class="card-body">
                            <span class="category-title d-block  text-right pb-2">تكنولوجيا</span>

                            <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                .</h6>
                        </div>
                        <div class="container text-black-50 pb-2 bg-white text-right">
                            <span class="time">قبل 2 دقيقة</span>
                        </div>
                    </div>
                    <div class="card ">
                        <a href="../pages/details-new.html"><img class="card-img-top"
                                src="{{ asset('front/assets/images/mainnew.png') }}" alt=""></a>
                        <div class="card-body">
                            <span class="category-title d-block  text-right pb-2">تكنولوجيا</span>

                            <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                .</h6>
                        </div>
                        <div class="container text-black-50 pb-2 bg-white text-right">
                            <span class="time">قبل 2 دقيقة</span>
                        </div>
                    </div>
                    <div class="card ">
                        <a href="../pages/details-new.html"><img class="card-img-top"
                                src="{{ asset('front/assets/images/mainnew.png') }}" alt=""></a>
                        <div class="card-body">
                            <span class="category-title d-block  text-right pb-2">تكنولوجيا</span>

                            <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                .</h6>
                        </div>
                        <div class="container text-black-50 pb-2 bg-white text-right">
                            <span class="time">قبل 2 دقيقة</span>
                        </div>
                    </div>
                    <div class="card ">
                        <a href="../pages/details-new.html"><img class="card-img-top"
                                src="{{ asset('front/assets/images/mainnew.png') }}" alt=""></a>
                        <div class="card-body">
                            <span class="category-title d-block  text-right pb-2">تكنولوجيا</span>

                            <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                .</h6>
                        </div>
                        <div class="container text-black-50 pb-2 bg-white text-right">
                            <span class="time">قبل 2 دقيقة</span>
                        </div>
                    </div>
                    <div class="card ">
                        <a href="../pages/details-new.html"><img class="card-img-top"
                                src="{{ asset('front/assets/images/mainnew.png') }}" alt=""></a>
                        <div class="card-body">
                            <span class="category-title d-block  text-right pb-2">تكنولوجيا</span>

                            <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                .</h6>
                        </div>
                        <div class="container text-black-50 pb-2 bg-white text-right">
                            <span class="time">قبل 2 دقيقة</span>
                        </div>
                    </div>
                    <div class="card ">
                        <a href="../pages/details-new.html"><img class="card-img-top"
                                src="{{ asset('front/assets/images/mainnew.png') }}" alt=""></a>
                        <div class="card-body">
                            <span class="category-title d-block  text-right pb-2">تكنولوجيا</span>

                            <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                .</h6>
                        </div>
                        <div class="container text-black-50 pb-2 bg-white text-right">
                            <span class="time">قبل 2 دقيقة</span>
                        </div>
                    </div>

                </div>
            </div>

            <!--(خبران بارزان و3 اخبار فرعية) فالب التصنيف الثاني  -->

            @php
                $firstRow = $rows->get(0);
            @endphp

            @include('partials.' . $firstRow->template, ['categories' => $firstRow->categories])


            <!-- (خبر واحد بارز و5 اخبار فرعية)قالب التصنيف الثالث -->
            @php
                $secondRow = $rows->get(1);
            @endphp

            @include('partials.' . $secondRow->template, ['categories' => $secondRow->categories])


            <!-- مساحة اعلانية -->
            <div class="advertise-space container-2-columns py-3  ">
                <p class=" bg-light py-5  "> مساحة اعلانية </p>

                <p class=" bg-light  py-5  "> مساحة اعلانية </p>

            </div>

            @php
                $thirdRow = $rows->get(2);
            @endphp

            @include('partials.' . $thirdRow->template, ['categories' => $thirdRow->categories])
            <!-- القالب الرابع (يوجد في هذا تصنيفان في نفس الصف كل تصنيف به خبر بارز وخبران فرعيان)-->

        </div>
        <div class="container pt-5">
            <!--(القالب الخامس به تصنيفان-->
            @php
                $RowNumFour = $rows->get(3);
            @endphp
            @include('partials.' . $RowNumFour->template, ['categories' => $RowNumFour->categories])

            <!-- مساحة اعلانية -->
            <div class="advertise-space container-2-columns py-3  ">
                <p class=" bg-light py-5  "> مساحة اعلانية </p>

                <p class=" bg-light  py-5  "> مساحة اعلانية </p>

            </div>
        </div>

        <!-- vedio section  مكتبة الفيديو -->
        <div class="vedio-sec bg-black-sec py-5">
            <div class="cont-vid" dir="rtl">
                <div class="main-video">
                    <div class="text-right  mb-3 container">
                        <span class="mark-title-spec">
                        </span>
                        <span class="title-sec text-white">مكتبة الفيديو</span>
                    </div>
                    <div class="video active">
                        <video src="{{ asset('front/assets/160767 (720p).mp4') }}" controls autoplay>
                        </video>
                        <h3 dir="" class="title text-white text-right">01. video title</h3>
                    </div>
                </div>
                <div class="video-list ">
                    <div class="text-right  mb-3 container">
                        <i class="fa-light fa-film"></i>
                        <span class="title-sec text-white">شاهد </span>
                    </div>
                    <div class="vid">
                        <video src="{{ asset('front/assets/160767 (720p).mp4') }}" controls muted autoplay>
                        </video>
                        <h3 class="title">01. video title</h3>
                    </div>
                    <div class="vid">
                        <video src="{{ asset('front/assets/160767 (720p).mp4') }}" controls muted autoplay>
                        </video>
                        <h3 class="title">02. video title</h3>
                    </div>
                    <div class="vid">
                        <video src="{{ asset('front/assets/160767 (720p).mp4') }}" controls muted autoplay>
                        </video>
                        <h3 class="title">03. video title</h3>
                    </div>
                    <div class="vid">
                        <video src="{{ asset('front/assets/160767 (720p).mp4') }}" controls muted autoplay>
                        </video>
                        <h3 class="title">04. video title</h3>
                    </div>
                    <div class="vid">
                        <video src="{{ asset('front/assets/160767 (720p).mp4') }}" controls muted autoplay>
                        </video>
                        <h3 class="title">04. video title</h3>
                    </div>
                    <div class="vid">
                        <video src="{{ asset('front/assets/160767 (720p).mp4') }}" controls muted autoplay>
                        </video>
                        <h3 class="title">04. video title</h3>
                    </div>
                </div>
            </div>
        </div>

        @php
            $remainingRows = $rows->slice(4); // Get all rows starting from the fifth row
        @endphp
        <!-- هذا نفس القالب الرابع (تصنيفان في نفس الصف كل تصنيف به خبر رئيسي و2 فرعي) -->

        @foreach ($remainingRows as $row)
            <div class="container pt-5">
                @include('partials.' . $row->template, ['categories' => $row->categories])
            </div>
        @endforeach


        <a href="#" class="to-top">
            <i class="fas fa-chevron-up"></i>
        </a>
    </main>

    <section class="album-image  ">
        <div class="text-right container mb-3" dir="rtl">
            <span class=" mark-title">
            </span>
            <span class="title-sec text-black"> معرض الصور </span>
        </div>
        <div class=" gallery-section ">
            <div class="gallery container mb-5 image-album ">
                <a style="height: fit-content; width: 290px;" href="{{ asset('front/assets/images/1.jpg') }}">
                    <div style="height: 310px;">
                        <img src="{{ asset('front/assets/images/1.jpg') }}" alt=""
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </a>

                <a style="height: fit-content; width: 290px;" href="{{ asset('front/assets/images/2.jpg') }}">
                    <div style="height: 310px;">
                        <img src="{{ asset('front/assets/images/2.jpg') }}" alt=""
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </a>

            </div>
            <div class="cover-album ">
                <a style="height: fit-content;" href="../pages/images.html">
                    <div style="background-image: url({{ asset('front/assets/images/569-310.png') }}); background-size: cover; height: 310px;"
                        class="column position-relative ">
                        <div class="text text-right top-right  text-white text-album " dir="rtl">
                            <h6 class=" text-right ">محطة روسية جديدة تنضم إلى شبكة قياس المسافة بالليزر
                                .</h6>
                        </div>
                        <i class=" fa-regular fa-image text-white mt-3 ml-3"></i>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <footer dir="rtl">
        <div class=" footer text-white  ">
            <div class=" mx-auto  ">الحقوق محفوظة لشبكة
                بيسان
                الإخبارية (2018)</div>
            <div class=" d-flex  justify-content-center  ">
                <ul class="d-flex links justify-content-center  ">
                    <li class="mt-4 bg-white text-danger mb-sm-3 "><a class="twitter" href="#"><i
                                class="fab fa-twitter"></i></a></li>
                    <li class="mt-4 bg-white text-danger mb-sm-3 "><a class="facebook" href="#"><i
                                class="fab fa-facebook-f"></i></a></li>
                    <li class="mt-4 bg-white text-danger mb-sm-3 "><a class="youtube" href="#"><i
                                class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
            <div class="mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="54px"
                    height="43px">
                    <image x="0px" y="0px" width="54px" height="43px"
                        xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADYAAAArCAQAAACZBLMTAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfnBw0AJg06sHrOAAAF40lEQVRYw62XbZCWVRnHf/v27OICywICu7bqIq9qthr0Rsw0YgqCxKBsNk1Mg0aiI1OOfaiZ1Cb8UDRBpCIVhTVYClpBYBauL/lGhAjqQLJMgOALr7vsguwuu78+7Nl77+d57huXput8ee7r/M//f5/rOtd1n6dAYlbJFVxMBU28zWu0k2TV1HEBcJDXeTcRUcIExjOYJnazjROxGXvGaB/0oL32lgstlawx2l97NEIcdaWjchAl3u6OGMs+l3hJz2wP6FaPmW8vODJGdJOH8xCHnR1D1PpMAstRb4uL3RVNvOFv/bnrfD88N0Zy02wPvld8yOW+Gp7anBrte0/wve86H3C1OyPe7/WIXWNXEJpuSVg4zHvsUHWrg8TxYVeNXhvt47pAfshx4mC3q9rhvQ4LiFJnuyvIXS9Y6uuq/tPzc+I/2zZVH/WCgDmQk6PRvqvqa1b7B1VPOyuHZYSbVd1hKc5UtdVLc0CIC8Jb7VX1Q7+Qh7g6vNC+gLwtgWW8LapOxV+q+kgCCHFZLNHfSEQsiCGWprCsUPVn+LKq9SkwfCkQLUlFPBgQL6YirlV1EyGBn0yBjXG/qk9FRydpbFF1f17V9QbyjLqtkNOkWwWPUQP8m7l0pGAmsJaRANTwOJWJmH4UAp34Z1VvSXyjNao2eVXqnr5ma1YBP2FRAup2VZ/Eb4VCLciD/DAQzEmVmmOnqkfcGEKZlP0St6l6J37MJlV/lAO5Myy+L1XqKk+o+qwXi0UuUXVdHu77qh6zCvHeQLvGiWbEjFe6KvgeS5Ua7tuqvuWQqMRVt+cE8gbP9DSs7qbyXKDucpf/cGeY1gYHpEgV+9fQiC+LfFNU3ZyVkHEeUfV5S3sacU044Nm20oGp+/qpqp1OjzxFNqi6LIaqCNna70XS+4mZ7Kkg0WG7+3zUKWepq3kBe3fMtzj0xo/HfI+resrJ3c+9E/OjwzvKirMI4SRPqvpwgvx3Y76esxCVVZxkWWi3s88qdWFouu2Oj3yfD3FZHcPVB6mf9Pqy62GTqiecmCrVzxeinDZYlpXxf8WO05U2q7ohfjazqapsVLXR6hSxlVlH6FciPqXqe7HO2FMWuxwaX51LNiEU6jNmEqTuDiILvCP8+qafU+OXAyz2aVWPW5e9Pp/w5kCzPG9mZrgorBLxEVVb3drd9/JyrzflMiSF6r4AXpTlvcbjqr5kuYj9fSWrJntw3w6ee/KZkzPz+7Bgo1Ot9nzr/HH4/P/Hmgh1UbgudHe+GVY6xqXheXUSb7JYuetjNO+F3q77/EQWrs4Dsd29EzWG9fbruxiWuji6JxpR1Obhxvj3HFSnS/Nu0h8h1l0rD/imLba41zXekIIq8EbXuttmj7vD5X4qnbFAzmoZBlNAC60AlHOGNiBDJnh6P/zlyInUy0POH4u+jCedL2K9z53TujAKORcbQQaA/lSd07pgyWI3Mg34DlWM4w7gK6xiJtDCV1nMQNroAKbwG26hkAWM5utcTimLWMEo4Gbm9j2Mv/AvDlWnutAtVttsg4cc6Aa3esR5znK7/XzH5232MzY6y23WO9fDvukayz3lwr6HcTsDGAOM4ELeoD/NzKeTCjIsYx1VQBflNHMrBxjOcTpooY1a1rOIaipp5U99D+NuBjMWGEstjbRTxnTOQ6SMYjqBEo7yZS5hAJ3RqjZGMpkuxJDbHCtOFNtDCZ+mg0sZzu8oYDAL2cEpCiJEF4UspY5BsX/ep/ksw9iQfuiSJz7gJF+kgVpq2EkZR5jBck5TRBfdhdnJIK5gHnspheAt52/M4VkKYy/VB7FWmhnJRqrJcIBiYAgPU0kBZZRRBBRQADQDkKGMEqSID7maH9BxbmKwG9jMKT7gJAdp5Y/s4RCvcj/X8zLFFNPETp6gH1vZwgomcIYXmcb9PM2ZNLG0aq92oiVe5lgRa51ltVjqdCeJQ7xcHOqXHCteZ727nCtOcoYZS6xLbsX/Q9PJGUVud63HnPH/bldJ1sldnMdyNn009L/7i0AsJZho3wAAAABJRU5ErkJggg==" />
                </svg>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('front/assets/js/videolist.js') }}"></script>
    <script src="{{ asset('front/assets/js/scroll.js') }}"></script>

    <!-- vendor files -->
    <script src="{{ asset('front/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- script lightGallery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/autoplay/lg-autoplay.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/fullscreen/lg-fullscreen.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/share/lg-share.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/zoom/lg-zoom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script>
        let gallery = document.querySelector('.gallery');
        lightGallery(gallery, {
            plugins: [lgFullscreen, lgShare, lgZoom, lgThumbnail], // Include the lgThumbnail plugin
            controls: true,
            counter: true,
            download: false,
            autoplay: true,
            autoplaySpeed: 1000,
            pauseOnHover: true,
            getThumbContHeight: function() {
                return 100; // Adjust the height of the thumbnail container as needed
            },
            thumbWidth: 100, // Adjust the width of each thumbnail as needed
            thumbHeight: '80px', // Adjust the height of each thumbnail as needed
            thumbMargin: 10, // Adjust the margin between thumbnails as needed
            thumbContHeight: 120 // Adjust the height of the thumbnail container as needed
        });
    </script>


</body>

</html>
