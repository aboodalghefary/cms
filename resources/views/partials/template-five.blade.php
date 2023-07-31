<div class="row d-flex justify-content-between">
    @foreach ($categories as $category)
        <div style="width: 350px;" class="  py-3 my-2 mx-auto px-4  border  ">
            <div class="text-right mb-3">
                <span class="mark-title"></span>
                <a class="cat-id"  href="{{ route('category', ['id' => $category->id]) }}">
                  <span class="title-sec text-black">{{ $category->name }}</span>
               </a>
            </div>
            @php
                $counter = 0;
            @endphp
            @foreach ($category->blogs as $blog)
                @if ($counter < 3)
                    <div class=" d-flex align-items-center py-3  ">
                        <div class="lay">
                            <div style="width: 100px; height: 75px; background-size: cover; background-repeat: no-repeat; background-image: linear-gradient(to bottom right, rgb(0 0 0 / 0%), rgb(0 0 0 / 40%)), url({{ asset('storage/images/blog/' . $blog->image ?? null) }});"
                                class="text-right">
                            </div>
                            <a href=" {{ route('post_details', ['id' => $blog->id]) }} "
                                style="display: flex; align-items: center; justify-content: center;"
                                class="overlayy overlayFade">
                                <i style="display: block; color: white; font-size: 25px;"
                                    class="fa-solid fa-link-simple"></i>
                            </a>
                        </div>
                        <a href=" {{ route('post_details', ['id' => $blog->id]) }} "
                            class="text text-right text-black mr-3">
                            <h6 class="text-right">
                                {{ $blog->name }}
                            </h6>
                            <span class="date text-black-50">{{ $blog->date }}</span>
                        </a>
                    </div>
                    @php
                        $counter++;
                    @endphp
                @else
                @break
            @endif
        @endforeach
    </div>
@endforeach
</div>
