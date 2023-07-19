<div class="row d-flex justify-content-between">
    @foreach ($categories as $category)
        <div style="width: 350px;" class="col-lg-3 col-md-6 col-sm-12 py-3 my-2 border mx-auto">
            <div class="text-right mb-3">
                <span class="mark-title"></span>
                <span class="title-sec text-black">{{ $category->name }}</span>
            </div>
            @php
                $counter = 0;
            @endphp
            @foreach ($category->blogs as $blog)
                @if ($counter < 3)
                    <div class="box d-flex align-items-center py-3">
                        <div style="width: 100px; height: 75px; background-image: url({{ asset('storage/images/blog/' . $blog->image ?? null) }});"
                            class="text-right">
                            <a href="../pages/details-new.html"></a>
                        </div>
                        <div class="text text-right text-black mr-3">
                            <h6 class="text-right">
                                {{ $blog->name }}
                            </h6>
                            <span class="date text-black-50">{{ $blog->date }}</span>
                        </div>
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
