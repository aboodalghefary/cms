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

    <!-- animate-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- video plyer -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

</head>

<body class="bg-light">

    @include('partials.header')

    <!-- vedio section  مكتبة الفيديو -->
    <div class="main d-flex flex-column" style="min-height: 70vh;">
        <div class="vedio-sec bg-black-sec pb-3">
            <div class="cont-vid container" dir="rtl">
                <div class="main-video pt-5 ">
                    <div style="padding: 0;" class="text-right mb-4 container">
                        <span>.</span>
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
                                        <i style="font-size: 14px; margin-left: 5px;" class="fa-regular fa-pause"></i>
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
    </div>

    <section class="container py-5">

      <div class="advertise-space adv-2-columns py-5 ">

         <a class="">
             <img src="">
         </a>

         <a class=" ">
             <img src="" alt="" Loading="lazy">
         </a>

     </div>
        <div class="text-right container">
            <span class=" mark-title">
            </span>
            <span class="title-sec text-black ">الاكثر مشاهدة
            </span>
        </div>

        <div class="row ">
            @foreach ($libraries_most_views as $library_most_views)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mt-3 d-flex justify-content-center ">
                    <div style="width: 350px; height: 370px;" class="card mb-3 box">
                        <a style="height: 220px" href="{{ route('library_details', $library_most_views->id) }}">
                            <div style="position: relative;">
                                <img src="{{ asset('storage/images/libraries/' . $library_most_views->image) }}"
                                    alt="" style="width: 100%; height: 250px; object-fit: cover;">
                                <div class="play-vid"
                                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                    <i class="fa-regular fa-play"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-text text-right"> {{ $library_most_views->title }} </h5>
                            </div>
                            <div class="container text-black-50  bg-white text-right">
                                <span class="date"> منذ
                                    {{ $library_most_views->created_at->locale('ar')->shortAbsoluteDiffForHumans() }}
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach


        </div>
    </section>

    <a href="#" class="to-top">
        <i class="fas fa-chevron-up"></i>
    </a>

    @include('partials.footer')

    <!-- video plyer -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.6.4/plyr.js"
        integrity="sha512-M/AUlH5tMMuhvt9trN4rXBjsXq9HrOUmtblZHhesbx97sGycEnXX/ws1W7yyrF8zEjotdNhYNfHOd3WMu96eKA=="
        crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('front/assets/js/videolist.js') }}"></script>
    <script src="{{ asset('front/assets/js/scroll.js') }}"></script>

    <!-- vendor files -->
    <script src="{{ asset('front/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/megaMenue.js') }}"></script>


</body>

</html>
