@extends('cms.master')
@section('title', 'الصور')

@section('tittle_1', ' عرض الصور ')
@section('breadcrumb')
    <a href="{{ url()->previous() }}" class="breadcrumb-item"> عرض البومات الصور </a>
@endsection

@section('tittle_2', ' عرض الصور ')


@section('styles')

@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">قائمة الصور</h5>
        </div>

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الصورة</th>
                    <th>الاسم</th>
                    <th>الالبوم</th>
                    <th class="div-center">الاجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($photos as $photo)
                    <tr>
                        <td>{{ $photo->id }}</td>
                        <td> <img src="{{ asset('storage/images/photos/' . $photo->image_path) }}" alt="Sub Image"
                                width="50">
                        </td>
                        <td>{{ $photo->title }}</td>
                        <td>{{ $photo->album->title }}</td>

                        <td class="div-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="div-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('photos.edit', $photo->id) }}" class="dropdown-item">
                                            <i class="ph-note-pencil me-2"></i>
                                            تعديل
                                        </a>
                                        <a href="#" onclick="performDestroy({{ $photo->id }},this)"
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

@endsection






@section('scripts')
    <script>
        function performDestroy(id, referance) {
            let url = '/cms/admin/photos/' + id;
            confirmDestroy(url, referance);
        }
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
