<div class="row-custom">
    <div class="container-3-columns mx-auto">
        <!--  عمود يحتوي على الخبر الرئيسي البارز والخبر الذي يليه الفرعي-->
        <div class="column  text-right pt-3 ">
            <div class="text-right  pb-4">
                <span class=" mark-title">
                </span>

                <a class="cat-id" href="{{ route('category', ['id' => $category->id]) }}">
                    <span class="title-sec text-black"> {{ $categories[0]->name }}
                    </span> </a>
            </div>
            <!-- الخبر البارز -->
            <div class="hover ">

                <div class="content  ">
                    <a href="{{ route('post_details', ['id' => $categories[0]->blogs[0]->id]) }}">
                        <div style="background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url({{ asset('storage/images/blog/' . $categories[0]->blogs[0]->image ?? null) }});"
                            class="column position-relative skeleton">
                            <div class="text text-right bottom-right text-white ">
                                <h6 class=" text-right"> {{ $categories[0]->blogs[0]->name }} </h6>
                                <span class="date "> {{ $categories[0]->blogs[0]->date }}</span>
                            </div>
                        </div>
                    </a>
                </div>

                <a href="{{ route('post_details', ['id' => $categories[0]->blogs[0]->id]) }}" class="overlay"></a>

            </div>


            <!-- الخبر الفرعي -->
            <div class=" d-flex align-items-center mt-2 pt-2 pb-3 ">

                <div class="lay">
                    <div style="width: 100px; height: 75px; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url( {{ asset('storage/images/blog/' . $categories[0]->blogs[1]->image ?? null) }});"
                        class=" text-right skeleton ">
                    </div>
                    <a href="{{ route('post_details', ['id' => $categories[0]->blogs[1]->id]) }}"
                        style="display: flex; align-items: center; justify-content: center;"
                        class="overlayy overlayFade">
                        <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
                    </a>
                </div>
                <a href="{{ route('post_details', ['id' => $categories[0]->blogs[1]->id]) }}"
                    class="text text-right  text-black mr-3">
                    <h6 class="text-right ">
                        {{ $categories[0]->blogs[1]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[0]->blogs[1]->date }} </span>
                </a>
            </div>
        </div>
        <!-- عمود الصف الثاني للتصنيف نفسه به 4 اخبار فرعية  -->
        <div class="column scc   ">
            <div class=" d-flex align-items-center pb-3  ">
                <div class="lay">
                    <div style="width: 100px; height: 75px; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url( {{ asset('storage/images/blog/' . $categories[0]->blogs[2]->image ?? null) }} );"
                        class=" text-right img skeleton">
                    </div>
                    <a href=" {{ route('post_details', ['id' => $categories[0]->blogs[2]->id]) }} "
                        style="display: flex; align-items: center; justify-content: center;"
                        class="overlayy overlayFade">
                        <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
                    </a>
                </div>
                <a href=" {{ route('post_details', ['id' => $categories[0]->blogs[2]->id]) }} "
                    class="text text-right  text-black mr-3">
                    <h6 class="text-right "> {{ $categories[0]->blogs[2]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[0]->blogs[2]->date }} </span>
                </a>
            </div>
            <div class=" d-flex align-items-center pb-3  ">
                <div class="lay">
                    <div style="width: 100px; height: 75px; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url( {{ asset('storage/images/blog/' . $categories[0]->blogs[3]->image ?? null) }} );"
                        class=" text-right img skeleton">
                    </div>
                    <a href=" {{ route('post_details', ['id' => $categories[0]->blogs[3]->id]) }} "
                        style="display: flex; align-items: center; justify-content: center;"
                        class="overlayy overlayFade">
                        <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
                    </a>
                </div>
                <a href=" {{ route('post_details', ['id' => $categories[0]->blogs[3]->id]) }} "
                    class="text text-right  text-black mr-3">
                    <h6 class="text-right "> {{ $categories[0]->blogs[3]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[0]->blogs[3]->date }} </span>
                </a>
            </div>
            <div class=" d-flex align-items-center pb-3  ">
                <div class="lay">
                    <div style="width: 100px; height: 75px; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url( {{ asset('storage/images/blog/' . $categories[0]->blogs[4]->image ?? null) }} );"
                        class=" text-right img skeleton">
                    </div>
                    <a href=" {{ route('post_details', ['id' => $categories[0]->blogs[4]->id]) }} "
                        style="display: flex; align-items: center; justify-content: center;"
                        class="overlayy overlayFade">
                        <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
                    </a>
                </div>
                <a href=" {{ route('post_details', ['id' => $categories[0]->blogs[4]->id]) }} "
                    class="text text-right  text-black mr-3">
                    <h6 class="text-right "> {{ $categories[0]->blogs[4]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[0]->blogs[4]->date }} </span>
                </a>
            </div>
            <div class=" d-flex align-items-center pb-3  ">
                <div class="lay">
                    <div style="width: 100px; height: 75px; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url( {{ asset('storage/images/blog/' . $categories[0]->blogs[5]->image ?? null) }} );"
                        class=" text-right img skeleton">
                    </div>
                    <a href="{{ route('post_details', ['id' => $categories[0]->blogs[5]->id]) }}"
                        style="display: flex; align-items: center; justify-content: center;"
                        class="overlayy overlayFade">
                        <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
                    </a>
                </div>
                <a href="{{ route('post_details', ['id' => $categories[0]->blogs[5]->id]) }}"
                    class="text text-right  text-black mr-3">
                    <h6 class="text-right "> {{ $categories[0]->blogs[5]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[0]->blogs[5]->date }} </span>
                </a>
            </div>
        </div>

        <!-- هذا العمود ليس تصنيف (هذا عمود لجدول المقالات) -->
            <div class="column artic border py-3 px-3  ">
                <div class="text-right  mb-3">
                    <span class=" mark-title">
                    </span>

                    <a class="cat-id" href="{{ route('category', ['id' => $category->id]) }}">
                        <span class="title-sec text-black"> {{ $categories[1]->name }}
                        </span> </a>
                </div>
                <div class="">
                    <div class="hover ">

                        <div class="content  ">
                            <a href="{{ route('post_details', ['id' => $categories[1]->blogs[0]->id]) }}"
                                class=" d-flex  py-2  ">
                                <div style="width: 78px; height: 78px; border-radius: 50%; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url( {{ asset('storage/images/blog/' . $categories[1]->blogs[0]->image ?? null) }} );"
                                    class=" text-right skeleton">
                                </div>
                                <div class="text text-right  text-black mr-3">
                                    <h6 class="text-right "> {{ $categories[1]->blogs[0]->name }}
                                    </h6>
                                    <span class="date text-black-50"> {{ $categories[1]->blogs[0]->date }} </span>
                                </div>
                            </a>
                        </div>

                        <a href="{{ route('post_details', ['id' => $categories[1]->blogs[0]->id]) }}"
                            class="overlay"></a>

                    </div>

                    <div class="hover ">

                        <div class="content  ">
                            <a href="{{ route('post_details', ['id' => $categories[1]->blogs[1]->id]) }}"
                                class=" d-flex  py-2  ">
                                <div style="width: 78px; height: 78px; border-radius: 50%; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url( {{ asset('storage/images/blog/' . $categories[1]->blogs[1]->image ?? null) }} );"
                                    class=" text-right skeleton">
                                </div>
                                <div class="text text-right  text-black mr-3">
                                    <h6 class="text-right "> {{ $categories[1]->blogs[1]->name }}
                                    </h6>
                                    <span class="date text-black-50"> {{ $categories[1]->blogs[1]->date }} </span>
                                </div>
                            </a>
                        </div>

                        <a href="{{ route('post_details', ['id' => $categories[1]->blogs[1]->id]) }}"
                            class="overlay"></a>

                    </div>

                    <div class="hover ">

                        <div class="content  ">
                            <a href="{{ route('post_details', ['id' => $categories[1]->blogs[2]->id]) }}"
                                class=" d-flex  py-2  ">
                                <div style="width: 78px; height: 78px; border-radius: 50%; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url( {{ asset('storage/images/blog/' . $categories[1]->blogs[3]->image ?? null) }} );"
                                    class=" text-right skeleton">
                                </div>
                                <div class="text text-right  text-black mr-3">
                                    <h6 class="text-right "> {{ $categories[1]->blogs[2]->name }}
                                    </h6>
                                    <span class="date text-black-50"> {{ $categories[1]->blogs[2]->date }} </span>
                                </div>
                            </a>
                        </div>

                        <a href="{{ route('post_details', ['id' => $categories[1]->blogs[2]->id]) }}"
                            class="overlay"></a>

                    </div>

                    <div class="hover ">

                        <div class="content  ">
                            <a href="{{ route('post_details', ['id' => $categories[1]->blogs[3]->id]) }}"
                                class=" d-flex  py-2  ">
                                <div style="width: 78px; height: 78px; border-radius: 50%; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url( {{ asset('storage/images/blog/' . $categories[1]->blogs[4]->image ?? null) }} );"
                                    class=" text-right skeleton">
                                </div>
                                <div class="text text-right  text-black mr-3">
                                    <h6 class="text-right skeleton"> {{ $categories[1]->blogs[3]->name }}
                                    </h6>
                                    <span class="date text-black-50"> {{ $categories[1]->blogs[3]->date }} </span>
                                </div>
                            </a>
                        </div>

                        <a href="{{ route('post_details', ['id' => $categories[1]->blogs[3]->id]) }}"
                            class="overlay"></a>

                    </div>

                </div>
            </div>
    </div>
</div>
