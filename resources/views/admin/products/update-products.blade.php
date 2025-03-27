<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Sản Phẩm</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <form action="{{ route('products.update', $product->id) }}" method="post" class="bg-white p-6 rounded-lg shadow-md w-96" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <h2 class="text-2xl font-bold text-center mb-4 text-gray-700">Cập Nhật Sản Phẩm</h2>

        <label class="block text-gray-600 font-semibold mb-1">Tên sản phẩm</label>
        <input type="text" name="name" value="{{ $product->name }}" 
               class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">
               <label class="block text-gray-600 font-semibold mb-1">Ảnh sản phẩm</label>
        <input type="file" name="img" class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">

               @if ($product->img != null)
                        <img src="{{ asset('storage/'. $product->img) }}" alt="" width="90">
                        @endif




        <label class="block text-gray-600 font-semibold mb-1">Danh mục</label>
        <select name="category_id" class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">
            @foreach ($category as $cate)
            <option value="{{ $cate->id }}" @selected($cate->id == $product->category_id)>{{ $cate->name }}</option>
            @endforeach
        </select>

        <label class="block text-gray-600 font-semibold mb-1">Giá</label>
        <input type="number" name="price" value="{{ $product->price }}" 
               class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">

        <label class="block text-gray-600 font-semibold mb-1">Mô tả</label>
        <textarea name="description" 
                  class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">{{ $product->description }}</textarea>

        <label class="flex items-center space-x-2 text-gray-600 font-semibold">
            <input type="hidden" name="isHot" value="0">
            <input type="checkbox" name="isHot" value="1" 
                   class="h-4 w-4 text-blue-500" {{ $product->isHot == 1 ? 'checked' : '' }}>
            <span>Hot</span>
        </label>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition mt-4">
            Cập Nhật
        </button>
    </form>

</body>
</html>
