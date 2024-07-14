<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="test.js"></script>
</head>
<body>
    <h1>ჩემი შეკვეთები</h1>

    @foreach ($account->orders as $order)
        <h2>შეკვეთა #{{ $order['id'] }}</h2>
        @foreach ($order->orderProducts as $orderProduct)
            <div>პროდუქტი {{ $orderProduct->product['title'] }} ({{ $orderProduct['id'] }}),
                ფასი {{ $orderProduct['price'] / 100 }}₾,
                რაოდენობა {{ $orderProduct['quantity'] }} ცალი
            </div>
        @endforeach
    @endforeach
</body>
</html>