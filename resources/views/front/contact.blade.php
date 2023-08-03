<!DOCTYPE html>
<html lang="ar" dir="rtl">

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
            <div class="main container contact d-flex flex-column justify-content-center" >
                <div class="row  no-gutters ">


                  <div class="col-lg-7 col-sm-12 pb-4 " style="padding-right: 35px!important; padding-left: 35px!important;">
                                          <form class=""  action="">
                            <div class="d-flex justify-content-between">
                                <input type="text" class="form-control my-3 px-4 py-3" name="name" id="name"
                                    placeholder="الاسم">
                                <input type="email" class="form-control my-3 px-4 py-3" name="email" id="email"
                                    placeholder="البريد الالكتروني">
                            </div>
                            <input style="width: 100%;" type="text" class="form-control px-4 py-3 mb-3"
                                name="title" id="title" placeholder="الموضوع">
                            <textarea style="outline: none" id="content" placeholder="نص الرسالة" class="p-3"></textarea>
                            <button type="button" onclick="performStore()" class="btn main-btn mt-5 mb-3">ارسال
                                الرسالة</button>
                        </form>
                    </div>


                    <div class=" connect-title col-lg-5 col-sm-12 pt-3 border mx-auto ">
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
