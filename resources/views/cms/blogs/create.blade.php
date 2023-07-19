@extends('cms.master')
@section('title', 'التدوينات')

@section('tittle_1', ' اضافة تدوينة ')
@section('tittle_2', ' اضافة تدوينة ')


@section('styles')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <script src="https://cdn.tiny.cloud/1/c1qhsoz4xzefal9rziyi10pr4lpejtny0ntydsrebhazselp/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <style>
        .row img {
            width: auto;
            height: auto;
        }
    </style>

@endsection


@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">اضافة تدوينة</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">الاسم</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder=" الاسم ">
                </div>

                <div class="row mb-3">
                    <label class="col-form-label col-lg-3">التاريخ</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="date" id="date" name="date">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">المؤلف</label>
                    <div class="col-lg-9">
                        <select name="author" id="author" class="form-control">
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}"> {{ $author->user->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">الصنف</label>
                    <div class="col-lg-9">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">التعليقات</label>
                    <div class="col-lg-9">
                        <input type="checkbox" id="comments_toggle" data-toggle="toggle" data-on="تفعيل" data-off="تعطيل"
                            data-onstyle="success" data-offstyle="danger" checked>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">الاشارات</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control tokenfield-basic" id="tags"
                            placeholder="Select tags">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">الصورة</label>
                    <div class="col-lg-9">
                        <input type="file" class="form-control" name="image" id="image">
                        <div class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">المحتوى</label>
                    <div class="col-lg-9">
                        <textarea id="editor">
                     </textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-end align-items-center my-5">
                    <a href="{{ route('admins.index') }}" class="btn btn-light">الغاء</a>
                    <button type="button" onclick="performStore()" class="btn btn-primary ms-3"> اضافة <i
                            class="ph-paper-plane-tilt ms-2"></i></button>
                </div>
            </form>

        </div>
    </div>


@endsection






@section('scripts')
    <script src="{{ asset('cms/assets/js/vendor/forms/tags/tokenfield.min.js') }}"></script>
    <script src="{{ asset('cms/assets/js/vendor/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('cms/assets/demo/pages/form_select2.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            image_class_list: [{
                title: 'img-responsive',
                value: 'img-responsive'
            }],
            height: 500,
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/upload',
            images_upload_method: 'POST', // تعيين الطريقة إلى POST
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                console.log(value);
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                };
                input.click();
            }
        });

        $(document).ready(function() {
            $('#author').select2();
        });

        function performStore() {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('date', document.getElementById('date').value);
            formData.append('editor', tinymce.activeEditor.getContent());
            formData.append('author', document.getElementById('author').value);
            formData.append('category_id', document.getElementById('category_id').value);
            formData.append('image', document.getElementById('image').files[0]);
            formData.append('comments_enabled', $('#comments_toggle').prop('checked') ? 1 : 0);
            formData.append('tags', JSON.stringify(tfBasic.getItems()));
            store('/cms/admin/blogs', formData);

        }

        let tags = @json($tags);
        let tfBasic;

        document.querySelectorAll('.tokenfield-basic').forEach(function(element) {
            tfBasic = new Tokenfield({
                el: element,
                items: Object.entries(tags).map(([id, name]) => ({
                    value: id,
                    label: name
                }))
            });
        });
    </script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@endsection
