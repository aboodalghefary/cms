<header class="nav-scrolled" dir="rtl">
   <nav class="navbar navbar-light navbar-expand-lg bg-body-tertiary">
      <div class="container align-items-center">
         <a class="navbar-brand" href="{{ route('front_index') }}">
            <div class="logo  d-flex flex-column align-items-start">
               @php
               $logoDiv = $divs->where('name', 'logo')->first();
               @endphp
               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="87px"
                  height="51px">
                  <image x="0px" y="0px" width="87px" height="51px"
                     xlink:href="{{ asset('storage/images/div/' . $logoDiv->image) }}" />
               </svg>
               <span class="logo-text ">الاخباري</span>
            </div>
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-duotone fa-bars text-danger"></i>
         </button>
         <div class="collapse  navbar-collapse " id="navbarSupportedContent">
            <ul class=" navbar-nav navbar-main mr-auto  mb-lg-0 ">
               <li class="nav-item nav-item-main active-item ">
                  <a class="nav-link active " aria-current="page" href="{{ route('front_index') }}">الرئيسية</a>
               </li>
               @foreach ($categories as $category)
               <li class="nav-item nav-item-main news category">
                  <a class="nav-link parent_category" href="{{ route('category', ['id' => $category->id]) }}"
                     data-category="{{ $category->id }}">{{ $category->name }}</a>

                  @if (count($category->subCategories) != 0)
                  <div class="mega-menue" data-category="{{ $category->id }}">
                     <div class="mega container">

                        <div class="category-right">
                           <ul class="text-right">
                              <li class="m-0 active all sub-catttt" data-category="{{ $category->id }}">
                                 <a href="#">الكل</a>
                              </li>

                              @foreach ($category->subCategories as $subCategory)
                              <li class="m-0 sub-catttt" data-category="{{ $subCategory->id }}">
                                 <a class="sub-category-link"
                                    href="{{ route('category', ['id' => $subCategory->id]) }}">{{ $subCategory->name
                                    }}</a>
                              </li>
                              @endforeach
                           </ul>
                        </div>
                        <div class="four-category-news">
                           <span class="loader"></span>

                        </div>
                     </div>
                  </div>
                  @endif
               </li>
               @endforeach
               <li class=" nav-item nav-item-main ">
                  <a class="nav-link" href="{{ route('video_library') }}">فيديو </a>
               </li>
               <li class=" nav-item nav-item-main ">
                  <a class="nav-link" href="{{ route('image_albums') }}"> صور </a>
               </li>
               <li class="nav-item nav-item-main ">
                  <a class="nav-link" href="{{ route('contact') }}">اتصل بنا</a>
               </li>

            </ul>
            @php
            $facebook = $divs->where('name', 'facebook')->first();
            $twitter = $divs->where('name', 'twitter')->first();
            $youtube = $divs->where('name', 'youtube')->first();
            @endphp
            <ul class="navbar-nav  text-white nav-links links d-flex flex-row justify-content-end mr-auto pt-3">
               <li class="twitter"><a href="{{ $twitter->href }}"><i class=" fab fa-twitter"></i></a>
               </li>
               <li class="facebook"><a href="{{ $facebook->href }}"><i class=" fab fa-facebook-f"></i></a>
               </li>
               <li class="youtube"><a href="{{ $youtube->href }}"><i class=" fab fa-youtube"></i></a>
               </li>

            </ul>

         </div>
      </div>
   </nav>
</header>
