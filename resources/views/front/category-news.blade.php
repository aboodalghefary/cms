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
            <li class="breadcrumb-item "> الرئيسية </li>
            <li class="breadcrumb-item ">
                <a href="index.html">الاخبار</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="index.html">{{ $category->name }} </a>
            </li>
        </div>
    </ol>

    <main class="main container  d-flex flex-column justify-content-center  py-5" style="min-height: 100vh;">
        <div>
            <div class="row  template-main  two-main-news pb-0 no-gutters">
                @foreach ($allBlogs as $key => $blogData)
                    @if ($key >= 2)
                        @continue
                    @endif
                    <div class="col-lg-6 col-md-6 col-sm-12  mb-1  ">
                        <div class="column position-relative img ">
                            <a href="{{ route('post_details', ['id' => $blogData['id']]) }}">
                                <div class="box">
                                    <img style="object-fit: cover; width: 100%; height: 260px; object-position: 0px -17px;"
                                        class="" src="{{ asset('storage/images/blog/' . $blogData['image']) }}"
                                        alt="Image 1">
                                </div>

                                <div class="text text-right bottom-right text-white ">
                                    <h6 class=" text-right">
                                        {{ $blogData['name'] }}
                                    </h6>
                                    <span class="time ">قبل
                                        {{ \Carbon\Carbon::parse($blogData['created_at'])->locale('ar')->shortAbsoluteDiffForHumans() }}
                                    </span>
                                </div>
                            </a>
                        </div>
                      
                    </div>
                @endforeach


            </div>
            <div class="row">

                @foreach ($allBlogs as $key => $blog)
                    @if ($key < 2)
                        @continue
                    @endif

                    <div class="col-lg-3 col-md-4 col-sm-12 mt-5">
                        <div class="card h-100 box">
                            <a href="{{ route('post_details', ['id' => $blog['id']]) }}"><img class="card-img-top"
                                    style="object-fit: cover; width: 100%; height: 260px; object-position: 0px -17px;"
                                    src="{{ asset('storage/images/blog/' . $blog['image']) }}" alt=""></a>
                            <a href="{{ route('post_details', ['id' => $blog['id']]) }}" class="card-body">
                                <h5 class="card-text text-right">
                                    {{ $blog['name'] }}
                                </h5>
                            </a>
                            <div class="container text-black-50 pb-2 bg-white text-right">
                                <span class="date"> قبل
                                    {{ \Carbon\Carbon::parse($blog['created_at'])->locale('ar')->shortAbsoluteDiffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach





            </div>
            <a href="#" class="to-top">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>

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

    <!-- vendor files -->
    <script src="{{ asset('front/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
