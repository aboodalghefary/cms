@php
$lang = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
@endphp
<!DOCTYPE html>
<html dir="{{ $lang }}">

<head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>لوحة التحكم - الرئيسية</title>

   <link href="{{ asset('cms/assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
   <link href="{{ asset('cms/assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
   @if ($lang == 'rtl')
   <link href="{{ asset('cms/assets/css/rtl/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
   <link href="{{ asset('cms/assets/css/rtl/bootstrap_limitless.min.css') }}" id="stylesheet" rel="stylesheet"
      type="text/css">
   <link href="{{ asset('cms/assets/css/rtl/bootstrap.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
   <link href="{{ asset('cms/assets/css/rtl/components.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
   <link href="{{ asset('cms/assets/css/rtl/layout.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
   @else
   <link href="{{ asset('cms/assets/css/ltr/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
   <link href="{{ asset('cms/assets/css/ltr/bootstrap.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
   <link href="{{ asset('cms/assets/css/ltr/bootstrap_limitless.min.css') }}" id="stylesheet" rel="stylesheet"
      type="text/css">
   <link href="{{ asset('cms/assets/css/ltr/components.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
   <link href="{{ asset('cms/assets/css/ltr/layout.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
   @endif
   <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
      rel="stylesheet">
   <!-- /global stylesheets -->
   <style>
      button.swal2-styled {
         border: none !important;
         outline: none !important;
         color: #ffffff !important;
         padding: 6px 15px !important;
         border-radius: 5px;
      }

      button.swal2-confirm {
         background-color: #252b36;
      }

      .progress-bar {
         width: 100%;
         height: 20px;
         background-color: #f2f2f2;
         position: relative;
      }

      .progress {
         width: 0%;
         height: 100%;
         background-color: #4caf50;
         transition: width 0.3s ease-in-out;
         position: relative;
      }

      .progress:before {
         content: "";
         position: absolute;
         top: 0;
         left: -15px;
         right: -15px;
         height: 100%;
         background-image: repeating-linear-gradient(45deg, rgba(60, 59, 117, 0.747) 10px, rgba(47, 45, 163, 0.493) 25px, rgba(59, 56, 250, 0.562) 25px);
      }

      .progress-text {
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         color: #ffffff;
         font-weight: bold;
      }

      #previewImage {
         width: 400px;
         margin-top: 15px;
         border-radius: 25px;
      }

      .nav.nav-sidebar {
         padding-inline: 0 !important;
      }

      .nav-link i {
         margin-right: 0 !important;
         margin-left: 0 !important;
         margin-inline: 10px !important;
      }

      .navbar-brand img {
         width: 35px !important;
         height: 45px;
      }

      .node circle {
         fill: #228794;
         stroke: #0000003d;
         stroke-width: 2px;
      }

      .node text {
         font-size: 10px;
         font-weight: bold;
         font-family: 'Cairo', sans-serif;
      }

      .link {
         fill: none;
         stroke: #ccc;
         stroke-width: 1px;
      }
   </style>
   <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

   @yield('styles')

</head>

<body>

   <!-- Main navbar -->
   <div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
      <div class="container-fluid">
         <div class="d-flex d-lg-none me-2">
            <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
               <i class="ph-list"></i>
            </button>
         </div>

         <div class="flex-1 navbar-brand flex-lg-0">
            <a href="#" class="d-inline-flex align-items-center">
               <img src="{{ asset('cms/assets/icons/Group (1).png') }}" alt="">
            </a>
         </div>

         <ul class="flex-row order-1 nav justify-content-end order-lg-2">

            <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
               <a href="#" class="p-1 navbar-nav-link align-items-center rounded-pill" data-bs-toggle="dropdown">
                  <div class="status-indicator-container">
                     @php
                     $guard = Auth::getDefaultDriver();
                     $imagePath = $guard === 'admin' ? 'storage/images/admin/' : 'storage/images/author/';
                     @endphp

                     <img src="{{ asset($imagePath . Auth::user()->user->image) }}" class="w-32px h-32px rounded-pill"
                        alt="">
                     <span class="status-indicator bg-success"></span>
                  </div>
                  <span class="d-none d-lg-inline-block mx-lg-2">{{ Auth::check() ?
                     ucwords(Auth::user()->user->name) : null }}</span>
               </a>

               <div class="dropdown-menu dropdown-menu-end">
                  <form
                     action="{{ route('logout', (Auth::guard('admin') ? 'admin' : Auth::guard('author')) ? 'author' : null) }}"
                     method="POST">
                     @csrf
                     <button class="dropdown-item" type="submit"><i class="ph-sign-out me-2"></i>تسجيل
                        الخروج</button>
                  </form>
               </div>
            </li>
         </ul>
      </div>
   </div>
   <!-- /main navbar -->


   <!-- Page content -->
   <div class="page-content">

      @include('cms.sidebar')


      <!-- Main content -->
      <div class="content-wrapper">

         <!-- Inner content -->
         <div class="content-inner">
            <div class="content">
               @php
               $motaleqtDiv = $divs->where('name', 'متعلقات')->first();
               $mainNewsDiv = $divs->where('name', 'الاخبار الرئيسية')->first();
               $readTooDiv = $divs->where('name', 'اقرا ايضا')->first();
               $privacyDiv = $divs->where('name', 'privacy')->first();
               $reportsDiv = $divs->where('name', 'تقارير خاصة')->first();
               $logoDiv = $divs->where('name', 'logo')->first();
               $ad1Div = $divs->where('name', 'home_ad1')->first();
               $ad2Div = $divs->where('name', 'home_ad2')->first();
               $ad3Div = $divs->where('name', 'home_ad3')->first();
               $ad4Div = $divs->where('name', 'home_ad4')->first();
               $ad1PostDiv = $divs->where('name', 'post_ad1')->first();
               $categoryDiv = $divs->where('name', 'category_ad')->first();
               $album_detailsDiv = $divs->where('name', 'album_details_ad')->first();
               $library_detailsDiv = $divs->where('name', 'library_details_ad')->first();
               $contactDiv = $divs->where('name', 'contact_ad')->first();
               $librariesDiv = $divs->where('name', 'libraries_ad')->first();
               $tagDiv = $divs->where('name', 'tag_ad')->first();
               $facebook = $divs->where('name', 'facebook')->first();
               $twitter = $divs->where('name', 'twitter')->first();
               $youtube = $divs->where('name', 'youtube')->first();
               @endphp
               <nav>
                  <div class="nav nav-tabs nav-tabs-highlight" id="nav-tab" role="tablist">
                     <button class="nav-link active" id="nav-contact-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                        aria-selected="false">
                        <i class="ph-house ph-lg  text-primary bg-opacity-10 rounded p-2 me-3"></i>
                        الرئيسية</button>
                     <button class="nav-link " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                        <i class="ph-globe ph-lg  text-primary bg-opacity-10 rounded p-2 me-3"></i>
                        الاعلانات</button>
                     <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                        <i class="ph-article ph-lg  text-primary bg-opacity-10 rounded p-2 me-3"></i>
                        صفحة الخبر</button>
                     <button class="nav-link" id="nav-social-tab" data-bs-toggle="tab" data-bs-target="#nav-social"
                        type="button" role="tab" aria-controls="nav-social" aria-selected="false">
                        <img src="{{ asset('cms/assets/icons/social-media.png') }}" width="35px" alt="">
                        مواقع التواصل الاجتماعي</button>
                  </div>
               </nav>
               <div class="tab-content bg-white" id="nav-tabContent">
                  <div class="tab-pane fade p-5" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                     <div class="row">
                        <div class="col-xl-3 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold"> اعلان الرئيسية الاول </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $ad1Div->name }}' , '{{ $ad1Div->id }}' ,'{{ $ad1Div->href }}','{{ $ad1Div->content }}' )">تعديل</span>
                                 </div>
                                 <a href="#" class="ms-3">
                                    <img src="{{ asset('storage/images/div/' . $ad1Div->image) }}" width="140"
                                       height="55" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold"> اعلان الرئيسية الثاني </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $ad2Div->name }}' , '{{ $ad2Div->id }}' ,'{{ $ad2Div->href }}','{{ $ad2Div->content }}' )">تعديل</span>
                                 </div>
                                 <a href="#" class="ms-3">
                                    <img src="{{ asset('storage/images/div/' . $ad2Div->image) }}" width="140"
                                       height="55" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold"> اعلان الرئيسية الثالث </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $ad3Div->name }}' , '{{ $ad3Div->id }}' ,'{{ $ad3Div->href }}','{{ $ad3Div->content }}' )">تعديل</span>
                                 </div>
                                 <a href="#" class="ms-3">
                                    <img src="{{ asset('storage/images/div/' . $ad3Div->image) }}" width="140"
                                       height="55" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold"> اعلان الرئيسية الرابع </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $ad4Div->name }}' , '{{ $ad4Div->id }}' ,'{{ $ad4Div->href }}','{{ $ad4Div->content }}' )">تعديل</span>
                                 </div>
                                 <a href="#" class="ms-3">
                                    <img src="{{ asset('storage/images/div/' . $ad4Div->image) }}" width="140"
                                       height="55" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xl-6 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold">اعلان صفحة الخبر </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $ad1PostDiv->name }}' , '{{ $ad1PostDiv->id }}' ,'{{ $ad1PostDiv->href }}','{{ $ad1PostDiv->content }}' )">تعديل</span>
                                 </div>
                                 <a href="#" class="ms-3">
                                    <img src="{{ asset('storage/images/div/' . $ad1PostDiv->image) }}" width="400"
                                       height="55" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold">اعلان صفحة التصنيف </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $categoryDiv->name }}' , '{{ $categoryDiv->id }}' ,'{{ $categoryDiv->href }}','{{ $categoryDiv->content }}' )">تعديل</span>
                                 </div>
                                 <a href="#" class="ms-3">
                                    <img src="{{ asset('storage/images/div/' . $categoryDiv->image) }}" width="400"
                                       height="55" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold">اعلان صفحة البوم الصور </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $album_detailsDiv->name }}' , '{{ $album_detailsDiv->id }}' ,'{{ $album_detailsDiv->href }}','{{ $album_detailsDiv->content }}' )">تعديل</span>
                                 </div>
                                 <a href="#" class="ms-3">
                                    <img src="{{ asset('storage/images/div/' . $album_detailsDiv->image) }}" width="400"
                                       height="55" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold">اعلان صفحة قائمة تشغيل الفيديوهات </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $library_detailsDiv->name }}' , '{{ $library_detailsDiv->id }}' ,'{{ $library_detailsDiv->href }}','{{ $library_detailsDiv->content }}' )">تعديل</span>
                                 </div>
                                 <a href="#" class="ms-3">
                                    <img src="{{ asset('storage/images/div/' . $library_detailsDiv->image) }}"
                                       width="400" height="55" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold">اعلان صفحة التواصل </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $contactDiv->name }}' , '{{ $contactDiv->id }}' ,'{{ $contactDiv->href }}','{{ $contactDiv->content }}' )">تعديل</span>
                                 </div>
                                 <a href="#" class="ms-3">
                                    <img src="{{ asset('storage/images/div/' . $contactDiv->image) }}" width="400"
                                       height="55" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold">اعلان صفحة مكتبة الفيديوهات </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $librariesDiv->name }}' , '{{ $librariesDiv->id }}' ,'{{ $librariesDiv->href }}','{{ $librariesDiv->content }}' )">تعديل</span>
                                 </div>
                                 <a href="#" class="ms-3">
                                    <img src="{{ asset('storage/images/div/' . $librariesDiv->image) }}" width="400"
                                       height="55" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold">اعلان صفحة الوسم </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $tagDiv->name }}' , '{{ $tagDiv->id }}' ,'{{ $tagDiv->href }}','{{ $tagDiv->content }}' )">تعديل</span>
                                 </div>
                                 <a href="#" class="ms-3">
                                    <img src="{{ asset('storage/images/div/' . $tagDiv->image) }}" width="400"
                                       height="55" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade p-5" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                     <div class="row">
                        <div class="col-xl-3 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold"> المتعلقات في صفحة الخبر </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $motaleqtDiv->name }}' , '{{ $motaleqtDiv->id }}' ,'{{ $motaleqtDiv->href }}','{{ $motaleqtDiv->content }}' )">تعديل</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold"> الاخبار الرئيسية في صفحة الخبر </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $mainNewsDiv->name }}' , '{{ $mainNewsDiv->id }}' ,'{{ $mainNewsDiv->href }}','{{ $mainNewsDiv->content }}' )">تعديل</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold"> اقرا ايضا في صفحة الخبر </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $readTooDiv->name }}' , '{{ $readTooDiv->id }}' ,'{{ $readTooDiv->href }}','{{ $readTooDiv->content }}' )">تعديل</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                           <div class="card">
                              <div class="card-header">
                                 <h5 class="card-title">حالة التعليقات</h5>
                              </div>
                              <div class="card-body">
                                 <form action="" class="d-flex justify-content-between">
                                    <input type="checkbox" id="comments_toggle" data-toggle="toggle" data-on="On"
                                       data-off="off" data-onstyle="success" data-offstyle="danger" {{
                                       $blogs_comment_enabled==true ? 'checked' : null }}>
                                    <button onclick="performStore()" class="btn btn-dark"> تطبيق </button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade show active p-5" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                     <div class="row">
                        <div class="col-xl-3 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold">اللوجو</div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $logoDiv->name }}' , '{{ $logoDiv->id }}')">تعديل</span>
                                 </div>
                                 <a href="#" class="ms-3">
                                    <img src="{{ asset('storage/images/div/' . $logoDiv->image) }}"
                                       class="rounded-circle" width="44" height="44" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold"> تقارير خاصة </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $reportsDiv->name }}' , '{{ $reportsDiv->id }}' ,'{{ $reportsDiv->href }}','{{ $reportsDiv->content }}' )">تعديل</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold"> حقوق الطبع والنشر </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $privacyDiv->name }}' , '{{ $privacyDiv->id }}' ,'{{ $privacyDiv->href }}','{{ $privacyDiv->content }}' )">تعديل</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade p-5" id="nav-social" role="tabpanel" aria-labelledby="nav-social-tab">
                     <div class="row">
                        <div class="col-xl-3 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold"> الفيسبوك </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $facebook->name }}' , '{{ $facebook->id }}' ,'{{ $facebook->href }}','{{ $facebook->content }}' )">تعديل</span>
                                 </div>
                                 <a href="#" class="ms-3">
                                    <i class="ph-facebook-logo ph-2x"></i>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold"> تويتر </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $twitter->name }}' , '{{ $twitter->id }}' ,'{{ $twitter->href }}','{{ $twitter->content }}' )">تعديل</span>
                                 </div>
                                 <a href="#" class="ms-3">
                                    <i class="ph-twitter-logo ph-2x"></i>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                           <div class="card card-body">
                              <div class="d-flex">
                                 <div class="flex-fill">
                                    <div class="fw-semibold"> اليوتيوب </div>
                                    <span class="text-muted" data-bs-toggle="modal"
                                       data-bs-target="#modal_form_horizontal"
                                       onclick="openEditModal(this , '{{ $youtube->name }}' , '{{ $youtube->id }}' ,'{{ $youtube->href }}','{{ $youtube->content }}' )">تعديل</span>
                                 </div>
                                 <a href="#" class="ms-3">
                                    <i class="ph-youtube-logo ph-2x"></i>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /inner content -->

      </div>
      <!-- /main content -->
      <div id="modal_form_horizontal" class="modal fade" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">تعديل</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>

               <form action="#" class="form-horizontal">
                  <div class="modal-body ">
                     <div class="row mb-3 d-none hrefInput">
                        <label class="col-form-label col-sm-3">اللينك</label>
                        <div class="col-sm-9">
                           <input type="text" id="href" placeholder="اللينك" class="form-control">
                        </div>
                     </div>

                     <div class="row mb-3 d-none imageInput">
                        <label class="col-form-label col-sm-3">صورة</label>
                        <div class="col-sm-9">
                           <input type="file" id="image" placeholder="صورة" class="form-control">
                        </div>
                     </div>

                     <div class="row mb-3 d-none contentInput">
                        <label class="col-form-label col-sm-3">المحتوى</label>
                        <div class="col-sm-9">
                           <textarea placeholder="المحتوى" id="content" class="form-control"></textarea>
                        </div>
                     </div>

                  </div>

                  <div class="modal-footer">
                     <button type="button" class="btn btn-link" data-bs-dismiss="modal">اغلاق</button>
                     <button type="button" id="submit" class="btn btn-primary">حفظ</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- /page content -->

   <!-- Demo config -->
   <div class="offcanvas offcanvas-end" tabindex="-1" id="demo_config">
      <div class="visible position-absolute top-50 end-100">
         <button type="button" class="btn btn-primary btn-icon translate-middle-y rounded-100-0"
            data-bs-toggle="offcanvas" data-bs-target="#demo_config">
            <i class="ph-gear"></i>
         </button>
      </div>

      <div class="py-0 offcanvas-header border-bottom">
         <h5 class="py-3 offcanvas-title">المظهر</h5>
         <button type="button" class="border-transparent btn btn-light btn-sm btn-icon rounded-pill"
            data-bs-dismiss="offcanvas">
            <i class="ph-x"></i>
         </button>
      </div>

      <div class="offcanvas-body">
         <div class="mb-2 fw-semibold">اللغات</div>
         <div class="mb-3 list-group">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <label class="mb-2 rounded list-group-item list-group-item-action form-check border-width-1 w-100">
               <div class="my-1">
                  <div class="form-check-label d-flex me-2 w-100">
                     <a rel="alternate" hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                        class="fw-bold d-inline-block w-100">
                        {{ $properties['native'] }}
                     </a>
                  </div>
               </div>
            </label>
            @endforeach
         </div>
      </div>
   </div>


   <script>
      function performStore() {
            let formData = new FormData();
            formData.append('comments_enabled', $('#comments_toggle').prop('checked') ? 1 : 0);
            store('/comments_enabled', formData);

        }
   </script>

   <script src="{{ asset('cms/assets/js/jquery/jquery.min.js') }}"></script>
   <!-- Load plugin -->
   <script src="{{ asset('cms/assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"
      integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- Load plugin -->
   <script src="{{ asset('cms/assets/js/vendor/notifications/sweet_alert.min.js') }}"></script>
   <script src="{{ asset('cms/assets/js/crud.js') }}"></script>
   <script src="{{ asset('cms/assets/js/app.js') }}"></script>
   <script src="{{ asset('cms/assets/js/custom.js') }}"></script>
   <!-- Core JS files -->
   <script src="{{ asset('cms/assets/demo/demo_configurator.js') }}"></script>
   <script src="https://d3js.org/d3.v7.min.js"></script>

   <script src="{{ asset('cms/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
   <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

   <!-- /core JS files -->
   <!-- Theme JS files -->
   <script src="{{ asset('cms/assets/demo/pages/dashboard.js') }}"></script>
   <!-- /theme JS files -->
   <script>
      function performUpdate(id) {
            let formData = new FormData();
            formData.append("content", document.getElementById("content").value);
            formData.append("href", document.getElementById("href").value);
            formData.append("image", document.getElementById("image").files[0]);
            storeRedirect("/cms/admin/divs_update/" + id, formData, "/home");
        }
   </script>
</body>

</html>
