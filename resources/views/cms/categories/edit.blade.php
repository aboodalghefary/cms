@extends('cms.master')
@section('title', 'التصنيفات')

@section('tittle_1', ' تعديل التصنيف ')
@section('tittle_2', ' تعديل التصنيف ')


@section('styles')
    <style>
        .color {
            color: #fff;
            margin-inline: 15px;
            width: 35px;
        }

        .img-thumbnail {
            width: 100px !important;
            height: 100px !important;
            margin-top: 10px;
            margin-left: 10px;
        }
    </style>
@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">تعديل تصنيف</h5>
        </div>

        <div class="card-body">

            <form enctype="multipart/form-data">
                <div class="row my-3">
                    <div class="col-lg-6">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" placeholder="{{ $category->name }}"
                            value="{{ $category->name }}" id="name">
                        @error('name')
                            <div class="text-danger" id="name-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="image">الصورة </label>
                        <input type="file" class="form-control" id="image">
                        <img src="{{ asset('storage/images/category/' . $category->image) }}" alt="Category Image"
                            class="img-fluid mt-2" style="max-height: 200px;">
                        @error('image')
                            <div class="text-danger" id="image-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group my-3">
                    <button type="button" onclick="performUpdate({{ $category->id }})" class="btn btn-dark"
                        id="create-button">إنشاء</button>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('cms/assets/js/vendor/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('cms/assets/demo/pages/form_select2.js') }}"></script>
    <script>
        function performUpdate(id) {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('image', document.getElementById('image').files[0]);
            storeRedirect('/cms/admin/categories_update/' + id, formData, '/cms/admin/categories/');
        }
    </script>
@endsection
