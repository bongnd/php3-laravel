<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <table class="table-auto w-full border-collapse border border-gray-300 bg-white shadow-md rounded-lg">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tên Đơn Vị</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">
                    <a href="{{ route('users.addUsers') }}" class="bg-yellow-300 text-white px-4 py-2 rounded shadow hover:bg-yellow-400">
    Thêm Mới
</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $key => $l)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">{{ $key }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $l->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $l->email }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $l->ten_donvi }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            Sửa
                        </a>
                        <a class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" href="{{ route('users.delete', $l->id) }}">
                            Xóa
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
