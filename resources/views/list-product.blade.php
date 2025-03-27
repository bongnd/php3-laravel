<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Xin chào</h1>
    <table>
        <thead>
           <tr>
               <th>ID</th>
               <th>Name</th>
           </tr>
        </thead>
        <tbody>
        @foreach ($list as $hi)
           <tr>
               <td>{{ $hi['id'] }}</td>
               <td>{{ $hi['name'] }}</td>
           </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
