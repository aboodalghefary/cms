@extends('cms.master')
@section('title', 'المحررين')

@section('tittle_1', ' تعديل المحرر ')
@section('tittle_2', ' تعديل المحرر ')


@section('styles')
    <style>
        .color {
            color: #fff;
            margin-inline: 15px;
            width: 35px;
        }
    </style>
@endsection


@section('content')

    <!-- Right aligned buttons -->
    <div class="card">
        <div class="card-header">
            <h6 class="mb-0"> تعديل محرر </h6>
        </div>
        <div class="card-body">
            <form action="#">
                <div class="mb-3">
                    <label class="form-label">الاسم</label>
                    <input type="text" name="name" id="name" value="{{ $author->user->name }}" class="form-control"
                        placeholder=" الاسم ">
                </div>
                <div class="mb-3">
                    <label class="form-label">الايميل</label>
                    <div class="form-control-feedback form-control-feedback-start">
                        <input type="text" class="form-control" name="email" id="email"
                            value="{{ $author->email }}" disabled placeholder="john@doe.com">
                        <div class="form-control-feedback-icon">
                            <i class="ph-at text-muted"></i>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">كلمة المرور</label>
                    <div class="form-control-feedback form-control-feedback-start">
                        <input type="password" name="password" id="password" class="form-control" disabled
                            placeholder="•••••••••••">
                        <div class="form-control-feedback-icon">
                            <i class="ph-lock text-muted"></i>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">رقم الهاتف</label>
                    <input type="text" name="mobile" id="mobile" class="form-control"
                        value="{{ $author->user->mobile }}" placeholder="رقم الهاتف">
                </div>
                <div class="mb-3">
                    <label class="form-label">العنوان</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="العنوان"
                        value="{{ $author->user->address }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">المدينة</label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="المدينة"
                        value="{{ $author->user->city }}">
                </div>
                <div class="mb-3 row">
                    <label class="col-form-label col-lg-3">الحالة</label>
                    <div class="col-lg-9">
                        <select data-placeholder="الحالة" name="status" id="status" class="form-control select-icons">
                            <option value="married" {{ $author->status == 'married ' ? selected : null }}>متزوج
                            </option>
                            <option value="single" {{ $author->status == 'single ' ? selected : null }}>اعزب
                            </option>
                            <option value="separated" {{ $author->status == 'separated ' ? selected : null }}>مطلق
                            </option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-form-label col-lg-3">الجنس</label>
                    <div class="col-lg-9">
                        <select data-placeholder="الجنس" name="gender" id="gender" class="form-control select-icons">
                            <option value="male" {{ $author->gender == 'male ' ? selected : null }}>ذكر
                            </option>
                            <option value="female" {{ $author->gender == 'female ' ? selected : null }}>انثى
                            </option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-form-label col-lg-3">التاريخ</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="date" id="birthday" name="birthday"
                            value="{{ $author->birthday }}">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">الدور</label>
                        <div class="col-lg-9">
                            <select class="form-select select" id="role_id" name="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ $author->role_id == $role->id ? selected : null }}>{{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label"> الصورة</label>
                    <div class="col-lg-9">
                        <input type="file" class="form-control" name="image" id="image"
                            value="{{ $author->image }}">
                        <div class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</div>
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('admins.index') }}" class="btn btn-light">الغاء</a>
                    <button type="button" onclick="performUpdate({{ $author->id }})" class="btn btn-primary ms-3">
                        تعديل
                        <i class="ph-paper-plane-tilt ms-2"></i></button>
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
            formData.append('name', document.getElementById('name').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('mobile', document.getElementById('mobile').value);
            formData.append('address', document.getElementById('address').value);
            formData.append('city', document.getElementById('city').value);
            formData.append('status', document.getElementById('status').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('birthday', document.getElementById('birthday').value);
            formData.append('role_id', document.getElementById('role_id').value);

            formData.append('image', document.getElementById('image').files[0]);
            storeRedirect('/cms/admin/authors_update/' + id, formData, '/cms/admin/authors/');
        }
    </script>
@endsection
