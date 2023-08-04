@extends('cms.master')
@section('title', 'الاعضاء')

@section('tittle_1', ' عرض الاعضاء ')
@section('tittle_2', ' عرض الاعضاء ')


@section('styles')
    <style>
        .color {
            color: #fff;
            padding: 15px;
            width: 35px;
        }
    </style>
@endsection


@section('content')
    <div class="row" style="border: none;">
        <div class="col-lg-6" style="border: none;">
            <div class="card" style="border: none;">
                <div class="card-header" style="border: none;">
                    <h5 class="mb-0">المحررين</h5>
                </div>
                <div class="list-group list-group-borderless py-2" style="border: none;">
                    @foreach ($roles->where('guard_name', 'author')->all() as $role)
                        @foreach ($authors as $index => $author)
                            @if ($author->hasRole($role->name))
                                @if ($index == 0)
                                    <div class="list-group-item fw-semibold" style="border: none;">{{ $role->name }}
                                    </div>
                                @endif
                                <div style="border: none;">
                                    <div class="list-group-item hstack gap-3" style="border: none;">
                                        <a href="#" class="status-indicator-container">
                                            <img src="{{ asset('storage/images/author/' . $author->user->image) }}"
                                                class="w-40px h-40px rounded-pill" alt="">
                                            <span class="status-indicator bg-success"></span>
                                        </a>

                                        <div class="flex-fill">
                                            <a href="{{ route('authors.edit', $author->id) }}"
                                                class="fw-semibold">{{ ucwords($author->user->name) }}</a>
                                        </div>

                                        <div class="align-self-center ms-3">
                                            <a href="#p{{ $author->user->id }}" class="text-body collapsed"
                                                data-bs-toggle="collapse">
                                                <i class="ph-caret-down collapsible-indicator"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="collapse" id="p{{ $author->user->id }}">
                                        <div class="p-3">
                                            <ul class="list list-unstyled mb-0">
                                                <li><i class="ph-map-pin me-2"></i> {{ $author->user->city }}</li>
                                                <li><i class="ph-briefcase me-2"></i>{{ $author->user->address }}</li>
                                                <li><i class="ph-phone me-2"></i> {{ $author->user->mobile }}</li>
                                                <li><i class="ph-at me-2"></i> <a href="mailto:{{ $author->email }}">{{ $author->email }}</a>
                                                <li><i class="ph-pen me-2"></i> <a
                                                        href="{{ route('show_profile_author', $author->id) }}"> تعديل </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-6" style="border: none;">
            <div class="card" style="border: none;">
                <div class="card-header" style="border: none;">
                    <h5 class="mb-0"> المشرفين </h5>
                </div>
                <div class="list-group list-group-borderless py-2" style="border: none;">
                    @foreach ($roles->where('guard_name', 'admin')->all() as $role)
                        @foreach ($admins as $index => $admin)
                            @if ($admin->hasRole($role->name))
                                @if ($index == 0)
                                    <div class="list-group-item fw-semibold" style="border: none;">{{ $role->name }}
                                    </div>
                                @endif
                                <div style="border: none;">
                                    <div class="list-group-item hstack gap-3" style="border: none;">
                                        <a href="#" class="status-indicator-container">
                                            <img src="{{ asset('storage/images/admin/' . $admin->user->image) }}"
                                                class="w-40px h-40px rounded-pill" alt="">
                                            <span class="status-indicator bg-success"></span>
                                        </a>

                                        <div class="flex-fill">
                                            <a href="{{ route('admins.edit', $admin->id) }}"
                                                class="fw-semibold">{{ ucwords($admin->user->name) }}</a>

                                        </div>

                                        <div class="align-self-center ms-3">
                                            <a href="#p{{ $admin->user->id }}" class="text-body collapsed"
                                                data-bs-toggle="collapse">
                                                <i class="ph-caret-down collapsible-indicator"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="collapse" id="p{{ $admin->user->id }}">
                                        <div class="p-3">
                                            <ul class="list list-unstyled mb-0">
                                                <li><i class="ph-map-pin me-2"></i> {{ $admin->user->city }}</li>
                                                <li><i class="ph-briefcase me-2"></i>{{ $admin->user->address }}</li>
                                                <li><i class="ph-phone me-2"></i> {{ $admin->user->mobile }}</li>
                                                <li><i class="ph-at me-2"></i> <a
                                                        href="mailto:{{ $admin->email }}">{{ $admin->email }}</a>
                                                </li>
                                                <li><i class="ph-pen me-2"></i> <a
                                                        href="{{ route('show_profile_admin', $admin->id) }}"> تعديل </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection






@section('scripts')
    <script>
        function performDestroy(id, referance) {
            let url = '/cms/admin/authors/' + id;
            confirmDestroy(url, referance);
        }
        /* ------------------------------------------------------------------------------
         *
         *  # Basic datatables
         *
         *  Demo JS code for datatable_basic.html page
         *
         * ---------------------------------------------------------------------------- */


        // Setup module
        // ------------------------------

        const DatatableBasic = function() {


            //
            // Setup module components
            //

            // Basic Datatable examples
            const _componentDatatableBasic = function() {
                if (!$().DataTable) {
                    console.warn('Warning - datatables.min.js is not loaded.');
                    return;
                }

                // Setting datatable defaults
                $.extend($.fn.dataTable.defaults, {
                    autoWidth: false,
                    columnDefs: [{
                        orderable: false,
                        width: 100,
                        targets: [3]
                    }],
                    lengthMenu: [
                        [100, 200, 300, 400, 500],
                        [100, 200, 300, 400, 500]
                    ],
                    pageLength: 100,
                    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                    language: {
                        search: '<span class="me-3">Filter:</span> <div class="form-control-feedback form-control-feedback-end flex-fill">_INPUT_<div class="form-control-feedback-icon"><i class="opacity-50 ph-magnifying-glass"></i></div></div>',
                        searchPlaceholder: 'Type to filter...',
                        lengthMenu: '<span class="me-3">Show:</span> _MENU_',
                        paginate: {
                            'first': 'First',
                            'last': 'Last',
                            'next': document.dir == "rtl" ? '&larr;' : '&rarr;',
                            'previous': document.dir == "rtl" ? '&rarr;' : '&larr;'
                        }
                    }
                });

                // Basic datatable
                $('.datatable-basic').DataTable();

                // Alternative pagination
                $('.datatable-pagination').DataTable({
                    pagingType: "simple",
                    language: {
                        paginate: {
                            'next': document.dir == "rtl" ? 'Next &larr;' : 'Next &rarr;',
                            'previous': document.dir == "rtl" ? '&rarr; Prev' : '&larr; Prev'
                        }
                    }
                });

                // Datatable with saving state
                $('.datatable-save-state').DataTable({
                    stateSave: true
                });

                // Scrollable datatable
                const table = $('.datatable-scroll-y').DataTable({
                    autoWidth: true,
                    scrollY: 300
                });

                // Resize scrollable table when sidebar width changes
                $('.sidebar-control').on('click', function() {
                    table.columns.adjust().draw();
                });
            };


            //
            // Return objects assigned to module
            //

            return {
                init: function() {
                    _componentDatatableBasic();
                }
            }
        }();


        // Initialize module
        // ------------------------------

        document.addEventListener('DOMContentLoaded', function() {
            DatatableBasic.init();
        });
    </script>
@endsection
