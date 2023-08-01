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
                <a href="{{ route('category', $blog->category_id) }}">{{ $blog->category->name }}</a>
            </li>
            </li>
            <li class="breadcrumb-item ">
                <a href="#"> الخبر مفصلا</a>
            </li>
        </div>
    </ol>

    <main class="container text-right py-5">
        <div class="row ">
            <div class="col-lg-8 detail-new ">
                <div class="card ">
                    <a href="#"><img style="max-height: 350px; object-fit: cover; object-position: center top"
                            class="card-img-top" src="{{ asset('storage/images/blog/' . $blog->image) }}"
                            alt=""></a>
                    <div class="card-body ">

                        <h6 class="short-desk card-text text-right">
                            {{ $blog->name }}
                        </h6>
                    </div>
                    <div class="ntetwork-title container ">
                        <span class="ml-3 title "> {{ $blog->author->user->name ?? null }} </span>
                        <span class="time text-black-50">
                            منذ
                            {{ $blog->created_at->locale('ar')->shortAbsoluteDiffForHumans() }}
                        </span>
                    </div>
                    <div class="full-desc container mt-3">
                        {!! $blog->content !!}
                    </div>
                    <div class="hash-tag container py-5 ">
                        @foreach ($blog->tags as $tag)
                            <a href="#">
                                <span class="d-inline-block mb-3">#{{ $tag->name }}</span>
                            </a>
                        @endforeach

                    </div>
                    <div class="social-links ">
                        <ul class="pr-0 mb-2 text-white links ">
                            <li class="twitter d-inline-block mb-sm-3 "><a class="twitter" href=""><i
                                        class="fab fa-twitter"></i></a></li>
                            <li class="facebook d-inline-block mb-sm-3 "><a class="facebook" href=""><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li class="messanger d-inline-block mb-sm-3 "><a class="" href=""><i
                                        class="fa-brands fa-facebook-messenger"></i></a></li>
                            <li class="d-inline-block mb-sm-3 "><a href=""><i class="fab fa-google"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="news-more pt-4 container">
                    <span class=" mark-title">
                    </span>
                    <span class="title-sec">اقرا ايضا عن (نوع معين من اصناف الاخبار)</span>
                </div>
                <div class="row container card-width  ">
                    <div class="col-lg-4  col-md-6 g-md-3 col-sm-12 mt-3  ">
                        <div class="card  h-100 box">
                            <a href="#"><img class="card-img-top"
                                    src="{{ asset('front/assets/images/mainnew.png') }}" alt=""></a>
                            <a href="#" class="card-body">

                                <h6 class="card-text ">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                    .</h6>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4  col-md-6 g-md-3 col-sm-12 mt-3  ">
                        <div class="card  h-100 box">
                            <a href="#"><img class="card-img-top"
                                    src="{{ asset('front/assets/images/mainnew.png') }}" alt=""></a>
                            <a href="#" class="card-body">

                                <h6 class="card-text ">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                    .</h6>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4  col-md-6 g-md-3 col-sm-12 mt-3  ">
                        <div class="card  h-100 box">
                            <a href="#"><img class="card-img-top"
                                    src="{{ asset('front/assets/images/mainnew.png') }}" alt=""></a>
                            <a href="#" class="card-body">

                                <h6 class="card-text ">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                    .</h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="my-5 pt-5 pl-5 d-flex align-items-center justify-content-between  border-bottom pb-3">

                    @if ($blog->comments_enabled == 1)
                        <div class="fb-comments" data-href="{{ route('post_details', $blog->id) }}" data-width="100%"
                            data-numposts="5"></div>
                    @else
                        <div class="alert alert-dark w-100 text-center" style="cursor: pointer">
                            التعليقات معطلة على هذا الخبر
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 related-side pt-sm-5 p-lg-0  ">
                <div class="side-one ">
                    <div class="news-more  px-4 py-3 border ">
                        <span class=" mark-title">
                        </span>
                        @php
                            $motaleqtDiv = $divs->where('name', 'متعلقات')->first();
                            $mainNewsDiv = $divs->where('name', 'الاخبار الرئيسية')->first();
                            $readTooDiv = $divs->where('name', 'اقرا ايضا')->first();
                        @endphp
                        <span class="title-sec"> متعلقات</span>
                    </div>

                    <div class="news-more-container" data-category-name="{{ $motaleqtDiv->content }}">
                        <div class="loader-container"
                            style="display: flex;justify-content: center;align-items: center;padding: 12px; ">
                            <span class="loader"></span>
                        </div>
                    </div>

                </div>
                <div class="side-two py-5 ">
                    <div class="news-more  px-4 py-3 border ">
                        <span class=" mark-title">
                        </span>
                        <span class="title-sec"> الأكثر مشاهدة</span>
                    </div>
                    <div class="news-more d-flex align-items-center   px-4 py-4 border ">
                        <video width="100" height="80" controls>
                            <!-- test inert real vedio -->
                            <source src="../assets/Download.mp4" type=video/mp4>
                        </video>
                        <span class="mr-3"> <a href=""> اندلاع حريق جديد بفعل طائرة ورقية في كيبوتس
                                "كيسوفيم"</a></span>
                    </div>
                    <div class="news-more d-flex align-items-center   px-4 py-4 border ">
                        <video width="100" height="80" controls>
                            <source src=”http://techslides.com/demos/sample-videos/small.ogv” type=video/ogg>
                            <source src="/build/videos/arcnet.io(7-sec).mp4" type=video/mp4>
                        </video>
                        <span class="mr-3"> <a href=""> اندلاع حريق جديد بفعل طائرة ورقية في كيبوتس
                                "كيسوفيم"</a></span>
                    </div>
                    <div class="news-more d-flex align-items-center   px-4 py-4 border ">
                        <video width="100" height="80" controls>
                            <source src=”http://techslides.com/demos/sample-videos/small.ogv” type=video/ogg>
                            <source src="/build/videos/arcnet.io(7-sec).mp4" type=video/mp4>
                        </video>
                        <span class="mr-3"> <a href=""> اندلاع حريق جديد بفعل طائرة ورقية في كيبوتس
                                "كيسوفيم"</a></span>
                    </div>
                    <div class="news-more d-flex align-items-center   px-4 py-4 border ">
                        <video width="100" height="80" controls>
                            <source src=”http://techslides.com/demos/sample-videos/small.ogv” type=video/ogg>
                            <source src="/build/videos/arcnet.io(7-sec).mp4" type=video/mp4>
                        </video>
                        <span class="mr-3"> <a href=""> اندلاع حريق جديد بفعل طائرة ورقية في كيبوتس
                                "كيسوفيم"</a></span>
                    </div>

                </div>
                <div class="side-three pb-5 ">
                    <div class="news-more  px-4 py-3 border ">
                        <span class=" mark-title">
                        </span>
                        <span class="title-sec"> الاخبار الرئيسية</span>
                    </div>
                    <div class="d-grid flex-column">
                        <div class="card h-100 py-2">
                            <a href="#"><img class="card-img-top box"
                                    src="{{ asset('front/assets/images/mainnew.png') }}" alt=""></a>
                            <a href="#" class="card-body">
                                <h6 class="card-text ">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                    .</h6>
                            </a>
                        </div>
                        <div class="card h-100 py-2">
                            <a href="#"><img class="card-img-top box"
                                    src="{{ asset('front/assets/images/mainnew.png') }}" alt=""></a>
                            <a href="#" class="card-body">
                                <h6 class="card-text ">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                    .</h6>
                            </a>
                        </div>
                        <div class="card h-100 py-2">
                            <a href="#"><img class="card-img-top box"
                                    src="{{ asset('front/assets/images/mainnew.png') }}" alt=""></a>
                            <a href="#" class="card-body">
                                <h6 class="card-text ">الاحتلال يكشف عن مهام واسم أبرز وحداته في أحداث غزة
                                    .</h6>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <a href="#" class="to-top">
            <i class="fas fa-chevron-up"></i>
        </a>
    </main>

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
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('front/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- vendor files -->
    <!-- تعويض {your-app-id} بمعرّف التطبيق الخاص بك -->
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId=1223591008520673&autoLogAppEvents=1"
        nonce="a4LkJkFD"></script>
    <script src="{{ asset('front/assets/js/megaMenue.js') }}"></script>
    <script src="{{ asset('front/assets/js/news_detailes.js') }}"></script>

</body>

</html>
