<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Người Dùng</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-xl font-semibold text-center mb-4">Thêm Người Dùng</h2>

        <form action="{{ route('users.store') }}" method="post" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium text-gray-700">Name</label>
                <input type="text" name="name" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-200" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-200" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Phòng Ban</label>
                <select name="phongban_id" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                    @foreach ($phongban as $pb)
                        <option value="{{ $pb->id }}">{{ $pb->ten_donvi }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Tuổi</label>
                <input type="number" name="tuoi" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-200" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">
                Nộp
            </button>
        </form>
    </div>

</body>
</html>
