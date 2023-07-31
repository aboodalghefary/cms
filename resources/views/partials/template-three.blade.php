<div class="row template-four ">
    @foreach ($categories as $category)
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3" style="overflow: hidden;">
            <div class="text-right  mb-3 ">
                <span class=" mark-title">
                </span>
                <a class="cat-id" href="{{ route('category', ['id' => $category->id]) }}">
                  <span class="title-sec text-black"> {{ $category->name }} </span>
               </span>     </a>
            </div>
            <div class="hover ">
                <div class="content  ">
                    <div class="2">
                        <a href="{{ route('post_details', ['id' => $category->blogs[0]->id]) }}">

                            <div style="width: 555px; height: 255px; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url({{ asset('storage/images/blog/' . $category->blogs[0]->image ?? null) }});"
                                class="column position-relative  ">
                                <div class="text text-right bottom-right text-white ">
                                    <h6 class=" text-right">
                                        {{ $category->blogs[0]->name }}
                                    </h6>
                                    <span class="date "> {{ $category->blogs[0]->date }} </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <a href=" {{ route('post_details', ['id' => $category->blogs[0]->id]) }} " class="overlay"></a>
            </div>
            <div class="row  mt-3">

                <div href="{{ route('post_details', ['id' => $category->blogs[1]->id]) }}"
                    class="col-lg-6 col-md-8 col-sm-12   ">
                    <div style="width: 260px; " class=" card">
                        <div class="lay">
                            <img style="height: 155px" class="card-img-top"
                                src="{{ asset('storage/images/blog/' . $category->blogs[1]->image ?? null) }}"
                                alt="">
                            <a href=" {{ route('post_details', ['id' => $category->blogs[1]->id]) }} "
                                style="display: flex; align-items: center; justify-content: center;"
                                class="overlayy overlayFade">
                                <i style="display: block; color: white; font-size: 25px;"
                                    class="fa-solid fa-link-simple"></i>
                            </a>
                        </div>
                        <a href=" {{ route('post_details', ['id' => $category->blogs[1]->id]) }} " class="card-body">
                            <h6 class=" text-right">
                                {{ $category->blogs[1]->name }}
                            </h6>
                        </a>
                        <div class="container text-black-50 pb-2 bg-white text-right">
                            <span class="date"> {{ $category->blogs[1]->date }} </span>
                        </div>
                    </div>
                </div>

                <div href="{{ route('post_details', ['id' => $category->blogs[2]->id]) }}"
                    class="col-lg-6 col-md-8 col-sm-12   ">
                    <div style="width: 260px; " class=" card">

                        <div class="lay">
                            <img style="height: 155px" class="card-img-top"
                                src="{{ asset('storage/images/blog/' . $category->blogs[2]->image ?? null) }}"
                                alt="">
                            <a href=" {{ route('post_details', ['id' => $category->blogs[2]->id]) }} "
                                style="display: flex; align-items: center; justify-content: center;"
                                class="overlayy overlayFade">
                                <i style="display: block; color: white; font-size: 25px;"
                                    class="fa-solid fa-link-simple"></i>
                            </a>
                        </div>
                        <a href=" {{ route('post_details', ['id' => $category->blogs[2]->id]) }} " class="card-body">
                            <h6 class=" text-right">
                                {{ $category->blogs[2]->name }}
                            </h6>
                        </a>
                        <div class="container text-black-50 pb-2 bg-white text-right">
                            <span class="date"> {{ $category->blogs[2]->date }} </span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    @endforeach

</div>
