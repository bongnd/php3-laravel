<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td>Tên</td>
                <td>Điểm</td>
                <td>Sếp Hạng</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $n)
            <tr>
                <td>{{ $n['name'] }}</td>
                <td>{{ $n['diem'] }}</td>
                <td>@if ($n['diem']>8)
                    Giỏi
            
                    @else
                    Bình Thường
                @endif
                
            </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
</body>
</html>