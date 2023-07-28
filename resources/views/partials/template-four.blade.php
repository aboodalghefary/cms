<div class="row  d-flex justify-content-between">
    <!--    (بارز)خبر للعمود الاول في التصنيف الاول -->
    <div class="col-xl-4 col-lg-6 col-md-6  text-right py-3  box2">
        <div class="text-right  mb-3">
            <span class=" mark-title">
            </span>
            <span class="title-sec text-black">{{ $categories[0]->name }}</span>
        </div>
        <a href="../pages/details-new.html">
            <div style="width: 330px; height: 285px; background-image: url({{ asset('storage/images/blog/' . $categories[0]->blogs[0]->image ?? null) }});"
                class="column position-relative img">
                <a href="../pages/details-new.html">
                    <div class="text text-right bottom-right text-white ">
                        <h6 class=" text-right">
                            {{ $categories[0]->blogs[0]->name }}
                        </h6>
                        <span class="date "> {{ $categories[0]->blogs[0]->date }}
                        </span>
                    </div>
                </a>
            </div>

        </a>
    </div>

    <!-- في العمود الثاني لنفس التصنيف يوجد 3 اخبار -->
    <div class="scc2 col-xl-4 col-lg-6  col-md-6 col-sm-12 mx-auto box">
        <a href="../pages/details-new.html" class=" d-flex align-items-center py-3 ">
            <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[1]->image ?? null) }} );"
                class="img text-right">
                <a href="../pages/details-new.html"> </a>
            </div>
            <div class="text text-right  text-black mr-3">
                <h6 class="text-right "> {{ $categories[0]->blogs[1]->name }}
                </h6>
                <span class="date text-black-50"> {{ $categories[0]->blogs[1]->date }}</span>
            </div>
        </a>
        <a href="../pages/details-new.html" class=" d-flex align-items-center py-3 ">
            <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[2]->image ?? null) }} );"
                class="img text-right">
                <a href="../pages/details-new.html"> </a>
            </div>
            <div class="text text-right  text-black mr-3">
                <h6 class="text-right "> {{ $categories[0]->blogs[2]->name }}
                </h6>
                <span class="date text-black-50"> {{ $categories[0]->blogs[2]->date }}</span>
            </div>
        </a>
        <a href="../pages/details-new.html" class=" d-flex align-items-center py-3 ">
            <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[3]->image ?? null) }} );"
                class="img text-right">
                <a href="../pages/details-new.html"> </a>
            </div>
            <div class="text text-right  text-black mr-3">
                <h6 class="text-right "> {{ $categories[0]->blogs[3]->name }}
                </h6>
                <span class="date text-black-50"> {{ $categories[0]->blogs[3]->date }}</span>
            </div>
        </a>
    </div>

    <!-- هذا التصنيف به 3 اخبار مباشرة بدون اي اخبار بارزة -->
    <div class="col-xl-4 col-lg-6  col-md-6 col-sm-12 py-3   border mx-auto box ">
        <div class="text-right  mb-3   ">
            <span class=" mark-title">
            </span>
            <span class="title-sec text-black"> تكنولوجيا </span>
        </div>
        <a href="../pages/details-new.html" class=" d-flex align-items-center py-3 ">
            <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[1]->image ?? null) }} );"
                class="img text-right">
                <a href="../pages/details-new.html"> </a>
            </div>
            <div class="text text-right  text-black mr-3">
                <h6 class="text-right "> {{ $categories[1]->blogs[0]->name }}
                </h6>
                <span class="date text-black-50"> {{ $categories[1]->blogs[0]->date }}</span>
            </div>
        </a>
        <a href="../pages/details-new.html" class=" d-flex align-items-center py-3 ">
            <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[1]->blogs[1]->image ?? null) }} );"
                class="img text-right">
                <a href="../pages/details-new.html"> </a>
            </div>
            <div class="text text-right  text-black mr-3">
                <h6 class="text-right "> {{ $categories[1]->blogs[1]->name }}
                </h6>
                <span class="date text-black-50"> {{ $categories[1]->blogs[1]->date }}</span>
            </div>
        </a>
        <a href="../pages/details-new.html" class=" d-flex align-items-center py-3 ">
            <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[1]->blogs[2]->image ?? null) }} );"
                class="img text-right">
                <a href="../pages/details-new.html"> </a>
            </div>
            <div class="text text-right  text-black mr-3">
                <h6 class="text-right "> {{ $categories[1]->blogs[2]->name }}
                </h6>
                <span class="date text-black-50"> {{ $categories[1]->blogs[2]->date }}</span>
            </div>
        </a>

    </div>
</div>
