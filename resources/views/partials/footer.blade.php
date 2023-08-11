<footer>
   <div class=" footer text-white  ">
      @php
      $facebook = $divs->where('name', 'facebook')->first();
      $twitter = $divs->where('name', 'twitter')->first();
      $youtube = $divs->where('name', 'youtube')->first();
      $privacy = $divs->where('name', 'privacy')->first();
      @endphp
      <div class=" mx-auto  "> {{ $privacy->content }} </div>
      <div class=" d-flex  justify-content-center">
         <ul class="d-flex links justify-content-center">
            <li class="mt-4 bg-white text-danger mb-sm-3 twitter"><a href="{{ $twitter->href }}"><i
                     class=" fab fa-twitter"></i></a>
            </li>
            <li class="mt-4 bg-white text-danger mb-sm-3 facebook"><a href="{{ $facebook->href }}"><i
                     class=" fab fa-facebook-f"></i></a>
            </li>
            <li class="mt-4 bg-white text-danger mb-sm-3 youtube"><a href="{{ $youtube->href }}"><i
                     class=" fab fa-youtube"></i></a></li>
         </ul>
      </div>
      <div style="height: 50px" class=" mx-auto">
         <a href="" class="logo-container navbar-brand">
            <img class="w-logo " src="{{ asset('front/assets/images/logo-w.png') }}" alt="WebLayer for web services">
            <img class="b-logo" src="{{ asset('front/assets/images/logo-b.png') }}" alt="WebLayer for web services">
         </a>
      </div>
   </div>
</footer>
