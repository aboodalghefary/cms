<div class="row  d-flex justify-content-between">

    <!--    (بارز)خبر للعمود الاول في التصنيف الاول -->
    <div class="col-lg-4  mb-4   text-right ">

        <div class="text-right  mb-3">
            <span class=" mark-title">
            </span>
            <span class="title-sec text-black">{{ $categories[0]->name }}</span>
        </div>

        <div style="width: 330px; height: 285px; background-image: url({{ asset('storage/images/blog/' . $categories[0]->blogs[0]->image ?? null) }});"
            class="column position-relative ">
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
    </div>

    <!-- في العمود الثاني لنفس التصنيف يوجد 3 اخبار -->
    <div style="width: 350px;" class="col-lg-3  col-md-6 col-sm-12 py-3   mx-auto ">

        <div class="box d-flex align-items-center py-3 ">
            <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[1]->image ?? null) }} );"
                class=" text-right">
                <a href="../pages/details-new.html"> </a>
            </div>
            <div class="text text-right  text-black mr-3">
                <h6 class="text-right "> {{ $categories[0]->blogs[1]->name }}
                </h6>
                <span class="date text-black-50"> {{ $categories[0]->blogs[1]->date }}</span>
            </div>
        </div>
        <div class="box d-flex align-items-center  py-3  ">
            <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[2]->image ?? null) }} );"
                class="text-right">
                <a href="../pages/details-new.html"> </a>
            </div>
            <div class="text text-right  text-black mr-3 ">
                <h6 class="text-right "> {{ $categories[0]->blogs[2]->name }}
                </h6>
                <span class="date text-black-50"> {{ $categories[0]->blogs[2]->date }}</span>
            </div>
        </div>
        <div class="box d-flex align-items-center py-3   ">
            <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[3]->image ?? null) }} );"
                class="text-right">
                <a href="../pages/details-new.html"> </a>
            </div>
            <div class="text text-right  text-black  mr-3">
                <h6 class="text-right "> {{ $categories[0]->blogs[3]->name }}
                </h6>
                <span class="date text-black-50"> {{ $categories[0]->blogs[3]->date }}</span>
            </div>
        </div>
    </div>

    <!-- هذا التصنيف به 3 اخبار مباشرة بدون اي اخبار بارزة -->
    <div style="width: 350px;" class="col-lg-3  col-md-6 col-sm-12 py-3  border mx-auto ">
        <div class="text-right  mb-3   ">
            <span class=" mark-title">
            </span>
            <span class="title-sec text-black"> تكنولوجيا </span>
        </div>
        <div class="box d-flex align-items-center py-3 ">
            <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[1]->blogs[0]->image ?? null) }} );"
                class=" text-right">
                <a href="../pages/details-new.html"> </a>
            </div>
            <div class="text text-right  text-black mr-3">
                <h6 class="text-right "> {{ $categories[1]->blogs[0]->name }}
                </h6>
                <span class="date text-black-50"> {{ $categories[1]->blogs[0]->date }}</span>
            </div>
        </div>
        <div class="box d-flex align-items-center  py-3  ">
            <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[1]->image ?? null) }} );"
                class="text-right">
                <a href="../pages/details-new.html"> </a>
            </div>
            <div class="text text-right  text-black mr-3 ">
                <h6 class="text-right "> {{ $categories[1]->blogs[1]->name }}
                </h6>
                <span class="date text-black-50"> {{ $categories[1]->blogs[1]->date }}</span>
            </div>
        </div>
        <div class="box d-flex align-items-center py-3   ">
            <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[1]->blogs[2]->image ?? null) }} );"
                class="text-right">
                <a href="../pages/details-new.html"> </a>
            </div>
            <div class="text text-right  text-black  mr-3">
                <h6 class="text-right "> {{ $categories[1]->blogs[2]->name }}
                </h6>
                <span class="date text-black-50"> {{ $categories[1]->blogs[2]->date }}</span>
            </div>
        </div>
    </div>
</div>
