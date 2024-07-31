<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>Customers and Their Factors</h1>
    <ul>
        @foreach($customers as $customer)
            <li>
                <h2>{{ $customer->fullname }}</h2>
                <p>National Code: {{ $customer->national_code }}</p>
                <p>Mobile: {{ $customer->mobile }}</p>
                <p>Phone: {{ $customer->phone }}</p>
                <p>Address: {{ $customer->address }}</p>

                <h3>Factors:</h3>
                <ul>
                    @foreach($customer->factors as $factor)
                        <li>
                            <p>Factor ID: {{ $factor->id }}</p>
                            <p>Type: {{ $factor->type }}</p>
                            <p>Status: {{ $factor->status }}</p>

                            <h4>Factor Items:</h4>
                            <ul>
                                @foreach($factor->factorItems as $item)
                                    <li>
                                        <p>Title: {{ $item->title }}</p>
                                        <p>Price: {{ $item->price }}</p>
                                        <p>Total: {{ $item->total }}</p>
                                        <p>Discount: {{ $item->discount }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
