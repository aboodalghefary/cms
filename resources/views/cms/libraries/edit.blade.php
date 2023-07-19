@extends('cms.master')
@section('title', 'مكتبات الفيديو')

@section('tittle_1', ' تعديل مكتبة الفيديو ')
@section('tittle_2', ' تعديل مكتبة الفيديو ')


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
            <h5 class="mb-0">تعديل مكتبة الفيديو</h5>
        </div>

        <div class="card-body">

            <form enctype="multipart/form-data">
                <div class="row my-3">
                    <div class="col-lg-6">
                        <label for="title">العنوان</label>
                        <input type="text" class="form-control" placeholder="{{ $library->title }}"
                            value="{{ $library->title }}" id="title">
                        @error('title')
                            <div class="text-danger" id="title-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group my-3">
                    <button type="button" onclick="performUpdate({{ $library->id }})" class="btn btn-dark"
                        id="create-button">تعديل</button>
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
            formData.append('title', document.getElementById('title').value);
            storeRedirect('/cms/admin/libraries_update/' + id, formData, '/cms/admin/libraries/');
        }
    </script>
@endsection
