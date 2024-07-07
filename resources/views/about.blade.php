<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="test.js"></script>
</head>
<body>
<h1>Products</h1>
@foreach ($produqtebi as $produqti)
    <div>{{ $produqti['name'] }}</div>
@endforeach
@for ($i = 0; $i < count($produqtebi); $i++)
    <div>{{ $produqtebi[$i]['name'] }}</div>
@endfor
</body>
</html>