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

    <!-- animate-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
            <li class="breadcrumb-item active"> <a href="{{ route('front_index') }}"> الرئيسية </a></li>
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
                            <a href="{{ route('tag', $tag->id) }}">
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
                @php
                    $motaleqtDiv = $divs->where('name', 'متعلقات')->first();
                    $mainNewsDiv = $divs->where('name', 'الاخبار الرئيسية')->first();
                    $readTooDiv = $divs->where('name', 'اقرا ايضا')->first();
                @endphp
                <div class="news-more pt-4 container">
                    <span class=" mark-title">
                    </span>
                    <span class="title-sec">اقرا ايضا عن {{ $readTooDiv->content }}</span>
                </div>

                <div class="row container card-width readTooContainer  "
                    data-category-name="{{ $readTooDiv->content }}">

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
                <div class="advertise-space adv-2-columns py-5 " style="display: block">
                    @php
                        $ad1Div = $divs->where('name', 'post_ad1')->first();
                        $ad2Div = $divs->where('name', 'post_ad2')->first();
                    @endphp
                    <a href="{{ $ad1Div->href }}">
                        <img src="{{ asset('storage/images/div/' . $ad1Div->image) }}" style="object-fit: contain">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 related-side pt-sm-5 p-lg-0  ">
                <div class="side-one ">
                    <div class="news-more  px-4 py-3 border ">
                        <span class=" mark-title">
                        </span>
                        <span class="title-sec"> متعلقات</span>
                    </div>


                    <div class="news-more-container" data-category-name="{{ $motaleqtDiv->content }}">
                        <div class="news-more d-flex align-items-center px-4 py-4 border">
                            <i class="fa-regular fa-arrow-left"></i>
                            <span class="mr-3"></span>
                        </div>
                        <div class="news-more d-flex align-items-center px-4 py-4 border">
                            <i class="fa-regular fa-arrow-left"></i>
                            <span class="mr-3"></span>
                        </div>
                        <div class="news-more d-flex align-items-center px-4 py-4 border">
                            <i class="fa-regular fa-arrow-left"></i>
                            <span class="mr-3"></span>
                        </div>
                        <div class="news-more d-flex align-items-center px-4 py-4 border">
                            <i class="fa-regular fa-arrow-left"></i>
                            <span class="mr-3"></span>
                        </div>

                        <div style="width: 100%; height: 100%;"
                            class="spin d-flex justify-content-center align-items-center bg-white">
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
                    @foreach ($blogs_most_views as $blog_most_view)
                        @if ($blog_most_view->id != $blog->id)
                            <div class="news-more d-flex align-items-center px-4 py-4 border ">
                                <img src="{{ asset('storage/images/blog/' . $blog_most_view->image) }}"
                                    style="max-height: 70px; object-fit: cover; object-position: center top"
                                    alt="">
                                <span class="mr-3">
                                    @php
                                        $slug = Str::slug($blog_most_view->name);
                                    @endphp
                                    <a
                                        href="{{ route('post_details', ['id' => $blog_most_view->id, 'slug' => $slug]) }}">
                                        {{ $blog_most_view->name }}
                                    </a>
                                </span>
                            </div>
                        @endif
                    @endforeach



                </div>
                <div class="side-three pb-5 ">
                    <div class="news-more  px-4 py-3 border ">
                        <span class=" mark-title">
                        </span>
                        <span class="title-sec"> الاخبار الرئيسية</span>
                    </div>
                    <div class="d-grid flex-column main-news-container"
                        data-category-name="{{ $mainNewsDiv->content }}">



                    </div>

                </div>

            </div>

        </div>
        <a href="#" class="to-top">
            <i class="fas fa-chevron-up"></i>
        </a>
    </main>

    @include('partials.footer')

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
