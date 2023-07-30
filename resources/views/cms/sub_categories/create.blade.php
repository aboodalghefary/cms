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
                <input type="text" id="category_id" value="{{ $category_id }}" hidden>
                {{-- <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">الصنف الرئيسي</label>
                    <div class="col-lg-9">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
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
            formData.append('category_id', document.getElementById('category_id').value);
            formData.append('image', document.getElementById('image').files[0]);

            store('/cms/admin/sub_categories_store', formData);
        }
    </script>
    <script src="{{ asset('cms/assets/js/vendor/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('cms/assets/demo/pages/form_select2.js') }}"></script>
@endsection
