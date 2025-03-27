<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/kqca" method="post">
        @csrf
        <input type="number" name="s1" required>
        <select name="dau" >
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" name="s2" required> 
        <button type="submit">nộp</button>
    </form>
</body>
</html>