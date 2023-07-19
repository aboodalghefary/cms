@extends('cms.master')
@section('title', 'التعليقات')

@section('tittle_1', ' اضافة التعليق ')
@section('tittle_2', ' اضافة التعليق ')


@section('styles')
@endsection


@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">اضافة التعليق</h5>
        </div>

        <div class="card-body">

            <form enctype="multipart/form-data">
                <div class="row my-3">
                    <div class="col-lg-6">
                        <label for="content">التعليق</label>
                        <textarea class="form-control" id="content" placeholder="اترك لنا تعليقا جميلا"></textarea>
                        @error('content')
                            <div class="text-danger" id="content-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <input type="text" class="form-control" id="article_id" value="{{ $blog_id }}" hidden disabled>

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
            formData.append('content', document.getElementById('content').value);
            formData.append('article_id', document.getElementById('article_id').value);
            store('/cms/admin/comments', formData);
        }
    </script>
@endsection
