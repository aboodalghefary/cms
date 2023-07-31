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
                        <option value="template-one" @if ($row->template == 'template-one') selected @endif> القالب 1 </option>
                        <option value="template-two" @if ($row->template == 'template-two') selected @endif> القالب 2 </option>
                        <option value="template-three" @if ($row->template == 'template-three') selected @endif> القالب 3 </option>
                        <option value="template-four" @if ($row->template == 'template-four') selected @endif> القالب 4 </option>
                        <option value="template-five" @if ($row->template == 'template-five') selected @endif> القالب 5 </option>

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="categories"> الاصناف</label>
                    <select multiple="multiple" class="form-select select selectpicker" data-placeholder="Select something"
                        name="categories" id="categories" aria-label="form-select-sm example">
                        @foreach ($categories as $category)
                            @php
                                $categoryIds = $row->categories->pluck('id')->toArray();
                            @endphp
                            <option value="{{ $category->id }}" @if (in_array($category->id, $categoryIds)) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group my-3">
                    <button type="button" onclick="performUpdate({{ $row->id }})" class="btn btn-dark"
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
        $(document).ready(function() {
            $('.selectpicker').selectpicker();
        });

        function performUpdate(id) {
            let formData = new FormData();
            formData.append('template', document.getElementById('template').value);
            let selectedCategories = $('#categories').val();
            formData.append('categories', selectedCategories);
            storeRedirect('/cms/admin/rows_update/' + id, formData, '/cms/admin/rows');
        }
    </script>
@endsection
