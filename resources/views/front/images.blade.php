<!DOCTYPE html>
<html lang="ar" dir="ltr">

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

    <!-- animate-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!--  styles for this template -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">

    <!-- icons -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">

    <!-- fonts -->
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=neckar-bold" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Harmattan:wght@500&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Harmattan:wght@500&family=Marhey&display=swap">

</head>

<body dir="">

    @include('partials.header')

    <ol class="breadcrumb" dir="rtl">
        <div class="bread container d-flex">
            <li class="breadcrumb-item "> الرئيسية </li>
            <li class="breadcrumb-item ">
                <a href="{{ route('image_albums') }}"> البوم الصور</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="#"> {{ $album->title }} </a>
            </li>
        </div>
    </ol>

    <div class="advertise-space adv-2-columns  container">

      <a class="">
          <img src="">
      </a>

      <a class=" ">
          <img src="" alt="" Loading="lazy">
      </a>

  </div>
    <main class="main d-flex flex-column cont box " style="min-height: 70vh;">

        <div class="gallery">

            @foreach ($album->photos as $photo)
                <a class="card" href="{{ asset('storage/images/photos/' . $photo->image_path) }}">
                    <img src="{{ asset('storage/images/photos/' . $photo->image_path) }}" alt=""
                        style="object-fit: cover">
                </a>
            @endforeach
        </div>
    </main>

    <a href="#" class="to-top">
        <i class="fas fa-chevron-up"></i>
    </a>


    <div dir="rtl">
      @include('partials.footer')
   </div>
    <!-- Bootstrap core JavaScript -->
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

<script src="{{ asset('front/assets/js/megaMenue.js') }}"></script>



</body>

</html>
