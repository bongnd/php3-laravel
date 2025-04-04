<!-- filepath: d:\laragon\www\bong\resources\views\admin\categories\trashed.blade.php -->
@extends('admin.layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Danh sách danh mục đã xóa</h1>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-primary mb-3">Quay lại danh sách</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Ngày xóa</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->deleted_at->format('d/m/Y H:i') }}</td>
                <td>
                    <form action="{{ route('admin.categories.restore', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Khôi phục</button>
                    </form>
                    <form action="{{ route('admin.categories.force-delete', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn danh mục này?')">Xóa vĩnh viễn</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Hiển thị phân trang -->
    <div class="d-flex justify-content-center">
        {{ $categories->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection