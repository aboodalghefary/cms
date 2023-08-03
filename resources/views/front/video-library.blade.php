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
            <li class="breadcrumb-item "> الرئيسية </li>
            <li class="breadcrumb-item active ">
                <a href="{{ route('video_library') }}"> مكاتب الفيديو </a>
            </li>
        </div>
    </ol>




    <main class="main container  d-flex flex-column" style="min-height: 75vh;">

      <div class="advertise-space adv-2-columns py-5 ">

         <a class="">
             <img src="">
         </a>

         <a class=" ">
             <img src="" alt="" Loading="lazy">
         </a>

     </div>
        <div class="row">
            @foreach ($libraries as $library)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mt-3 d-flex justify-content-center ">
                    <div style="width: 350px; height: 370px;" class="card mb-3 box">
                        <a style="height: 220px" href="{{ route('library_details', $library->id) }}">
                            <div style="position: relative;">
                                <img src="{{ asset('storage/images/libraries/' . $library->image) }}" alt=""
                                    style="width: 100%; height: 250px; object-fit: cover;">
                                <div class="play-vid"
                                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                    <i class="fa-regular fa-play"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-text text-right"> {{ $library->title }} </h5>
                            </div>
                            <div class="container text-black-50  bg-white text-right">
                                <span class="date"> منذ
                                    {{ $library->created_at->locale('ar')->shortAbsoluteDiffForHumans() }} </span>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>



    <a href="#" class="to-top">
        <i class="fas fa-chevron-up"></i>
    </a>

    @include('partials.footer')




<!--core JavaScript -->
<script src="{{ asset('front/assets/js/videolist.js') }}"></script>
<script src="{{ asset('front/assets/js/scroll.js') }}"></script>

<!-- vendor files -->
<script src="{{ asset('front/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>
