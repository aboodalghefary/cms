@extends('cms.master')
@section('title', 'الفيديوهات')

@section('tittle_1', ' اضافة فيديو ')
@section('tittle_2', ' اضافة فيديو ')


@section('styles')
@endsection


@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">اضافة فيديو</h5>
        </div>

        <div class="card-body">

            <form enctype="multipart/form-data">
                <div class="row my-3">
                    <div class="col-lg-6">
                        <label for="title">العنوان</label>
                        <input type="text" class="form-control" id="title" placeholder="العنوان">
                        @error('title')
                            <div class="text-danger" id="title-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-lg-6">
                        <label for="video_path">الفيديو</label>
                        <input type="text" class="form-control" placeholder="عنوان الفيديو من اليوتيوب" id="video_path">
                        @error('video_path')
                            <div class="text-danger" id="video_path-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <input type="text" class="form-control" id="library_id" value="{{ $library_id }}" hidden disabled>

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
            formData.append('library_id', document.getElementById('library_id').value);
            formData.append('video_path', document.getElementById('video_path').value);
            store('/cms/admin/videos', formData);
        }
    </script>
@endsection
