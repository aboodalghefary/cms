@extends('cms.master')
@section('title', 'الفيديوها')

@section('tittle_1', ' تعديل الفيديو ')
@section('tittle_2', ' تعديل الفيديو ')


@section('styles')

@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">تعديل الفيديو</h5>
        </div>

        <div class="card-body">

            <form enctype="multipart/form-data">
                <div class="row my-3">
                    <div class="col-lg-6">
                        <label for="title">العنوان</label>
                        <input type="text" class="form-control" placeholder="{{ $video->title }}"
                            value="{{ $video->title }}" id="title">
                        @error('title')
                            <div class="text-danger" id="title-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-lg-6">
                        <label for="video_path">الفيديو</label>
                        <input type="file" class="form-control" id="video_path">
                        @error('video_path')
                            <div class="text-danger" id="video_path-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <input type="text" class="form-control" id="library_id" value="{{ $video->library_id }}" hidden disabled>

                <div class="form-group my-3">
                    <button type="button" onclick="performUpdate({{ $video->id }})" class="btn btn-dark"
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
            formData.append('library_id', document.getElementById('library_id').value);
            formData.append('video_path', document.getElementById('video_path').files[0]);
            storeRedirect('/cms/admin/videos_update/' + id, formData, '/cms/admin/videos_index/' + document.getElementById(
                'library_id').value);
        }
    </script>
@endsection
