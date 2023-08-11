<div wire:poll.750ms>

    @if ($breackingNews != null)
        <div class="breaking-news  w-100 text-right d-flex magictime spaceInDown" style="animation-delay:2ms"
            dir="rtl">
            <div class="container">
                <div class="ajel-news d-flex align-items-center">
                    <div class="right">
                        <p style="width: 130px" class="bg-white ajeel m-0 py-2">عاجل</p>
                        <div style="width: fit-content" class="logo">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="91px" height="60px">
                                <image x="0px" y="0px" width="91px" height="65px"
                                    xlink:href="{{ asset('front/assets/images/logo-b.png') }}" />
                            </svg>
                        </div>
                    </div>
                    <div class="left">
                        <div class="title text-end py-2 mx-5 fs-1 d-flex align-items-center text-white">
                            <a href="{{ $breackingNews->href }}"
                                class="text-bg-danger fs-1">{{ $breackingNews->title }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
