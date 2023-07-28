<div class="row d-flex justify-content-between">
    @foreach ($categories as $category)
        <div style="width: 350px;" class="  py-3 my-2 mx-auto px-4  border box ">
            <div class="text-right mb-3">
                <span class="mark-title"></span>
                <span class="title-sec text-black">{{ $category->name }}</span>
            </div>
            @php
                $counter = 0;
            @endphp
            @foreach ($category->blogs as $blog)
                @if ($counter < 3)
                    <a href="../pages/details-new.html" class=" d-flex align-items-center py-3  ">
                        <div style="width: 100px; height: 75px; background-image: url({{ asset('storage/images/blog/' . $blog->image ?? null) }});"
                            class="text-right">
                        </div>
                        <div class="text text-right text-black mr-3">
                            <h6 class="text-right">
                                {{ $blog->name }}
                            </h6>
                            <span class="date text-black-50">{{ $blog->date }}</span>
                        </div>
                    </a>
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
