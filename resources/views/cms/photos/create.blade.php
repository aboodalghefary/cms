@extends('cms.master')
@section('title', 'الصور')

@section('tittle_1', ' اضافة صورة ')
@section('tittle_2', ' اضافة صورة ')


@section('styles')
@endsection


@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">اضافة صورة</h5>
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
                        <label for="image_path">الصورة</label>
                        <input type="file" class="form-control" id="image_path">
                        @error('image_path')
                            <div class="text-danger" id="image_path-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <input type="text" class="form-control" id="album_id" value="{{ $album_id }}" hidden disabled>

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
            formData.append('album_id', document.getElementById('album_id').value);
            formData.append('image_path', document.getElementById('image_path').files[0]);
            store('/cms/admin/photos', formData);
        }
    </script>
@endsection
