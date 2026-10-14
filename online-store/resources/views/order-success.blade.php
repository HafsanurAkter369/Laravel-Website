<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Placed | Minimalist</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8f7f4;
            color: #222;
        }

        header {
            background: #fff;
            padding: 22px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
            flex-wrap: wrap;
            gap: 15px;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 2px;
            color: #222;
            text-decoration: none;
        }

        nav {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        nav a {
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        nav a:hover {
            color: #a16b45;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 40px auto;
        }

        .box {
            background: #fff;
            padding: 34px 28px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .thanks {
            text-align: center;
            margin-bottom: 26px;
        }

        .thanks h1 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .thanks p {
            color: #666;
            line-height: 1.7;
        }

        .order-number {
            display: inline-block;
            margin-top: 14px;
            padding: 8px 18px;
            background: #e5f5e8;
            color: #246b35;
            border-radius: 999px;
            font-weight: bold;
        }

        h2 {
            font-size: 18px;
            margin: 26px 0 12px;
        }

        .info p {
            color: #555;
            line-height: 1.8;
            font-size: 15px;
        }

        .item {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            font-size: 15px;
        }

        .item small {
            display: block;
            color: #777;
            margin-top: 4px;
        }

        .total {
            display: flex;
            justify-content: space-between;
            margin-top: 18px;
            font-size: 20px;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            margin-top: 28px;
            padding: 13px 28px;
            background: #222;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .button:hover {
            background: #a16b45;
        }

        .center {
            text-align: center;
        }

        @media (max-width: 520px) {
            header {
                padding: 20px 5%;
            }

            nav {
                gap: 14px;
            }
        }
    </style>
</head>

<body>
    <header>
        <a href="/" class="logo">MINIMALIST.</a>

        <nav>
            <a href="/">Home</a>
            <a href="/products">Shop</a>
            <a href="/cart">Cart</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </nav>
    </header>

    <main class="container">
        <div class="box">

            <div class="thanks">
                <h1>Thank you for your order!</h1>

                <p>
                    We have received your order and will contact you
                    soon to confirm the delivery.
                </p>

                <span class="order-number">Order #{{ $order->id }}</span>
            </div>

            <h2>Delivery Details</h2>

            <div class="info">
                <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                <p><strong>Address:</strong> {{ $order->address }}</p>
                <p><strong>Payment:</strong> Cash on delivery</p>
            </div>

            <h2>Your Items</h2>

            @foreach ($order->items as $item)
                <div class="item">
                    <div>
                        {{ $item->product_name }}
                        <small>
                            {{ $item->quantity }} &times;
                            ৳{{ number_format($item->price, 2) }}
                        </small>
                    </div>

                    <div>
                        ৳{{ number_format($item->price * $item->quantity, 2) }}
                    </div>
                </div>
            @endforeach

            <div class="total">
                <span>Total</span>
                <span>৳{{ number_format($order->total, 2) }}</span>
            </div>

            <div class="center">
                <a href="/products" class="button">Continue Shopping</a>
            </div>

        </div>
    </main>
</body>
</html>