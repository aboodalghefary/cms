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
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Harmattan:wght@500&family=Marhey&display=swap">
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
            <a href="index.html">{{ $tag->name }} </a>
         </li>
      </div>
   </ol>

   <main class="main container  d-flex flex-column justify-content-center  py-5" style="min-height: 100vh;">

      @php
      $ad1Div = $divs->where('name', 'tag_ad')->first();
      @endphp
      <div class="advertise-space adv-2-columns py-5 " style="display: block">
         <a href="{{ $ad1Div->href }}">
            <img src="{{ asset('storage/images/div/' . $ad1Div->image) }}" style="object-fit: contain" Loading="lazy">
         </a>
      </div>
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
                        <img style="object-fit: cover; width: 100%; height: 260px; object-position: 0px -17px;" class=""
                           src="{{ asset('storage/images/blog/' . $blogData['image']) }}" alt="Image 1">
                     </div>

                     <div class="text text-right bottom-right text-white ">
                        <h6 class=" text-right">
                           {{ $blogData['name'] }}
                        </h6>
                        <span class="time ">قبل
                           {{ \Carbon\Carbon::parse($blogData['created_at'])->locale('ar')->shortAbsoluteDiffForHumans()
                           }}
                        </span>
                     </div>
                  </a>
               </div>

            </div>
            @endforeach


         </div>
         <div class="row">

            @foreach ($allBlogs as $key => $blog)
            @if ($key < 2) @continue @endif <div class="col-lg-3 col-md-4 col-sm-12 mt-5">
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
      </div>

   </main>



   @include('partials.footer')

   <!-- vendor files -->
   <script src="{{ asset('front/assets/vendor/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('front/assets/js/megaMenue.js') }}"></script>

</body>

</html>
