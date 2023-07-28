@extends('cms.master')
@section('title', 'مكتبات الفيديو')

@section('tittle_1', ' اضافة مكتبة الفيديو ')
@section('tittle_2', ' اضافة مكتبة الفيديو ')


@section('styles')
@endsection


@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">اضافة مكتبة الفيديو</h5>
        </div>

        <div class="card-body">

            <form enctype="multipart/form-data">
                <div class="row my-3">
                    <div class="col-lg-6">
                        <label for="title"> مكتبة الفيديو</label>
                        <input type="text" class="form-control" placeholder="عنوان  مكتبة الفيديو"id="title">
                        @error('title')
                            <div class="text-danger" id="title-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label>الصورة</label>
                        <input type="file" class="form-control" name="image" id="image">
                        <div class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</div>
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
            formData.append('title', document.getElementById('title').value);
            formData.append('image', document.getElementById('image').files[0]);
            store('/cms/admin/libraries', formData);
        }
    </script>
@endsection
