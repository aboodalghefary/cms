<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: "the10", Arial, "Segoe UI", "Helvetica Neue", sans-serif;
        }
    </style>
    @livewireStyles
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
    <link rel="stylesheet" href="{{ asset('front/assets/vendor/magic-master/dist/magic.css') }}">
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

        .magictime {
            animation-duration: .6s;
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
                            @foreach ($news as $index => $new)
                                @if ($index <= 5)
                                    <div class="carousel-item @if ($index === 0) active @endif">
                                        <p class="text-ticker text-right text-black-50">
                                            <span style="font-weight: bold;" class="time">
                                                قبل {{ $new->created_at->locale('ar')->shortAbsoluteDiffForHumans() }}
                                            </span>
                                            @php
                                                $slug = Str::slug($new->name);
                                            @endphp
                                            <a
                                                href="{{ route('post_details', ['id' => $new->id, 'slug' => $new->name]) }}">{{ $new->name }}</a>
                                        </p>
                                    </div>
                                @else
                                @break
                            @endif
                        @endforeach
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
        @php
            $ad1Div = $divs->where('name', 'home_ad1')->first();
            $ad2Div = $divs->where('name', 'home_ad2')->first();
            $ad3Div = $divs->where('name', 'home_ad3')->first();
            $ad4Div = $divs->where('name', 'home_ad4')->first();
        @endphp
        <!-- مساحة اعلانية -->
        <div class="advertise-space adv-2-columns py-5 " style="display: block">
            <a href="{{ $ad1Div->href }}">
                <img src="{{ asset('storage/images/div/' . $ad1Div->image) }}" style="object-fit: contain"
                    Loading="lazy">
            </a>
        </div>

        <!-- فالب التصنيف الاول (خبران بارزان و3 فرعي)-->
        <div class="template-one ">
            <!-- الاخبار الرئيسية البارزة للتنصيف )  هنا ضع اول خبرين للتصنيف الذي تريده)-->
            <div class="row  template-main  two-main-news pb-0 no-gutters">
                @foreach ($mainNews as $index => $blog)
                    @if ($index < 2)
                        <div class="col-lg-6 col-md-6 col-sm-12  mb-1 custom-col">
                            <div class="hover">
                                <div class="content boxx">
                                    <div class="column position-relative  ">
                                        @php
                                            $slug = Str::slug($blog->name);
                                        @endphp
                                        <a
                                            href="{{ route('post_details', ['id' => $blog->id, 'slug' => $blog->name]) }}">
                                            <div class="blurred-img">

                                                <img style=""
                                                    src="{{ asset('storage/images/blog/' . $blog->image) }}"
                                                    alt="Image 1">
                                            </div>

                                            <div class="text text-right bottom-right text-white ">
                                                <h6 class=" text-right">
                                                    {{ $blog->name }}
                                                </h6>
                                                <span class="time">قبل
                                                    {{ $blog->created_at->locale('ar')->shortAbsoluteDiffForHumans() }}
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <a href="{{ route('post_details', ['id' => $blog->id, 'slug' => $blog->name]) }}"
                                    class="overlay"></a>
                                <div class="label top-right">
                                    @php
                                        $category = $blog->category;
                                    @endphp
                                    <a class="cat-id" href="{{ route('category', ['id' => $category->id]) }}">
                                        <span>{{ $category->name }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!--  الاخبار الفرعية للتنصيف)  هنا ضع  ثلاثة اخبار للتصنيف)-->
            <div class="row template-sub  three-sub-news no-gutters ">
                @foreach ($mainNews as $index => $blog)
                    @if ($index > 1 && $index <= 4)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-1">
                            <div class="hover">
                                <div class="content boxx">
                                    <div class="column position-relative  ">
                                        @php
                                            $slug = Str::slug($blog->name);
                                        @endphp
                                        <a
                                            href="{{ route('post_details', ['id' => $blog->id, 'slug' => $blog->name]) }}">

                                            <div class="blurred-img">
                                                <img style=""
                                                    src="{{ asset('storage/images/blog/' . $blog->image) }}"
                                                    alt="Image 1">
                                            </div>
                                            <div class="text text-right bottom-right text-white ">
                                                <h6 class=" text-right ">
                                                    {{ $blog->name }}
                                                </h6>
                                                <span class="time "> منذ
                                                    {{ $blog->created_at->locale('ar')->shortAbsoluteDiffForHumans() }}
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <a href="{{ route('post_details', ['id' => $blog->id, 'slug' => $blog->name]) }}"
                                    class="overlay"></a>
                                <div class="label top-right">
                                    @php
                                        $category = $blog->category;
                                    @endphp
                                    <a class="cat-id" href="{{ route('category', ['id' => $category->id]) }}">
                                        <span>{{ $category->name }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- مساحة اعلانية -->
            <div class="advertise-space adv-2-columns py-5" style="display: block">
                <a class="" href="{{ $ad2Div->href }}"> <img
                        src="{{ asset('storage/images/div/' . $ad3Div->image) }}" style="object-fit: contain"
                        alt="" Loading="lazy">
                </a>
            </div>

            <!-- اخر الاخبار -->
            <div class="text-right  mb-3">
                <span class=" mark-title">
                </span>
                <span class="title-sec text-black">اخر الاخبار
                </span>
            </div>
            <div class="row ">
                <div class="container-4-columns mx-auto ">
                    @foreach ($recentNews as $blog)
                        <div class="card ">
                            @php
                                $slug = Str::slug($blog->name);
                            @endphp
                            <a href="{{ route('post_details', ['id' => $blog->id, 'slug' => $blog->name]) }}">
                                <div class="box">
                                    <a href="{{ route('post_details', $blog->id) }}">
                                        <div class="box skeleton">
                                            <img class="card-img-top"
                                                style="height: 180px; width: 100%;object-fit: cover "
                                                src="{{ asset('storage/images/blog/' . $blog->image) }}"
                                                alt="" Loading="lazy">
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        @php
                                            $category = $blog->category;
                                        @endphp
                                        <a href="{{ route('category', ['id' => $category->id]) }}"
                                            class="category-title d-block  text-right pb-2 ">{{ $blog->category->name }}
                                        </a>
                                        @php
                                            $slug = Str::slug($blog->name);
                                        @endphp
                                        <a
                                            href="{{ route('post_details', ['id' => $blog->id, 'slug' => $blog->name]) }}">
                                            <h6 class="category-desc text-right">
                                                <a href="{{ route('post_details', $blog->id) }}">
                                                    <h6 class="category-desc text-right ">
                                                        {{ $blog->name }}
                                                    </h6>
                                                </a>
                                    </div>

                                    <div class="container text-black-50 pb-2 bg-white text-right">
                                        <span class="time "> منذ
                                            {{ $blog->created_at->locale('ar')->shortAbsoluteDiffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                        </div>
                    @endforeach

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
            <div class="advertise-space adv-2-columns py-5" style="display: block">

                <a href="{{ $ad3Div->href }}"> <img src="{{ asset('storage/images/div/' . $ad3Div->image) }}"
                        style="object-fit: contain" alt="" Loading="lazy">
                </a>

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
            <div class="advertise-space adv-2-columns py-5" style="display: block">
                <a class="" href="{{ $ad4Div->href }}"> <img
                        src="{{ asset('storage/images/div/' . $ad4Div->image) }}" alt=""
                        style="object-fit: contain" Loading="lazy">
                </a>
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


        <a href="#" class="to-top ">
            <i class="fas fa-chevron-up"></i>
        </a>


        <!-- Scroll to top start -->
        <div class="scroll-top not-visible"><i class="fa fa-angle-up"></i></div>
        <!-- Scroll to Top End -->
</main>


@livewire('index-breaking-news')

<!-- تقارير خاصة -->
<div class="spec-artical bg-light  py-5 box2">

    <div class="container" dir="rtl">
        <div class="text-right  mb-3 ">
            <span class=" mark-title">
            </span>
            <span class="title-sec text-black"> تقارير خاصة </span>
        </div>
    </div>
    @php
        $reportsDiv = $divs->where('name', 'تقارير خاصة')->first();
    @endphp
    <div class="d-flex justify-content-center flex-wrap mr-3 reportsContainer "
        data-category-name="{{ $reportsDiv->content }}">




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
            @foreach ($images as $photo)
                <a style="height: fit-content; width: 290px;"
                    href="{{ asset('storage/images/photos/' . $photo->image_path) }}">
                    <div class="card" style="height: 310px;">
                        <img src="{{ asset('storage/images/photos/' . $photo->image_path) }}" alt=""
                            Loading="lazy" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </a>
            @endforeach
        </div>
        <div style="width: 100%;" class="cover-album ">
            <a href="{{ route('album_details', $album->id) }}">
                <div style=" position: relative;" class=" column position-relative img">
                    <img style="height: 310px;width: 100%; object-fit: cover"
                        src="{{ asset('storage/images/albums/' . $album->image) }}" alt=""
                        Loading="lazy">
                    <div class="text text-white text-album" dir="rtl">
                        <h6 style="position: absolute; top: 30px; right: 10px;" class="text-right">
                            {{ $album->title }}
                        </h6>
                        <i style="position: absolute; top: 10px; left: 10px;"
                            class="fa-regular fa-image text-white "></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>


<div dir="rtl">
    @include('partials.footer')
</div>

<!-- video plyer -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.6.4/plyr.js"
    integrity="sha512-M/AUlH5tMMuhvt9trN4rXBjsXq9HrOUmtblZHhesbx97sGycEnXX/ws1W7yyrF8zEjotdNhYNfHOd3WMu96eKA=="
    crossorigin="anonymous"></script>




<!--core JavaScript -->
@livewireScripts
<script src="{{ asset('front/assets/js/videolist.js') }}"></script>
<script src="{{ asset('front/assets/js/scroll.js') }}"></script>
<!-- vendor files -->
<script src="{{ asset('front/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- script lightGallery library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/autoplay/lg-autoplay.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/fullscreen/lg-fullscreen.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/share/lg-share.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/zoom/lg-zoom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/thumbnail/lg-thumbnail.min.js"></script>
<script src="{{ asset('front/assets/js/megaMenue.js') }}"></script>
<script src="{{ asset('front/assets/js/reports.js') }}"></script>
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
<script src="{{ asset('front/assets/js/skel.js') }}"></script>

</body>

</html>
