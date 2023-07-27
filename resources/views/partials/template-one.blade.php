<div class="row mt-5 pt-5 mb-5 bg-black-sec px-3">
    <div class="text-right mb-3">
        <span class=" mark-title">
        </span>
        <span class="title-sec text-white"> {{ $categories[0]->name }}
        </span>
    </div>

    <div class="container-3-columns">
        <!-- الخبران الرئيسيان البارزان في هذا القالب -->
        @if (isset($categories[0]->blogs[0]))
            <div class="column text-right pt-3 ">
                <div style="width: 330px; height: 285px; background-image: url({{ asset('storage/images/blog/' . $categories[0]->blogs[0]->image ?? null) }});"
                    class="column position-relative ">
                    <a href="{{ route('post_details', ['id' => $categories[0]->blogs[0]->id]) }}">
                        <div class="text text-right bottom-right text-white ">
                            <h6 class=" text-right"> {{ $categories[0]->blogs[0]->name }} </h6>
                            <span class="date "> {{ $categories[0]->blogs[0]->date }} </span>
                        </div>
                    </a>
                </div>
            </div>
        @endif

        @if (isset($categories[0]->blogs[1]))
            <div class="column text-right pt-3">
                <div style="width: 330px; height: 285px; background-image: url({{ asset('storage/images/blog/' . $categories[0]->blogs[1]->image ?? null) }});"
                    class="column position-relative ">
                    <a href="{{ route('post_details', ['id' => $categories[0]->blogs[0]->id]) }}">
                        <div class="text text-right bottom-right text-white ">
                            <h6 class=" text-right"> {{ $categories[0]->blogs[1]->name ?? null }} </h6>
                            <span class="date "> {{ $categories[0]->blogs[1]->date ?? null }} </span>
                        </div>
                    </a>
                </div>
            </div>
        @endif

        <!-- هذا العمود يحتوي على 3 اخبار تابعة للتصنيف نفسه -->
        <div class="column pb-5">
            @if (isset($categories[0]->blogs[2]))
                <div class="box d-flex align-items-center py-3 ">
                    <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[2]->image ?? null) }} );"
                        class=" text-right">
                        <a href="{{ route('post_details', ['id' => $categories[0]->blogs[0]->id]) }}"> </a>
                    </div>
                    <div class="text text-right  text-white mr-3">
                        <h6 class="text-right ">
                            {{ $categories[0]->blogs[2]->name ?? null }}
                        </h6>
                        <span class="date text-white-50">{{ $categories[0]->blogs[2]->date ?? null }} </span>
                    </div>
                </div>
            @endif

            @if (isset($categories[0]->blogs[3]))
                <div class="box d-flex align-items-center  py-3  ">
                    <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[3]->image ?? null) }} );"
                        class="text-right">
                        <a href="{{ route('post_details', ['id' => $categories[0]->blogs[0]->id]) }}"> </a>
                    </div>
                    <div class="text text-right  text-white mr-3 ">
                        <h6 class="text-right ">
                            {{ $categories[0]->blogs[3]->name ?? null }}
                        </h6>
                        <span class="date text-white-50"> {{ $categories[0]->blogs[3]->date ?? null }} </span>
                    </div>
                </div>
            @endif
            @if (isset($categories[0]->blogs[4]))
                <div class="box d-flex align-items-center py-3   ">
                    <div style="width: 100px; height: 75px; background-image: url({{ asset('storage/images/blog/' . $categories[0]->blogs[4]->image ?? null) }} );"
                        class="text-right">
                        <a href="{{ route('post_details', ['id' => $categories[0]->blogs[0]->id]) }}"> </a>
                    </div>
                    <div class="text text-right  text-white  mr-3">
                        <h6 class="text-right ">
                            {{ $categories[0]->blogs[4]->name ?? null }}
                        </h6>
                        <span class="date text-white-50"> {{ $categories[0]->blogs[4]->date ?? null }} </span>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
