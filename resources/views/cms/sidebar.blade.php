        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

            <div class="sidebar-content">

                <div class="sidebar-section">
                    <div class="sidebar-section-body d-flex justify-content-center">
                        <h5 class="my-auto sidebar-resize-hide flex-grow-1"> {{ __('dashboard/master.sidebar') }} </h5>

                        <div>
                            <button type="button"
                                class="border-transparent btn btn-flat-white btn-icon btn-sm rounded-pill sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                                <i class="ph-arrows-left-right"></i>
                            </button>

                            <button type="button"
                                class="border-transparent btn btn-flat-white btn-icon btn-sm rounded-pill sidebar-mobile-main-toggle d-lg-none">
                                <i class="ph-x"></i>
                            </button>
                        </div>
                    </div>
                </div>


                <div class="sidebar-section">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">
                        <li class="pt-0 nav-item-header">
                            <div class="opacity-50 text-uppercase fs-sm lh-sm sidebar-resize-hide">
                                {{ __('dashboard/master.primary') }}
                            </div>
                            <i class="ph-dots-three sidebar-resize-show"></i>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link active">
                                <i class="ph-house"></i>
                                <span>
                                    {{ __('dashboard/master.dashboard') }}
                                    <span class="opacity-50 d-block fw-normal"> {{ __('dashboard/master.home') }}
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item-header">
                            <div class="opacity-50 text-uppercase fs-sm lh-sm sidebar-resize-hide">
                                {{ __('dashboard/master.control_items') }}
                            </div>
                            <i class="ph-dots-three sidebar-resize-show"></i>
                        </li>

                        <li class="nav-item">
                            @canany(['index-permissions', 'create-permissions'])
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link">
                                    <i class="ph-circles-four"></i>
                                    <span>الصلاحيات</span>
                                </a>
                                <ul class="nav-group-sub collapse">
                                    @can('index-permissions')
                                        <li class="nav-item">
                                            <a href="{{ route('permissions.index') }}" class="nav-link">عرض
                                                الصلاحيات</a>
                                        </li>
                                    @endcan
                                    @can('create-permissions')
                                        <li class="nav-item">
                                            <a href="{{ route('permissions.create') }}" class="nav-link">اضافة
                                                صلاحية</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanany
                        </li>
                        <li class="nav-item">
                            @canany(['index-roles', 'create-roles', 'edit-roles', 'delete-roles'])
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link">
                                    <i class="ph-circles-four"></i>
                                    <span>الادوار</span>
                                </a>
                                <ul class="nav-group-sub collapse">
                                    @can('create-roles')
                                        <li class="nav-item">
                                            <a href="{{ route('roles.index') }}" class="nav-link">عرض الادور</a>
                                        </li>
                                    @endcan
                                    @can('create-roles')
                                        <li class="nav-item">
                                            <a href="{{ route('roles.create') }}" class="nav-link">اضافة دور</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanany
                        </li>

                        <li class="nav-item">
                            @canany(['index-about_us', 'create-about_us'])
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link">
                                    <i class="ph-user"></i>
                                    <span>{{ __('dashboard/master.about_us') }}</span>
                                </a>
                                <ul class="nav-group-sub collapse">
                                    @can('index-about_us')
                                        <li class="nav-item">
                                            <a href="{{ route('about_us.index') }}" class="nav-link">
                                                <i class="ph-eye"></i>
                                                {{ __('dashboard/master.view') }}</a>
                                        </li>
                                    @endcan
                                    @can('create-about_us')
                                        <li class="nav-item">
                                            <a href="{{ route('about_us.create') }}" class="nav-link">
                                                <i class="ph-plus"></i>
                                                {{ __('dashboard/master.add') }}</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanany
                        </li>
                        <li class="nav-item">
                            @canany(['index-admins', 'create-admins'])
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link">
                                    <i class="ph-user"></i>
                                    <span>{{ __('dashboard/master.admins') }}</span>
                                </a>
                                <ul class="nav-group-sub collapse">
                                    @can('index-admins')
                                        <li class="nav-item">
                                            <a href="{{ route('admins.index') }}" class="nav-link">
                                                <i class="ph-eye"></i>
                                                {{ __('dashboard/master.view') }}</a>
                                        </li>
                                    @endcan
                                    @can('create-admins')
                                        <li class="nav-item">
                                            <a href="{{ route('admins.create') }}" class="nav-link">
                                                <i class="ph-plus"></i>
                                                {{ __('dashboard/master.add') }}</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanany
                        </li>
                        <li class="nav-item">
                            @canany(['index-authors', 'create-authors'])
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link">
                                    <i class="ph-user"></i>
                                    <span>{{ __('dashboard/master.authors') }}</span>
                                </a>
                                <ul class="nav-group-sub collapse">
                                    @can('index-authors')
                                        <li class="nav-item">
                                            <a href="{{ route('authors.index') }}" class="nav-link">
                                                <i class="ph-eye"></i>
                                                {{ __('dashboard/master.view') }}</a>
                                        </li>
                                    @endcan
                                    @can('create-authors')
                                        <li class="nav-item">
                                            <a href="{{ route('authors.create') }}" class="nav-link">
                                                <i class="ph-plus"></i>
                                                {{ __('dashboard/master.add') }}</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanany
                        </li>
                        <li class="nav-item">
                            @canany(['index-blogs', 'create-blogs'])
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link">
                                    <i class="ph-user"></i>
                                    <span>{{ __('dashboard/master.posts') }}</span>
                                </a>
                                <ul class="nav-group-sub collapse">
                                    @can('index-blogs')
                                        <li class="nav-item">
                                            <a href="{{ route('blogs.index') }}" class="nav-link">
                                                <i class="ph-eye"></i>
                                                {{ __('dashboard/master.view') }}</a>
                                        </li>
                                    @endcan
                                    @can('create-blogs')
                                        <li class="nav-item">
                                            <a href="{{ route('blogs.create') }}" class="nav-link">
                                                <i class="ph-plus"></i>
                                                {{ __('dashboard/master.add') }}</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanany
                        </li>
                        <li class="nav-item">
                            @canany(['index-categories', 'create-categories'])
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link">
                                    <i class="ph-user"></i>
                                    <span>{{ __('dashboard/master.categories') }}</span>
                                </a>
                                <ul class="nav-group-sub collapse">
                                    @can('index-categories')
                                        <li class="nav-item">
                                            <a href="{{ route('categories.index') }}" class="nav-link">
                                                <i class="ph-eye"></i>
                                                {{ __('dashboard/master.view') }}</a>
                                        </li>
                                    @endcan
                                    @can('create-categories')
                                        <li class="nav-item">
                                            <a href="{{ route('categories.create') }}" class="nav-link">
                                                <i class="ph-plus"></i>
                                                {{ __('dashboard/master.add') }}</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanany
                        </li>
                        <li class="nav-item">
                            @canany(['index-albums', 'create-albums'])
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link">
                                    <i class="ph-user"></i>
                                    <span> {{ __('dashboard/master.albums') }}</span>
                                </a>
                                <ul class="nav-group-sub collapse">
                                    @can('index-albums')
                                        <li class="nav-item">
                                            <a href="{{ route('albums.index') }}" class="nav-link">
                                                <i class="ph-eye"></i>
                                                {{ __('dashboard/master.view') }} </a>
                                        </li>
                                    @endcan
                                    @can('create-albums')
                                        <li class="nav-item">
                                            <a href="{{ route('albums.create') }}" class="nav-link">
                                                <i class="ph-plus"></i>
                                                {{ __('dashboard/master.add') }} </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanany
                        </li>
                        @canany(['index-libraries', 'create-libraries'])
                            <li class="nav-item">
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link">
                                    <i class="ph-user"></i>
                                    <span>{{ __('dashboard/master.libraries') }}</span>
                                </a>
                                <ul class="nav-group-sub collapse">
                                    @can('index-libraries')
                                        <li class="nav-item">
                                            <a href="{{ route('libraries.index') }}" class="nav-link">
                                                <i class="ph-eye"></i>
                                                {{ __('dashboard/master.view') }}</a>
                                        </li>
                                    @endcan
                                    @can('create-libraries')
                                        <li class="nav-item">
                                            <a href="{{ route('libraries.create') }}" class="nav-link">
                                                <i class="ph-plus"></i>
                                                {{ __('dashboard/master.add') }}</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanany
                        @canany(['index-libraries', 'create-libraries'])
                            <li class="nav-item">
                            <li class="nav-item nav-item">
                                <a href="{{ route('front_control') }}" class="nav-link">
                                    <i class="ph-user"></i>
                                    <span> التحكم بالفرونت </span>
                                </a>
                            </li>
                        @endcanany
                        </li>
                    </ul>
                </div>

            </div>

        </div>
