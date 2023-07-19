<div class="row-custom">
    <div class="text-right mb-3">
        <span class=" mark-title">
        </span>
        <span class="title-sec text-black"> {{ $categories[0]->name }}
        </span>
    </div>
    <div class="container-3-columns">
        <!--  عمود يحتوي على الخبر الرئيسي البارز والخبر الذي يليه الفرعي-->
        <div class="column  text-right pt-3 ">
            <!-- الخبر البارز -->
            <div style="width: 330px; height: 285px; background-image: url({{ asset('storage/images/blog/' . $categories[0]->blogs[0]->image ?? null) }});"
                class="column position-relative ">
                <a href="../pages/details-new.html">
                    <div class="text text-right bottom-right text-white ">
                        <h6 class=" text-right"> {{ $categories[0]->blogs[0]->name }} </h6>
                        <span class="date "> {{ $categories[0]->blogs[0]->date }}</span>
                    </div>
                </a>
            </div>
            <!-- الخبر الفرعي -->
            <div class="box d-flex align-items-center py-3 ">
                <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[1]->image ?? null) }});"
                    class=" text-right">
                    <a href="../pages/details-new.html"> </a>
                </div>
                <div class="text text-right  text-black mr-3">
                    <h6 class="text-right ">
                        {{ $categories[0]->blogs[1]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[0]->blogs[1]->date }} </span>
                </div>
            </div>

        </div>
        <!-- عمود الصف الثاني للتصنيف نفسه به 4 اخبار فرعية  -->
        <div class="column ">
            <div class="box d-flex align-items-center py-3 ">
                <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[2]->image ?? null) }} );"
                    class=" text-right">
                    <a href="../pages/details-new.html"> </a>
                </div>
                <div class="text text-right  text-black mr-3">
                    <h6 class="text-right "> {{ $categories[0]->blogs[2]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[0]->blogs[2]->date }} </span>
                </div>
            </div>
            <div class="box d-flex align-items-center py-3 ">
                <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[3]->image ?? null) }} );"
                    class=" text-right">
                    <a href="../pages/details-new.html"> </a>
                </div>
                <div class="text text-right  text-black mr-3">
                    <h6 class="text-right "> {{ $categories[0]->blogs[3]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[0]->blogs[3]->date }} </span>
                </div>
            </div>
            <div class="box d-flex align-items-center  py-3  ">
                <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[4]->image ?? null) }} );"
                    class="text-right">
                    <a href="../pages/details-new.html"> </a>
                </div>
                <div class="text text-right  text-black mr-3 ">
                    <h6 class="text-right "> {{ $categories[0]->blogs[4]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[0]->blogs[4]->date }} </span>
                </div>
            </div>
            <div class="box d-flex align-items-center py-3">
                <div style="width: 100px; height: 75px; background-image: url( {{ asset('storage/images/blog/' . $categories[0]->blogs[5]->image ?? null) }} );"
                    class="text-right">
                    <a href="../pages/details-new.html"> </a>
                </div>
                <div class="text text-right  text-black  mr-3">
                    <h6 class="text-right "> {{ $categories[0]->blogs[5]->name }}
                    </h6>
                    <span class="date text-black-50"> {{ $categories[0]->blogs[5]->date }} </span>
                </div>
            </div>
        </div>
        <!-- هذا العمود ليس تصنيف (هذا عمود لجدول المقالات) -->
        <div class="column artic border py-3 px-3 ">
            <div class="text-right  mb-3">
                <span class=" mark-title">
                </span>
                <span class="title-sec text-black"> {{ $categories[1]->name }}
                </span>
            </div>
            <div class="">
                <div class="box d-flex align-items-center py-3 ">
                    <div style="width: 78px; height: 78px; border-radius: 50%; background-image: url( {{ asset('storage/images/blog/' . $categories[1]->blogs[0]->image ?? null) }} );"
                        class=" text-right">
                        <a href="../pages/details-new.html"> </a>
                    </div>
                    <div class="text text-right  text-black mr-3">
                        <h6 class="text-right "> {{ $categories[1]->blogs[0]->name }}
                        </h6>
                        <span class="date text-black-50"> {{ $categories[1]->blogs[0]->date }} </span>
                    </div>
                </div>

                <div class="box d-flex align-items-center py-3 ">
                    <div style="width: 78px; height: 78px; border-radius: 50%; background-image: url( {{ asset('storage/images/blog/' . $categories[1]->blogs[1]->image ?? null) }} );"
                        class=" text-right">
                        <a href="pages/details-new.html"> </a>
                    </div>
                    <div class="text text-right  text-black mr-3">
                        <h6 class="text-right "> {{ $categories[1]->blogs[1]->name }}
                        </h6>
                        <span class="date text-black-50"> {{ $categories[1]->blogs[1]->date }} </span>
                    </div>
                </div>

                <div class="box d-flex align-items-center py-3 ">
                    <div style="width: 78px; height: 78px; border-radius: 50%; background-image: url( {{ asset('storage/images/blog/' . $categories[1]->blogs[2]->image ?? null) }} );"
                        class=" text-right">
                        <a href="pages/details-new.html"> </a>
                    </div>
                    <div class="text text-right  text-black mr-3">
                        <h6 class="text-right "> {{ $categories[1]->blogs[2]->name }}
                        </h6>
                        <span class="date text-black-50"> {{ $categories[1]->blogs[2]->date }} </span>
                    </div>
                </div>

                <div class="box d-flex align-items-center py-3 ">
                    <div style="width: 78px; height: 78px; border-radius: 50%; background-image: url( {{ asset('storage/images/blog/' . $categories[1]->blogs[3]->image ?? null) }} );"
                        class=" text-right">
                        <a href="../pages/details-new.html"> </a>
                    </div>
                    <div class="text text-right  text-black mr-3">
                        <h6 class="text-right "> {{ $categories[1]->blogs[3]->name }}
                        </h6>
                        <span class="date text-black-50"> {{ $categories[1]->blogs[3]->date }} </span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
