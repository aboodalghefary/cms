@extends('cms.master')
@section('title', 'الالبومات')

@section('tittle_1', ' اضافة الالبوم ')
@section('tittle_2', ' اضافة الالبوم ')


@section('styles')
@endsection


@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">اضافة الالبوم</h5>
        </div>

        <div class="card-body">

            <form enctype="multipart/form-data">
                <div class="row my-3">
                    <div class="mb-3">
                        <label class="form-label">اسم الdiv</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="اسم الdiv">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">اللينك</label>
                        <input type="text" name="href" id="href" class="form-control" placeholder="الرابط">
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">صورة</label>
                        <div class="col-lg-9">
                            <input type="file" id="image" name="image" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold"> المحتوى </label>
                        <textarea rows="3" cols="3" class="form-control elastic" id="content" name="content" placeholder="محتوى "
                            style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 84px;"></textarea>
                    </div>
                </div>

                <div class="form-group my-3">
                    <button type="button" onclick="performStore()" class="btn btn-dark" id="create-button">إنشاء</button>
                </div>
            </form>
        </div>
    </div>


@endsection






@section('scripts')
    <script>
        function performStore() {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('content', document.getElementById('content').value);
            formData.append('href', document.getElementById('href').value);
            formData.append('image', document.getElementById('image').files[0]);
            store('/cms/admin/divs', formData);
        }
    </script>
@endsection
