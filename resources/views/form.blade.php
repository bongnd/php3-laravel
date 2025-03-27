<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/kq" method="post">
        @csrf
        <label for="">Tên</label>
        <input type="text" name="name"><br>
        <label for="">Tuổi</label>
        <input type="number" name="age">
        <button type="submit">nộp</button>
    </form>
</body>
</html>