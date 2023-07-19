@extends('cms.master')
@section('title', 'الالبومات')

@section('tittle_1', ' اضافة الالبوم ')
@section('tittle_2', ' اضافة الالبوم ')


@section('styles')
@endsection


@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">اضافة الالبوم</h5>
        </div>

        <div class="card-body">

            <form enctype="multipart/form-data">
                <div class="row my-3">
                    <div class="col-lg-6">
                        <label for="title">الالبوم</label>
                        <input type="text" class="form-control" placeholder="عنوان الالبوم"id="title">
                        @error('title')
                            <div class="text-danger" id="title-error">{{ $message }}</div>
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
            formData.append('title', document.getElementById('title').value);
            store('/cms/admin/albums', formData);
        }
    </script>
@endsection
