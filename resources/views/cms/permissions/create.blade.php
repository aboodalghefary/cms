@extends('cms.master')
@section('title', 'الصلاحيات ')

@section('tittle_1', ' اضافة صلاحية ')
@section('tittle_2', ' اضافة صلاحية ')


@section('styles')

@endsection


@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">اضافة صلاحية </h5>
        </div>

        <div class="card-body">

            <div class="col-lg-12">

                <!-- Right aligned buttons -->
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0"> اضافة صلاحية </h6>
                    </div>
                    <div class="card-body">
                        <form action="#">
                            <div class="form-group col-md-6">
                                <label for="guard_name"> الأدوار</label>
                                <select class="form-control" name="guard_name" id="guard_name"
                                    aria-label="form-select-sm example">
                                    <option value="admin"> مشرف </option>
                                    <option value="author">محرر</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">اسم الصلاحية</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="أدخل اسم الدور الوظيفي">
                            </div>
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="{{ route('permissions.index') }}" class="btn btn-light">الغاء</a>
                                <button type="button" onclick="performStore()" class="btn btn-primary ms-3"> اضافة <i
                                        class="ph-paper-plane-tilt ms-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /right aligned buttons -->

            </div>
        </div>



    </div>
    <!-- /basic datatable -->

@endsection






@section('scripts')
    <script src="{{ asset('cms/assets/js/vendor/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('cms/assets/demo/pages/form_select2.js') }}"></script>
    <script>
        function performStore() {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('guard_name', document.getElementById('guard_name').value);
            store('/cms/admin/permissions', formData);
        }
    </script>
@endsection
