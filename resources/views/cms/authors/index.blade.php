@extends('cms.master')
@section('title', 'المحررين')

@section('tittle_1', ' عرض المحررين ')
@section('tittle_2', ' عرض المحررين ')


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

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">قائمة المحررين</h5>
        </div>

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>الصورة</th>
                    <th>الاسم</th>
                    <th>الايميل</th>
                    <th>العنوان</th>
                    <th>المدينة</th>
                    <th>الحالة</th>
                    <th>تاريخ الميلاد</th>
                    <th>الجنس</th>
                    <th class="div-center">الاجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td><img class="rounded-circle w-48px h-48px"
                                src="{{ asset('storage/images/author/' . $author->user->image) }}"></td>
                        <td>{{ $author->user->name ?? null }}</td>
                        <td>{{ $author->email ?? null }}</td>
                        <td>{{ $author->user->address ?? null }}</td>
                        <td>{{ $author->user->city ?? null }}</td>
                        <td>
                            @if ($author->user->status == 'separated')
                                مطلق
                            @elseif ($author->user->status == 'single')
                                اعزب
                            @elseif ($author->user->status == 'married')
                                متزوج
                            @endif
                        </td>
                        <td>{{ $author->user->birthday ?? null }}</td>
                        <td>{{ $author->user->gender == 'male' ? 'ذكر' : 'انثى' }}
                        </td>
                        <td class="div-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="div-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('authors.edit', $author->id) }}" class="dropdown-item">
                                            <i class="ph-file-doc me-2"></i>
                                            تعديل
                                        </a>
                                        <a href="#" onclick="performDestroy({{ $author->id }},this)"
                                            class="dropdown-item">
                                            <i class="ph-file-doc me-2"></i>
                                            حذف
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

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
