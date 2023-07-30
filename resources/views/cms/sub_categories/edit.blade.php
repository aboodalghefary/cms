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
                        <input type="text" class="form-control" placeholder="{{ $sub_category->name }}"
                            value="{{ $sub_category->name }}" id="name">
                        @error('name')
                            <div class="text-danger" id="name-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="image">الصورة </label>
                        <input type="file" class="form-control" id="image">
                        <img src="{{ asset('storage/images/category/' . $sub_category->image) }}" alt="Category Image"
                            class="img-fluid mt-2" style="max-height: 200px;">
                        @error('image')
                            <div class="text-danger" id="image-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">الصنف الرئيسي</label>
                    <div class="col-lg-9">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $sub_category->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group my-3">
                    <button type="button" onclick="performUpdate({{ $sub_category->id }})" class="btn btn-dark"
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
            formData.append('category_id', document.getElementById('category_id').value);
            formData.append('image', document.getElementById('image').files[0]);
            storeRedirect('/cms/admin/sub_categories_update/' + id, formData, '/cms/admin/categories/');
        }
    </script>
@endsection
