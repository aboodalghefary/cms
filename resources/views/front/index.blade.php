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


    <!-- video plyer -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

    <style>
        .column {
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>

    @include('partials.header')

    <main class="py-3" dir="rtl">
        <div class="container home-intro">
            <!-- شريط الاخبار -->
            <div class=" news-ticker px-3 border-1 ">

                <div class=" d-flex align-items-center">
                    <span class="s1 pl-3 d-flex align-items-center "> شريط الاخبار</span>
                    <div id="carouselExampleControls" class="carousel slide border-right border-left pr-3"
                        data-ride="carousel">
                        <div class="carousel-inner ">
                            <div class="carousel-item active">
                                <p class="text-ticker text-right text-black-50 ">
                                    <span style="font-weight: bold;" class="time">
                                        10:30 :
                                    </span>
                                    مسيرات العودة" شهداء وجرحى برصاص الاحتلال على حدود
                                    غزة
                                </p>
                            </div>
                            <div class="carousel-item ">
                                <p class="text-ticker text-right text-black-50 ">
                                    <span style="font-weight: bold;" class="time">
                                        10:30 :
                                    </span>
                                    مسيرات العودة" شهداء وجرحى برصاص الاحتلال على حدود
                                    غزة
                                </p>
                            </div>
                            <div class="carousel-item ">
                                <p class="text-ticker text-right text-black-50 ">
                                    <span style="font-weight: bold;" class="time">
                                        10:30 :
                                    </span>
                                    مسيرات العودة" شهداء وجرحى برصاص الاحتلال على حدود
                                    غزة
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div style=" height: 100%;" class="tran col-lg-2 mx-3  ">
                    <a class="carousel-control-prev " href="#carouselExampleControls" role="button" data-slide="prev">
                        <!-- <span class="carousel-control-prev-icon " aria-hidden="true"></span> -->
                        <i class="fa-solid fa-chevron-left "></i> <!-- <span class="sr-only">Previous</span> -->
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <!-- <span class="carousel-control-next-icon " aria-hidden="true"></span> -->
                        <i class="fa-solid fa-chevron-right"></i>
                        <!-- <span class="sr-only">Next</span> -->
                    </a>
                </div>

            </div>

            <!-- مساحة اعلانية -->
            <div class="advertise-space adv-2-columns py-5  ">
                <p class=" bg-light py-5  "> مساحة اعلانية </p>

                <p class=" bg-light  py-5  "> مساحة اعلانية </p>

            </div>

            <!-- فالب التصنيف الاول (خبران بارزان و3 فرعي)-->
            <div class="template-one ">
                <!-- الاخبار الرئيسية البارزة للتنصيف )  هنا ضع اول خبرين للتصنيف الذي تريده)-->
                <div class="row  template-main  two-main-news pb-0 no-gutters">
                    <div class="col-lg-6 col-md-6 col-sm-12  mb-1  ">
                        <div class="hover">
                            <div class="content boxx">
                                <div class="column position-relative  ">
                                    <a href="../pages/details-new.html">

                                        <img style="background-size: cover;" class=""
                                            src="{{ asset('front/assets/images/mainnew.png') }}" alt="Image 1">
                                        <div class="text text-right bottom-right text-white ">
                                            <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                                .</h6>
                                            <span class="time ">قبل 25 دقيقة </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <a href="" class="overlay"></a>
                            <div class="label top-right">
                                <span>محليات</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12  mb-1  ">
                        <div class="hover">
                            <div class="content boxx">
                                <div class="column position-relative  ">
                                    <a href="../pages/details-new.html">

                                        <img style="background-size: cover;" class=""
                                            src="{{ asset('front/assets/images/mainnew.png') }}" alt="Image 1">
                                        <div class="text text-right bottom-right text-white ">
                                            <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                                .</h6>
                                            <span class="time ">قبل 25 دقيقة </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <a href="" class="overlay"></a>
                            <div class="label top-right">
                                <span>محليات</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  الاخبار الفرعية للتنصيف)  هنا ضع  ثلاثة اخبار للتصنيف)-->
                <div class="row template-sub  three-sub-news no-gutters ">
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-1   ">
                        <div class="hover">
                            <div class="content boxx">
                                <div class="column position-relative  ">
                                    <a href="../pages/details-new.html">

                                        <img style="background-size: cover;" class=""
                                            src="{{ asset('front/assets/images/mainnew.png') }}" alt="Image 1">
                                        <div class="text text-right bottom-right text-white ">
                                            <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                                .</h6>
                                            <span class="time ">قبل 25 دقيقة </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <a href="" class="overlay"></a>
                            <div class="label top-right">
                                <span>محليات</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-1   ">
                        <div class="hover">
                            <div class="content boxx">
                                <div class="column position-relative  ">
                                    <a href="../pages/details-new.html">

                                        <img style="background-size: cover;" class=""
                                            src="{{ asset('front/assets/images/mainnew.png') }}" alt="Image 1">
                                        <div class="text text-right bottom-right text-white ">
                                            <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                                .</h6>
                                            <span class="time ">قبل 25 دقيقة </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <a href="" class="overlay"></a>
                            <div class="label top-right">
                                <span>محليات</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-1   ">
                        <div class="hover">
                            <div class="content boxx">
                                <div class="column position-relative  ">
                                    <a href="../pages/details-new.html">

                                        <img style="background-size: cover;" class=""
                                            src="{{ asset('front/assets/images/mainnew.png') }}" alt="Image 1">
                                        <div class="text text-right bottom-right text-white ">
                                            <h6 class=" text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                                .</h6>
                                            <span class="time ">قبل 25 دقيقة </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <a href="" class="overlay"></a>
                            <div class="label top-right">
                                <span>محليات</span>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- مساحة اعلانية -->
                <div class="advertise-space adv-2-columns py-5  ">
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
                            <a href="../pages/details-new.html">
                                <div class="box">
                                    <img class="card-img-top" src="{{ asset('front/assets/images/1.jpg') }}"
                                        alt="">
                                </div>
                            </a>
                            <div class="card-body">
                                <a href="#" class="category-title d-block  text-right pb-2">تكنولوجيا</a>
                                <a href="../pages/details-new.html">
                                    <h6 class="category-desc text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في
                                        أحداث
                                        غزة
                                        .</h6>
                                </a>
                            </div>

                            <div class="container text-black-50 pb-2 bg-white text-right">
                                <span class="time">قبل 2 دقيقة</span>
                            </div>
                        </div>
                        <div class="card ">
                            <a href="../pages/details-new.html">
                                <div class="box">
                                    <img class="card-img-top" src="{{ asset('front/assets/images/1.jpg') }}"
                                        alt="">
                                </div>
                            </a>
                            <div class="card-body">
                                <a href="#" class="category-title d-block  text-right pb-2">تكنولوجيا</a>
                                <a href="../pages/details-new.html">
                                    <h6 class="category-desc text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في
                                        أحداث
                                        غزة
                                        .</h6>
                                </a>
                            </div>

                            <div class="container text-black-50 pb-2 bg-white text-right">
                                <span class="time">قبل 2 دقيقة</span>
                            </div>
                        </div>
                        <div class="card ">
                            <a href="../pages/details-new.html">
                                <div class="box">
                                    <img class="card-img-top" src="{{ asset('front/assets/images/1.jpg') }}"
                                        alt="">
                                </div>
                            </a>
                            <div class="card-body">
                                <a href="#" class="category-title d-block  text-right pb-2">تكنولوجيا</a>
                                <a href="../pages/details-new.html">
                                    <h6 class="category-desc text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في
                                        أحداث
                                        غزة
                                        .</h6>
                                </a>
                            </div>

                            <div class="container text-black-50 pb-2 bg-white text-right">
                                <span class="time">قبل 2 دقيقة</span>
                            </div>
                        </div>
                        <div class="card ">
                            <a href="../pages/details-new.html">
                                <div class="box">
                                    <img class="card-img-top" src="{{ asset('front/assets/images/1.jpg') }}"
                                        alt="">
                                </div>
                            </a>
                            <div class="card-body">
                                <a href="#" class="category-title d-block  text-right pb-2">تكنولوجيا</a>
                                <a href="../pages/details-new.html">
                                    <h6 class="category-desc text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في
                                        أحداث
                                        غزة
                                        .</h6>
                                </a>
                            </div>

                            <div class="container text-black-50 pb-2 bg-white text-right">
                                <span class="time">قبل 2 دقيقة</span>
                            </div>
                        </div>
                        <div class="card ">
                            <a href="../pages/details-new.html">
                                <div class="box">
                                    <img class="card-img-top" src="{{ asset('front/assets/images/1.jpg') }}"
                                        alt="">
                                </div>
                            </a>
                            <div class="card-body">
                                <a href="#" class="category-title d-block  text-right pb-2">تكنولوجيا</a>
                                <a href="../pages/details-new.html">
                                    <h6 class="category-desc text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في
                                        أحداث
                                        غزة
                                        .</h6>
                                </a>
                            </div>

                            <div class="container text-black-50 pb-2 bg-white text-right">
                                <span class="time">قبل 2 دقيقة</span>
                            </div>
                        </div>

                        <div class="card ">
                            <a href="../pages/details-new.html">
                                <div class="box">
                                    <img class="card-img-top" src="{{ asset('front/assets/images/1.jpg') }}"
                                        alt="">
                                </div>
                            </a>
                            <div class="card-body">
                                <a href="#" class="category-title d-block  text-right pb-2">تكنولوجيا</a>
                                <a href="../pages/details-new.html">
                                    <h6 class="category-desc text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في
                                        أحداث
                                        غزة
                                        .</h6>
                                </a>
                            </div>

                            <div class="container text-black-50 pb-2 bg-white text-right">
                                <span class="time">قبل 2 دقيقة</span>
                            </div>
                        </div>
                        <div class="card ">
                            <a href="../pages/details-new.html">
                                <div class="box">
                                    <img class="card-img-top" src="{{ asset('front/assets/images/1.jpg') }}"
                                        alt="">
                                </div>
                            </a>
                            <div class="card-body">
                                <a href="#" class="category-title d-block  text-right pb-2">تكنولوجيا</a>
                                <a href="../pages/details-new.html">
                                    <h6 class="category-desc text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في
                                        أحداث
                                        غزة
                                        .</h6>
                                </a>
                            </div>

                            <div class="container text-black-50 pb-2 bg-white text-right">
                                <span class="time">قبل 2 دقيقة</span>
                            </div>
                        </div>
                        <div class="card ">
                            <a href="../pages/details-new.html">
                                <div class="box">
                                    <img class="card-img-top" src="{{ asset('front/assets/images/1.jpg') }}"
                                        alt="">
                                </div>
                            </a>
                            <div class="card-body">
                                <a href="#" class="category-title d-block  text-right pb-2">تكنولوجيا</a>
                                <a href="../pages/details-new.html">
                                    <h6 class="category-desc text-right">الاحتلال يكشف عن مهام واسم أبرز وحداته في
                                        أحداث
                                        غزة
                                        .</h6>
                                </a>
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
                <div class="advertise-space adv-2-columns py-5  ">
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
                <div class="advertise-space adv-2-columns py-5  ">
                    <p class=" bg-light py-5  "> مساحة اعلانية </p>

                    <p class=" bg-light  py-5  "> مساحة اعلانية </p>

                </div>
            </div>

            <!-- vedio section  مكتبة الفيديو -->
            <div class="vedio-sec bg-black-sec pb-3">
                <div class="cont-vid container" dir="rtl">
                    <div class="main-video pt-5 ">
                        <div style="padding: 0;" class="text-right mb-4 container">
                            <span class="mark-title-spec"></span>
                            <span class="title-sec text-white">مكتبة الفيديو</span>
                        </div>
                        <div class="plyr__video-embed" id="player1">
                            <iframe src="https://www.youtube.com/embed/H13cW1pYYcY" allow="autoplay"></iframe>
                        </div>
                    </div>


                    <div class="video-list ">
                        <div style="border-color:#1d1b1b;" class="vid text-right py-2 shahhed">
                            <i class="fa-light fa-film"></i>
                            <span class="title-sec text-white">شاهد</span>
                        </div>
                        @php
                            $id_count = 2;
                            $counter = 0; // Initialize a counter variable
                        @endphp

                        @foreach ($library->videos as $video)
                            @if ($counter < 4)
                                <!-- Add this condition to limit the loop to 4 iterations -->
                                <div style="border-color:#333; " class="vid text-right videoooo"
                                    data-src="https://www.youtube.com/embed/{{ $video->video_path }}">
                                    <div style="min-width: 100px;" class="plyr__video-embed bg-danger"
                                        id="{{ 'player' . $id_count }}">
                                        @php
                                            $id_count++;
                                        @endphp
                                        <iframe src="https://www.youtube.com/embed/{{ $video->video_path }}"></iframe>
                                    </div>
                                    <div class="vid-co pt-2">
                                        <div class="play-fa">
                                            <i style="font-size: 14px; margin-left: 5px;"
                                                class="fa-regular fa-pause"></i>
                                            <span style="font-size: 14px; text-align: right;">قيد التشغيل</span>
                                        </div>
                                        <p style="font-size: 14px; text-align: right;" class="title-vid">
                                            <span class="desc">
                                                {{ Str::limit($video->title, 35, '...') }} </span><br>
                                            <span style="font-size: 14px;" class="date text-white-50">22/1/2001</span>
                                        </p>
                                    </div>
                                </div>
                            @endif
                            @php
                                $counter++; // Increment the counter variable
                            @endphp
                        @endforeach


                    </div>
                </div>
            </div>



            @php
                $remainingRows = $rows->slice(4);
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
    
    <!-- تقارير خاصة -->
    <div class="spec-artical bg-light  py-5 box2">

        <div class="container" dir="rtl">
            <div class="text-right  mb-3 ">
                <span class=" mark-title">
                </span>
                <span class="title-sec text-black"> تقارير خاصة </span>
            </div>
        </div>
        <div class="d-flex justify-content-center flex-wrap mr-3  ">

            <div class="pt-1">
                <a href="../pages/details-new.html">
                    <div style=" margin-right: 2px; width: 284px; height: 250px; background-image: url({{ asset('front/assets/images/1.jpg') }});"
                        class="column position-relative img   ">
                        <div class="text text-right bottom-right text-white ">
                            <h6 class=" text-right">محطة روسية جديدة تنضم إلى شبكة قياس المسافة بالليزر

                                .</h6>
                            <span class="date "> 22/1/2001 </span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="pt-1">
                <a href="../pages/details-new.html">
                    <div style=" margin-right: 2px; width: 284px; height: 250px; background-image: url({{ asset('front/assets/images/1.jpg') }});"
                        class="column position-relative img   ">
                        <div class="text text-right bottom-right text-white ">
                            <h6 class=" text-right">محطة روسية جديدة تنضم إلى شبكة قياس المسافة بالليزر

                                .</h6>
                            <span class="date "> 22/1/2001 </span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="pt-1">
                <a href="../pages/details-new.html">
                    <div style=" margin-right: 2px; width: 284px; height: 250px; background-image: url({{ asset('front/assets/images/1.jpg') }});"
                        class="column position-relative img   ">
                        <div class="text text-right bottom-right text-white ">
                            <h6 class=" text-right">محطة روسية جديدة تنضم إلى شبكة قياس المسافة بالليزر

                                .</h6>
                            <span class="date "> 22/1/2001 </span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="pt-1">
                <a href="../pages/details-new.html">
                    <div style=" margin-right: 2px; width: 284px; height: 250px; background-image: url({{ asset('front/assets/images/1.jpg') }});"
                        class="column position-relative img   ">
                        <div class="text text-right bottom-right text-white ">
                            <h6 class=" text-right">محطة روسية جديدة تنضم إلى شبكة قياس المسافة بالليزر

                                .</h6>
                            <span class="date "> 22/1/2001 </span>
                        </div>
                    </div>
                </a>
            </div>

        </div>

    </div>
    <section class="album-image">
        <div class="text-right container mb-3" dir="rtl">
            <span class=" mark-title">
            </span>
            <span class="title-sec text-black"> معرض الصور </span>
        </div>
        <div class=" gallery-section container">
            <div style="width: min-content;" class="gallery mx-auto mb-5 image-album box">
                <a style="height: fit-content; width: 290px;" href="{{ asset('front/assets/images/1.jpg') }}">
                    <div class="card" style="height: 310px;">
                        <img src="{{ asset('front/assets/images/1.jpg') }}" alt=""
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </a>
                <a style="height: fit-content; width: 290px;" href="{{ asset('front/assets/images/2.jpg') }}">
                    <div class="card" style="height: 310px;">
                        <img src="{{ asset('front/assets/images/2.jpg') }}" alt=""
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </a>
            </div>
            <div style="width: fit-content;" class="cover-album ">
                <a href="../pages/images.html">
                    <div style=" position: relative;" class=" column position-relative img">
                        <img style="height: 310px" src="{{ asset('front/assets/images/569-310.png') }}"
                            alt="">
                        <div class="text text-white text-album" dir="rtl">
                            <h6 style="position: absolute; top: 30px; right: 10px;" class="text-right">محطة روسية
                                جديدة
                                تنضم إلى شبكة قياس المسافة بالليزر.</h6>
                            <i style="position: absolute; top: 10px; left: 10px;"
                                class="fa-regular fa-image text-white "></i>
                        </div>
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
                                class=" fab fa-twitter"></i></a></li>
                    <li class="mt-4 bg-white text-danger mb-sm-3 "><a class="facebook" href="#"><i
                                class=" fab fa-facebook-f"></i></a></li>
                    <li class="mt-4 bg-white text-danger mb-sm-3 "><a class="youtube" href="#"><i
                                class=" fab fa-youtube"></i></a></li>
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

    <!-- video plyer -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.6.4/plyr.js"
        integrity="sha512-M/AUlH5tMMuhvt9trN4rXBjsXq9HrOUmtblZHhesbx97sGycEnXX/ws1W7yyrF8zEjotdNhYNfHOd3WMu96eKA=="
        crossorigin="anonymous"></script>


    <!--core JavaScript -->
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
        let main__video = document.querySelector(".main-video");
        let first__video = document.querySelector(".videoooo");
        main__video.querySelector("iframe").src = first__video.dataset.src;

        const getHoverDirection = function(event) {
            var directions = ['top', 'right', 'bottom', 'left'];
            var item = event.currentTarget;

            var w = item.offsetWidth;
            var h = item.offsetHeight;


            var x = (event.clientX - item.getBoundingClientRect().left - (w / 2)) * (w > h ? (h / w) : 1);
            var y = (event.clientY - item.getBoundingClientRect().top - (h / 2)) * (h > w ? (w / h) : 1);


            var d = Math.round(Math.atan2(y, x) / 1.57079633 + 5) % 4;

            return directions[d];
        };
        document.addEventListener('DOMContentLoaded', function(event) {
            // Loop over items (in a IE11 compatible way).
            var items = document.getElementsByClassName('hover');
            for (var i = 0; i < items.length; i++) {

                // Loop over the registered event types.
                ['mouseenter', 'mouseleave'].forEach(function(eventname) {
                    items[i].addEventListener(eventname, function(event) {

                        // Retrieve the direction of the enter/leave event.
                        var dir = getHoverDirection(event);

                        // Reset classes.
                        // event.currentTarget.className = 'item hover';
                        // > If support for IE11 is not needed.
                        // event.currentTarget.classList.remove('mouseenter', 'mouseleave', 'top', 'right', 'bottom', 'left');
                        // > If support for IE11 is needed.
                        event.currentTarget.classList.remove('mouseenter');
                        event.currentTarget.classList.remove('mouseleave');
                        event.currentTarget.classList.remove('top');
                        event.currentTarget.classList.remove('right');
                        event.currentTarget.classList.remove('bottom');
                        event.currentTarget.classList.remove('left');

                        // Add the event and direction classes.
                        // > If support for IE11 is not needed.
                        // event.currentTarget.classList.add(event.type, dir);
                        // > If support for IE11 is needed.
                        event.currentTarget.className += ' ' + event.type + ' ' + dir;

                    }, false);
                });
            }
        });
    </script>

</body>

</html>
