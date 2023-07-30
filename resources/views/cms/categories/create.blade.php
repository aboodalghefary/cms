@extends('cms.master')
@section('title', 'التصنيفات')

@section('tittle_1', ' اضافة التصنيف ')
@section('tittle_2', ' اضافة التصنيف ')


@section('styles')
    <style>
        .color {
            color: #fff;
            margin-inline: 15px;
            width: 35px;
        }
    </style>
@endsection


@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">اضافة التصنيف</h5>
        </div>

        <div class="card-body">

            <form enctype="multipart/form-data">
                <div class="row my-3">
                    <div class="col-lg-6">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" id="name" placeholder="الاسم" wire:model="name">
                        @error('name')
                            <div class="text-danger" id="name-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="parent_id">الفئة الأب:</label>
                        <select name="parent_id" id="parent_id" class="form-select select">
                            <optgroup>
                                <option value="">بدون فئة أب</option>
                            </optgroup>

                            @foreach ($categories as $category)
                                @if ($category->parent_id == null)
                                    <optgroup label=" فئة {{ $category->name }} ">
                                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                        @foreach ($category->subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}"> ---- {{ $subCategory->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endif
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="image">الصورة </label>
                        <input type="file" class="form-control" id="image" wire:model="image">
                        @error('image')
                            <div class="text-danger" id="image-error">{{ $message }}</div>
                        @enderror
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
            formData.append('image', document.getElementById('image').files[0]);
            formData.append('parent_id', document.getElementById('parent_id').value);
            store('/cms/admin/categories', formData);
        }


    </script>
    <script src="{{ asset('cms/assets/js/vendor/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('cms/assets/demo/pages/form_select2.js') }}"></script>
@endsection
