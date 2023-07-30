@extends('cms.master')
@section('title', 'التصنيفات')

@section('tittle_1', ' عرض التصنيفات ')
@section('tittle_2', ' عرض التصنيفات ')


@section('styles')

@endsection


@section('content')
    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">قائمة التصنيفات</h5>
        </div>
        <div class="category p-5">
            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الصورة</th>
                        <th>الاسم</th>
                        <th>اصناف فرعية</th>
                        <th class="div-center">الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td> <img src="{{ asset('storage/images/category/' . $category->image) }}" alt="Sub Image"
                                    width="50">
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @php
                                    renderCategoriesList($category->subCategories, $category->id);
                                @endphp
                            </td>
                            <td class="div-center">
                                <div class="d-inline-flex">
                                    <div class="dropdown">
                                        <a href="#" class="div-body" data-bs-toggle="dropdown">
                                            <i class="ph-list"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="{{ route('categories.edit', $category->id) }}" class="dropdown-item">
                                                <i class="ph-note-pencil me-2"></i>
                                                تعديل
                                            </a>
                                            <a href="#" onclick="performDestroy({{ $category->id }},this)"
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
    </div>
    <!-- /basic datatable -->

    @php
        function renderCategoriesList($categories, $parentId = null)
        {
            foreach ($categories as $category) {
                if ($category['parent_id'] == $parentId) {
                    echo '<li>';
                    echo '<span>' . "<a href='" . route('categories.edit', $category->id) . "'>" . $category['name'] . '</a>' . '</span>';
                    echo '<ul>';
                    echo "<a href='" . route('categories.edit', $category->id) . "' >";
                    renderCategoriesList($category->subCategories, $category['id']);
                    echo '</a>';
                    echo '</ul>';
                    echo '</li>';
                }
            }
        }
    @endphp


@endsection






@section('scripts')
    <script>
        function performDestroy(id, referance) {
            let url = '/cms/admin/categories/' + id;
            confirmDestroy(url, referance);
        }
    </script>
@endsection
