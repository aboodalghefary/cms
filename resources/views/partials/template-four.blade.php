<div class="row  d-flex justify-content-between">
    <!--    (بارز)خبر للعمود الاول في التصنيف الاول -->
    <div class="col-xl-4 col-lg-6 col-md-6  text-right py-3 ">
        <div class="text-right  mb-3">
            <span class=" mark-title">
            </span>
            <span class="title-sec text-black">{{ $categories[0]->name }}</span>
        </div>

        <div class="hover ">

            <div class="content  ">
                <a href="{{ route('post_details', ['id' => $categories[0]->blogs[0]->id]) }}">
                    <div style="width: 350px; height: 285px; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url({{ asset('storage/images/blog/' . $categories[0]->blogs[0]->image ?? null) }});"
                        class="column position-relative ">
                        <div class="text text-right bottom-right text-white ">
                            <h6 class=" text-right">
                                {{ $categories[0]->blogs[0]->name }}
                            </h6>
                            <span class="date "> {{ $categories[0]->blogs[0]->date }}
                            </span>
                        </div>
                    </div>
                </a>

            </div>

            <a href="{{ route('post_details', ['id' => $categories[0]->blogs[0]->id]) }}" class="overlay"></a>

        </div>

    </div>

    <!-- في العمود الثاني لنفس التصنيف يوجد 3 اخبار -->
    <div class="scc2 col-xl-4 col-lg-6  col-md-6 col-sm-12 mx-auto ">
        <a href="{{ route('post_details', ['id' => $categories[0]->blogs[1]->id]) }}">
            <div class=" d-flex align-items-center py-3 ">
                <div class="lay">
                    <div style="width: 100px; height: 75px; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url( {{ asset('storage/images/blog/' . $categories[0]->blogs[1]->image ?? null) }} );"
                        class="img text-right">
                    </div>
                    <a href="{{ route('post_details', ['id' => $categories[0]->blogs[1]->id]) }}"
                        style="display: flex; align-items: center; justify-content: center;"
                        class="overlayy overlayFade">
                        <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
                    </a>
                </div>
                <a href="" class="text text-right  text-black mr-3">
                    <h6 class="text-right "> {{ $categories[0]->blogs[1]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[0]->blogs[1]->date }}</span>
                </a>
            </div>
        </a>
        <a href="{{ route('post_details', ['id' => $categories[1]->blogs[1]->id]) }}">
            <div class=" d-flex align-items-center py-3 ">

                <div class="lay">
                    <div style="width: 100px; height: 75px; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url( {{ asset('storage/images/blog/' . $categories[1]->blogs[1]->image ?? null) }} );"
                        class="img text-right">
                    </div>
                    <a href="{{ route('post_details', ['id' => $categories[1]->blogs[1]->id]) }}"
                        style="display: flex; align-items: center; justify-content: center;"
                        class="overlayy overlayFade">
                        <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
                    </a>
                </div>
                <a href="" class="text text-right  text-black mr-3">
                    <h6 class="text-right "> {{ $categories[1]->blogs[1]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[1]->blogs[1]->date }}</span>
                </a>
            </div>
        </a>
        <a href="{{ route('post_details', ['id' => $categories[1]->blogs[2]->id]) }}">
            <div class=" d-flex align-items-center py-3 ">
                <div class="lay">
                    <div style="width: 100px; height: 75px; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url( {{ asset('storage/images/blog/' . $categories[1]->blogs[2]->image ?? null) }} );"
                        class="img text-right">
                    </div>
                    <a href="{{ route('post_details', ['id' => $categories[1]->blogs[2]->id]) }}"
                        style="display: flex; align-items: center; justify-content: center;"
                        class="overlayy overlayFade">
                        <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
                    </a>
                </div>
                <a href="" class="text text-right  text-black mr-3">
                    <h6 class="text-right "> {{ $categories[1]->blogs[2]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[1]->blogs[2]->date }}</span>
                </a>
            </div>
        </a>
    </div>

    <!-- هذا التصنيف به 3 اخبار مباشرة بدون اي اخبار بارزة -->
    <div class="col-xl-4 col-lg-6  col-md-6 col-sm-12 py-3   border mx-auto  ">
        <div class="text-right  mb-3   ">
            <span class=" mark-title">
            </span>
            <span class="title-sec text-black"> تكنولوجيا </span>
        </div>
        <a href="{{ route('post_details', ['id' => $categories[0]->blogs[1]->id]) }}">
            <div class=" d-flex align-items-center py-3 ">
                <div class="lay">
                    <div style="width: 100px; height: 75px; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url( {{ asset('storage/images/blog/' . $categories[0]->blogs[1]->image ?? null) }} );"
                        class="img text-right">
                    </div>
                    <a href="{{ route('post_details', ['id' => $categories[0]->blogs[1]->id]) }}"
                        style="display: flex; align-items: center; justify-content: center;"
                        class="overlayy overlayFade">
                        <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
                    </a>
                </div>
                <a href="{{ route('post_details', ['id' => $categories[0]->blogs[1]->id]) }}"
                    class="text text-right  text-black mr-3">
                    <h6 class="text-right "> {{ $categories[0]->blogs[1]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[0]->blogs[1]->date }}</span>
                </a>
            </div>
        </a>
        <a href="{{ route('post_details', ['id' => $categories[1]->blogs[1]->id]) }}">
            <div class=" d-flex align-items-center py-3 ">
                <div class="lay">
                    <div style="width: 100px; height: 75px; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url( {{ asset('storage/images/blog/' . $categories[0]->blogs[1]->image ?? null) }} );"
                        class="img text-right">
                    </div>
                    <a href="{{ route('post_details', ['id' => $categories[1]->blogs[1]->id]) }}"
                        style="display: flex; align-items: center; justify-content: center;"
                        class="overlayy overlayFade">
                        <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
                    </a>
                </div>
                <a href="{{ route('post_details', ['id' => $categories[1]->blogs[1]->id]) }}"
                    class="text text-right  text-black mr-3">
                    <h6 class="text-right "> {{ $categories[1]->blogs[1]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[1]->blogs[1]->date }}</span>
                </a>
            </div>
        </a>
        <a href="{{ route('post_details', ['id' => $categories[1]->blogs[2]->id]) }}">
            <div class=" d-flex align-items-center py-3 ">

                <div class="lay">
                    <div style="width: 100px; height: 75px; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url( {{ asset('storage/images/blog/' . $categories[1]->blogs[2]->image ?? null) }} );"
                        class="img text-right">
                    </div>
                    <a href="{{ route('post_details', ['id' => $categories[1]->blogs[2]->id]) }}"
                        style="display: flex; align-items: center; justify-content: center;"
                        class="overlayy overlayFade">
                        <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
                    </a>
                </div>
                <a href="{{ route('post_details', ['id' => $categories[1]->blogs[2]->id]) }}"
                    class="text text-right  text-black mr-3">
                    <h6 class="text-right "> {{ $categories[1]->blogs[2]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[1]->blogs[2]->date }}</span>
                </a>
            </div>
        </a>

    </div>
</div>
