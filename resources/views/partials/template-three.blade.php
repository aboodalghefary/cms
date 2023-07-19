<div class="row template-four ">
    @foreach ($categories as $category)
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3" style="overflow: hidden;">
            <div class="text-right  mb-3 ">
                <span class=" mark-title">
                </span>
                <span class="title-sec text-black"> {{ $category->name }} </span>
            </div>

            <div style="width: 555px; height: 255px; background-image: url({{ asset('storage/images/blog/' . $category->blogs[0]->image ?? null) }});"
                class="column position-relative  ">
                <a href="../pages/details-new.html">
                    <div class="text text-right bottom-right text-white ">
                        <h6 class=" text-right">
                            {{ $category->blogs[0]->name }}
                        </h6>
                        <span class="date "> {{ $category->blogs[0]->date }} </span>
                    </div>
                </a>
            </div>
            <div class="row  mt-3">
                <div class="col-lg-6 col-md-8 col-sm-12   ">

                    <div class="card ">
                        <a href="../pages/details-new.html"><img class="card-img-top"
                                src="{{ asset('storage/images/blog/' . $category->blogs[1]->image ?? null) }}"
                                alt=""></a>
                        <div class="card-body">
                            <h6 class=" text-right">
                                {{ $category->blogs[1]->name }}
                            </h6>
                        </div>
                        <div class="container text-black-50 pb-2 bg-white text-right">
                            <span class="date"> {{ $category->blogs[1]->date }} </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-12    ">

                    <div class="card ">
                        <a href="../pages/details-new.html"><img class="card-img-top"
                                src="{{ asset('storage/images/blog/' . $category->blogs[2]->image ?? null) }}"
                                alt=""></a>
                        <div class="card-body">
                            <h6 class=" text-right">
                                {{ $category->blogs[2]->name }}
                            </h6>
                        </div>
                        <div class="container text-black-50 pb-2 bg-white text-right">
                            <span class="date"> {{ $category->blogs[2]->date }} </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endforeach

</div>
