@extends('cms.master')
@section('title', 'قوالب تصنيفات الفرونت ')

@section('tittle_1', ' اضافة قالب تصنيفات ')
@section('tittle_2', ' اضافة قالب تصنيفات ')


@section('styles')
@endsection


@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">اضافة قالب تصنيفات</h5>
        </div>

        <div class="card-body">

            <form enctype="multipart/form-data">
                <div class="form-group col-md-6">
                    <label for="template"> القالب </label>
                    <select class="form-select" name="template" id="template" aria-label="form-select-sm example">
                        <option value="template-one"> القالب 1 </option>
                        <option value="template-two"> القالب 2 </option>
                        <option value="template-three"> القالب 3 </option>
                        <option value="template-four"> القالب 4 </option>
                        <option value="template-five"> القالب 5 </option>

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="categories"> الاصناف</label>
                    <select multiple="multiple" class="form-control select" data-placeholder="Select something"
                        name="categories" id="categories" aria-label="form-select-sm example">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group my-3">
                    <button type="button" onclick="performStore()" class="btn btn-dark" id="create-button">إنشاء</button>
                </div>
            </form>
        </div>
    </div>


@endsection


@section('scripts')
    <script src="{{ asset('cms/assets/js/vendor/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('cms/assets/demo/pages/form_select2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.selectpicker').selectpicker();
        });

        function performStore() {
            let formData = new FormData();
            formData.append('template', document.getElementById('template').value);
            let selectedCategories = $('#categories').val();
            formData.append('categories', selectedCategories);
            store('/cms/admin/rows', formData);
        }
    </script>
@endsection
