@extends('cms.master')
@section('title', 'الصور')

@section('tittle_1', ' تعديل الصورة ')
@section('tittle_2', ' تعديل الصورة ')


@section('styles')

@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">تعديل الصورة</h5>
        </div>

        <div class="card-body">

            <form enctype="multipart/form-data">
                <div class="row my-3">
                    <div class="col-lg-6">
                        <label for="title">العنوان</label>
                        <input type="text" class="form-control" placeholder="{{ $photo->title }}"
                            value="{{ $photo->title }}" id="title">
                        @error('title')
                            <div class="text-danger" id="title-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-lg-6">
                        <label for="image_path_path">الصورة</label>
                        <input type="file" class="form-control" id="image_path">
                        @error('image_path')
                            <div class="text-danger" id="image_path-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <input type="text" class="form-control" id="album_id" value="{{ $photo->album_id }}" hidden disabled>

                <div class="form-group my-3">
                    <button type="button" onclick="performUpdate({{ $photo->id }})" class="btn btn-dark"
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
            formData.append('title', document.getElementById('title').value);
            formData.append('album_id', document.getElementById('album_id').value);
            formData.append('image_path', document.getElementById('image_path').files[0]);
            storeRedirect('/cms/admin/photos_update/' + id, formData, '/cms/admin/photos_index/' + document.getElementById(
                'album_id').value);
        }
    </script>
@endsection
