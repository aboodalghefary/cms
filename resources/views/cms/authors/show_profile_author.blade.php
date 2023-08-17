@extends('cms.embed')


@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    صفحة الاعضاء - <span class="fw-normal">المحرر</span>
                </h4>

                <a href="#page_header"
                    class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                    data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>
        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <a href="#" class="breadcrumb-item">الاعضاء</a>
                    <span class="breadcrumb-item active">ملف {{ ucwords($author->user->name) }}
                    </span>
                </div>

                <a href="#breadcrumb_elements"
                    class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                    data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Cover area -->
    <div class="profile-cover">
        <div class="profile-cover-img" style="background-image: url({{ asset('cms/assets/images/demo/cover3.jpg') }})">
        </div>
        <div
            class="d-flex align-items-center text-center text-lg-start flex-column flex-lg-row position-absolute start-0 end-0 bottom-0 mx-3 mb-3">
            <div class="me-lg-3 mb-2 mb-lg-0">
                <a href="#">
                    <img src="{{ asset('storage/images/author/' . $author->user->image) }}"
                        class="img-thumbnail rounded-circle shadow" width="100" height="100" alt="">
                </a>
            </div>

            <div class="profile-cover-text text-white">
                <h1 class="mb-0">{{ ucwords($author->user->name) }}</h1>
                @foreach ($author->getRoleNames() as $role)
                    <span class="d-block">
                        {{ $role }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>
    <!-- /cover area -->


    <!-- Profile navigation -->
    <div class="navbar navbar-expand-lg border-bottom py-2">
        <div class="container-fluid">
            <ul class="nav navbar-nav flex-row flex-fill">
                <li class="nav-item me-1">
                    <a href="#settings" class="navbar-nav-link navbar-nav-link-icon rounded" data-bs-toggle="tab">
                        <div class="d-flex align-items-center mx-lg-1">
                            <i class="ph-gear"></i>
                            <span class="d-none d-lg-inline-block ms-2">الاعدادات</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item d-lg-none ms-auto">
                    <a href="#profile_nav" class="navbar-nav-link navbar-nav-link-icon collapsed rounded"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /profile navigation -->


    <!-- Content area -->
    <div class="content">

        <!-- Inner container -->
        <div class="d-flex align-items-stretch align-items-lg-start flex-column flex-lg-row">

            <!-- Left content -->
            <div class="tab-content flex-fill order-2 order-lg-1">


                <div class="tab-pane fade active show" id="settings">

                    <!-- Profile info -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"> المعلومات الشخصية </h5>
                        </div>

                        <div class="card-body">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">الاسم</label>
                                            <input type="text" name="name" id="name"
                                                value="{{ $author->user->name }}" class="form-control"
                                                placeholder=" الاسم ">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
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
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">رقم الهاتف</label>
                                            <input type="text" name="mobile" id="mobile" class="form-control"
                                                value="{{ $author->user->mobile }}" placeholder="رقم الهاتف">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">العنوان</label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                placeholder="العنوان" value="{{ $author->user->address }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">المدينة</label>
                                            <input type="text" name="city" id="city" class="form-control"
                                                placeholder="المدينة" value="{{ $author->user->city }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label ">الحالة</label>
                                            <select data-placeholder="الحالة" name="status" id="status"
                                                class="form-control select-icons">
                                                <option value="married" data-icon="heart"
                                                    {{ $author->user->status == 'married ' ? 'selected' : null }}>متزوج
                                                </option>
                                                <option value="single" data-icon="heart-break"
                                                    {{ $author->user->status == 'single ' ? 'selected' : null }}>اعزب
                                                </option>
                                                <option value="separated" data-icon="heartbeat"
                                                    {{ $author->user->status == 'separated ' ? 'selected' : null }}>مطلق
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">الجنس</label>
                                            <select data-placeholder="الجنس" name="gender" id="gender"
                                                class="form-control select-icons">
                                                <option value="male" data-icon="gender-male"
                                                    {{ $author->user->gender == 'male ' ? 'selected' : null }}>
                                                    ذكر</option>
                                                <option value="female"
                                                    {{ $author->user->gender == 'female ' ? 'selected' : null }}>انثى
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">التاريخ</label>
                                            <input class="form-control" type="date" id="birthday" name="birthday"
                                                value="{{ $author->birthday }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">الدور</label>
                                            <select class="form-select select" id="role_id" name="role_id">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}"
                                                        {{ $author->role_id == $role->id ? selected : null }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Upload profile image</label>
                                            <input type="file" class="form-control" name="image" id="image"
                                                value="{{ $author->image }}">
                                            <div class="form-text text-muted">Accepted formats: gif, png, jpg. Max file
                                                size 2Mb</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <a href="{{ route('authors.index') }}" class="btn btn-light">الغاء</a>
                                    <button type="button" onclick="performUpdate({{ $author->id }})"
                                        class="btn btn-primary ms-3">
                                        تعديل
                                        <i class="ph-paper-plane-tilt ms-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /profile info -->


                    <!-- Account settings -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"> حماية الحساب </h5>
                        </div>

                        <div class="card-body">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label"> كلمة المرور السابقة </label>
                                            <input type="password" id="current_password" value="password"
                                                class="form-control">
                                        </div>
                                    </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">كلمة المرور الجديدة</label>
                                                <input type="password" id="new_password" placeholder="Enter new password"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>



                                <div class="text-end">
                                    <button type="button" onclick="performUpdatePassword({{ $author->id }})"
                                        class="btn btn-primary"> حفظ التغييرات </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /account settings -->

                </div>
            </div>
            <!-- /left content -->

        </div>
        <!-- /inner container -->

    </div>
    <!-- /content area -->
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

        function performUpdatePassword(id) {
            let formData = new FormData();
            formData.append('new_password', document.getElementById('new_password').value);
            formData.append('current_password', document.getElementById('current_password').value);

            storeRedirect('/cms/admin/authors_update_password/' + id, formData, '/cms/admin/authors/');
        }
    </script>
@endsection
