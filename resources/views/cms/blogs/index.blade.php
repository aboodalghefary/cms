@extends('cms.master')
@section('title', 'االتدوينات')

@section('tittle_1', ' عرض االتدوينات ')
@section('tittle_2', ' عرض االتدوينات ')


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
                    <th>المؤلف</th>
                    <th class="text-nowrap">التعليقات</th>
                    <th class="text-nowrap">اضافة تعليق</th>
                    <th class="text-nowrap">عرض التعليقات</th>
                    <th>التصنيف</th>
                    <th>الاشارات</th>
                    <th class="div-center">الاجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>
                            <img src="{{ asset('storage/images/blog/' . $blog->image) }}" alt="Sub Image" width="150">
                        </td>
                        <td>{{ $blog->name }}</td>
                        <td>
                            <button class="btn text-nowrap btn-dark" onclick="openModal({{ $blog->id }})">
                                معاينة المحتوى
                            </button>
                        </td>
                        <td>{{ $blog->author->user->name ?? null }}</td>
                        <td><a href="{{ route('comments_create', $blog->id) }}" class="btn text-nowrap btn-outline-indigo">
                                اضافة
                                تعليق </a></td>
                        <td><a href="{{ route('comments_index', $blog->id) }}" class="btn text-nowrap btn-outline-indigo">
                                عرض
                                التعليقات
                            </a></td>
                        <td>
                            @if ($blog->comments_enabled == 1)
                                <span class="badge bg-success text-success bg-opacity-20"><i class="ph-check ph-sm"></i>
                                    مفعلة</span>
                            @else
                                <span class="badge bg-danger text-danger bg-opacity-20"><i class="ph-x ph-sm"></i>
                                    معطلة</span>
                            @endif
                        </td>
                        <td>{{ $blog->category->name }}</td>
                        <td>
                            @foreach ($blog->tags as $tag)
                                @php
                                    $colors = ['bg-teal text-teal', 'bg-indigo text-indigo', 'bg-purple text-purple', 'bg-pink text-pink', 'bg-dark text-reset', 'bg-info text-info', 'bg-warning text-warning', 'bg-success text-success', 'bg-danger text-danger', 'bg-primary text-primary', 'bg-secondary text-secondary'];
                                    $color = $colors[$loop->index % count($colors)];
                                @endphp
                                <span class="badge {{ $color }} bg-opacity-20"> <i class="ph-tag ph-sm"></i>
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </td>

                        <td class="div-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="div-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('blogs.edit', $blog->id) }}" class="dropdown-item">
                                            <i class="ph-note-pencil me-2"></i>
                                            تعديل
                                        </a>
                                        <a href="#" onclick="performDestroy({{ $blog->id }},this)"
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

        <div class="modal modal-xl fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalContent">
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openModal(blogId) {
                // تعيين محتوى الـ modal المناسب للـ blog المحدد
                var blogContent = {!! json_encode($blogs->pluck('content', 'id')) !!};
                var content = blogContent[blogId];
                document.getElementById('modalContent').innerHTML = content;

                // فتح الـ modal
                var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                modal.show();
            }
        </script>

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
