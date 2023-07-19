@extends('cms.master')
@section('title', 'حولنا')

@section('tittle_1', ' عرض حولنا ')
@section('tittle_2', ' عرض حولنا ')


@section('styles')

@endsection


@section('content')
    <div class="card">
        @if (session()->has('message'))
            <div class="alert alert-success m-3">
                {{ session('message') }}
            </div>
        @endif
        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الصورة</th>
                    <th>العنوان</th>
                    <th>المحتوى</th>
                    <th class="div-center">الاجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($about_us as $about_us)
                    <tr>
                        <td>{{ $about_us->id }}</td>
                        <td> <img src="{{ asset('storage/images/aboutUs/' . $about_us->image) }}" alt="Sub Image"
                                width="50"></td>
                        <td>{{ $about_us->trans_title }}</td>
                        <td width="20%"> {{ Str::limit($about_us->trans_content, 150, '...') }}
                        </td>
                        <td class="div-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="div-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('about_us.edit', $about_us->id) }}" class="dropdown-item">
                                            <i class="ph-note-pencil me-2"></i>
                                            تعديل
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
            let url = '/cms/admin/blogs/' + id;
            confirmDestroy(url, referance);
        }
        const DatatableBasic = function() {
            const _componentDatatableBasic = function() {
                if (!$().DataTable) {
                    console.warn('Warning - datatables.min.js is not loaded.');
                    return;
                }

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

                $('.datatable-basic').DataTable();

                $('.datatable-pagination').DataTable({
                    pagingType: "simple",
                    language: {
                        paginate: {
                            'next': document.dir == "rtl" ? 'Next &larr;' : 'Next &rarr;',
                            'previous': document.dir == "rtl" ? '&rarr; Prev' : '&larr; Prev'
                        }
                    }
                });

                $('.datatable-save-state').DataTable({
                    stateSave: true
                });

                const table = $('.datatable-scroll-y').DataTable({
                    autoWidth: true,
                    scrollY: 300
                });

                $('.sidebar-control').on('click', function() {
                    table.columns.adjust().draw();
                });
            };



            return {
                init: function() {
                    _componentDatatableBasic();
                }
            }
        }();

        document.addEventListener('DOMContentLoaded', function() {
            DatatableBasic.init();
        });
    </script>
@endsection
