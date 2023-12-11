<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History Report</title>
    <!-- Add any additional styles or assets here -->
</head>

<body>
    <h1>Order History Report</h1>

    <table>
        <thead>
            <tr>
                <th>Ordered Product</th>
                <th>Delivery Date</th>
                <th>Total Price</th>
                <th>Order per Bag</th>
                <th>Order per Kilo</th>
                <th>Recipient</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->product->product_name }}</td>
                    <td>{{ $order->due_date }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->order_quantity }}</td>
                    <td>{{ $order->order_kilo }}</td>
                    <td>{{ $order->recipient }}</td>
                    <td>{{ $order->status == 1 ? 'Completed' : ($order->status == 2 ? 'Cancelled' : 'Unknown') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
