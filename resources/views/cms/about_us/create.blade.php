@extends('cms.master')
@section('title', 'حولنا')

@section('tittle_1', ' اضافة حولنا ')
@section('tittle_2', ' اضافة حولنا ')


@section('styles')

@endsection


@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">اضافة حولنا</h5>
        </div>

        <div class="card-body">
            <h1>إنشاء صفحة حولنا</h1>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form enctype="multipart/form-data">
                <div class="col-lg-6">
                    <label for="titleAr">عنوان الصفحة </label>
                    <input type="text" class="form-control" id="title" placeholder="عنوان الصفحة">
                    @error('title')
                        <div class="text-danger" id="title-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row my-3">
                    <div class="col-lg-6">
                        <label for="content">محتوى الصفحة </label>
                        <textarea class="form-control" id="content" placeholder="محتوى الصفحة "></textarea>
                        @error('content')
                            <div class="text-danger" id="content-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="image">الصورة</label>
                        <input type="file" class="form-control" id="image">
                        @error('image')
                            <div class="text-danger" id="image-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group my-3">
                    <button type="submit" class="btn btn-dark" id="create-button">إنشاء</button>
                </div>
            </form>
        </div>
    </div>


@endsection






@section('scripts')
    <script src="{{ asset('cms/assets/js/vendor/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('cms/assets/demo/pages/form_select2.js') }}"></script>
@endsection
