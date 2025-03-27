<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4 text-center text-gray-700">Danh sách sản phẩm</h1>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border border-gray-300 px-4 py-3">ID</th>
                    <th class="border border-gray-300 px-4 py-3">Danh mục</th>
                    <th class="border border-gray-300 px-4 py-3">Tên sản phẩm</th>
                    <th class="border border-gray-300 px-4 py-3">Ảnh</th>

                    <th class="border border-gray-300 px-4 py-3">Giá</th>
                    <th class="border border-gray-300 px-4 py-3">Mô tả</th>
                    <th class="border border-gray-300 px-4 py-3">IsHot</th>
                    <th class="border border-gray-300 px-4 py-3">
                        <a href="{{ route('products.addProducts') }}" class="bg-yellow-400 text-white px-3 py-2 rounded-md hover:bg-yellow-500 transition">Thêm</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $pro)
                <tr class="hover:bg-gray-100 transition">
                    <td class="border border-gray-300 px-4 py-3 text-center">{{ $key + 1 }}</td>
                    <td class="border border-gray-300 px-4 py-3 text-center">{{ $pro->cate_name }}</td>
                    <td class="border border-gray-300 px-4 py-3">{{ $pro->name }}</td>
                    <td class="border border-gray-300 px-4 py-3">
                        @if ($pro->img != null)
                        <img src="{{ asset('storage/'. $pro->img) }}" alt="" width="90">
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-3 text-center text-green-600 font-semibold">{{ number_format($pro->price) }} đ</td>
                    <td class="border border-gray-300 px-4 py-3 text-gray-600">{{ $pro->description }}</td>
                    <td class="border border-gray-300 px-4 py-3 text-center">
                        <span class="{{ $pro->isHot == 1 ? 'text-red-500 font-bold' : 'text-gray-500' }}">
                            {{ $pro->isHot == 1 ? 'Hot' : 'Không hot' }}
                        </span>
                    </td>
                    <td class="border border-gray-300 px-4 py-3 text-center">
                        <a href="{{ route('products.edit', $pro->id) }}" class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 transition">Sửa</a>
                        <form action="{{ route('products.deletePro', $pro->id) }}" method="post" class="inline-block" onsubmit="return confirm('Xóa?')" >
                            @method('delete')
                            @csrf
                            <button class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 transition">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
