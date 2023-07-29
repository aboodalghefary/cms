<div class="row mt-5 pt-5 mb-5 bg-black-sec px-3 pb-5">
    <div class="text-right mb-3">
        <span class=" mark-title">
        </span>
        <span class="title-sec text-white"> {{ $categories[0]->name }}
        </span>
    </div>

    <div class="container-3-columns">
        <!-- الخبران الرئيسيان البارزان في هذا القالب -->
        @if (isset($categories[0]->blogs[0]))
            <div class="hover ">
                <div class="content  ">
                    <a href="{{ route('post_details', ['id' => $categories[0]->blogs[0]->id]) }}">
                        <div class="column text-right ">
                            <div style="width: 330px; height: 285px; background-image: url({{ asset('storage/images/blog/' . $categories[0]->blogs[0]->image ?? null) }});"
                                class="column position-relative ">
                                <div class="text text-right bottom-right text-white ">
                                    <h6 class=" text-right"> {{ $categories[0]->blogs[0]->name }} </h6>
                                    <span class="date "> {{ $categories[0]->blogs[0]->date }} </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <a href="" class="overlay"></a>
            </div>
        @endif

        @if (isset($categories[0]->blogs[0]))
            <div class="hover">
                <div class="content ">
                    <a href="{{ route('post_details', ['id' => $categories[0]->blogs[1]->id]) }}">
                        <div class="column text-right ">
                            <div style="width: 330px; height: 285px; background-image: url({{ asset('storage/images/blog/' . $categories[0]->blogs[1]->image ?? null) }});"
                                class="column position-relative ">
                                <div class="text text-right bottom-right text-white ">
                                    <h6 class=" text-right"> {{ $categories[0]->blogs[1]->name }} </h6>
                                    <span class="date "> {{ $categories[0]->blogs[1]->date }} </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <a href="" class="overlay"></a>
            </div>
        @endif

        <!-- هذا العمود يحتوي على 3 اخبار تابعة للتصنيف نفسه -->
        <div class="column mt-1">
            @if (isset($categories[0]->blogs[2]))
                <a href="{{ route('post_details', ['id' => $categories[0]->blogs[0]->id]) }}">
                    <div class=" d-flex align-items-center pb-4 ">
                        <div class="lay">
                            <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[2]->image ?? null) }} );"
                                class=" text-right image">
                            </div>
                            <a href="" style="display: flex; align-items: center; justify-content: center;"
                                class="overlayy overlayFade">
                                <i style="display: block; color: white; font-size: 25px;"
                                    class="fa-solid fa-link-simple"></i>
                            </a>
                        </div>
                        <a href="" class="text text-right  text-white mr-3">
                            <h6 class="text-right ">
                                {{ $categories[0]->blogs[2]->name ?? null }}
                            </h6>
                            <span class="date text-white-50">{{ $categories[0]->blogs[2]->date ?? null }} </span>
                        </a>
                    </div>
                </a>
            @endif
            @if (isset($categories[0]->blogs[2]))
                <a href="{{ route('post_details', ['id' => $categories[0]->blogs[0]->id]) }}">
                    <div class=" d-flex align-items-center pb-4 ">
                        <div class="lay">
                            <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[2]->image ?? null) }} );"
                                class=" text-right image">
                            </div>
                            <a href="" style="display: flex; align-items: center; justify-content: center;"
                                class="overlayy overlayFade">
                                <i style="display: block; color: white; font-size: 25px;"
                                    class="fa-solid fa-link-simple"></i>
                            </a>
                        </div>
                        <a href="" class="text text-right  text-white mr-3">
                            <h6 class="text-right ">
                                {{ $categories[0]->blogs[2]->name ?? null }}
                            </h6>
                            <span class="date text-white-50">{{ $categories[0]->blogs[2]->date ?? null }} </span>
                        </a>
                    </div>
                </a>
            @endif
            @if (isset($categories[0]->blogs[3]))
                <a href="{{ route('post_details', ['id' => $categories[0]->blogs[0]->id]) }}">
                    <div class=" d-flex align-items-center pb-4 ">
                        <div class="lay">
                            <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[2]->image ?? null) }} );"
                                class=" text-right image">
                            </div>
                            <a href="" style="display: flex; align-items: center; justify-content: center;"
                                class="overlayy overlayFade">
                                <i style="display: block; color: white; font-size: 25px;"
                                    class="fa-solid fa-link-simple"></i>
                            </a>
                        </div>
                        <a href="" class="text text-right  text-white mr-3">
                            <h6 class="text-right ">
                                {{ $categories[0]->blogs[2]->name ?? null }}
                            </h6>
                            <span class="date text-white-50">{{ $categories[0]->blogs[2]->date ?? null }} </span>
                        </a>
                    </div>
                </a>
            @endif

        </div>
    </div>
</div>
