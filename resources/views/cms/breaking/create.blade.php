@extends('cms.master')
@section('title', 'الاخبار العاجلة')

@section('tittle_1', ' اضافة خبر عاجل ')
@section('tittle_2', ' اضافة خبر عاجل ')


@section('styles')
@endsection


@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">اضافة خبر عاجل</h5>
        </div>

        <div class="card-body">

            <form enctype="multipart/form-data">
                <div class="row my-3">
                    <div class="col-lg-6">
                        <label for="title">الاسم</label>
                        <input type="text" class="form-control" id="title" placeholder="اسم الخبر عاجل">
                        @error('title')
                            <div class="text-danger" id="title-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="href"> الرابط </label>
                        <input type="text" class="form-control" id="href" placeholder=" الرابط">
                        @error('href')
                            <div class="text-danger" id="href-error">{{ $message }}</div>
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
            formData.append('href', document.getElementById('href').value);
            store('/cms/admin/createBreakingNew', formData);
        }
    </script>
@endsection
