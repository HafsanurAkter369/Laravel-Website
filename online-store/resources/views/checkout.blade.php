<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Minimalist</title>

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
            max-width: 1000px;
            margin: 35px auto;
        }

        h1 {
            margin-bottom: 25px;
        }

        .layout {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 28px;
            align-items: start;
        }

        .box {
            background: #fff;
            padding: 26px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .box h2 {
            font-size: 20px;
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin: 14px 0 6px;
            font-weight: bold;
            font-size: 14px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            font-family: Arial, sans-serif;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .place-order {
            display: block;
            width: 100%;
            margin-top: 22px;
            padding: 14px 20px;
            border: none;
            border-radius: 6px;
            background: #222;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .place-order:hover {
            background: #a16b45;
        }

        .error-box {
            padding: 14px;
            margin-bottom: 18px;
            background: #fde8e6;
            color: #b42318;
            border-radius: 6px;
            font-size: 14px;
        }

        .error-box p {
            margin: 4px 0;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            font-size: 15px;
        }

        .summary-item small {
            display: block;
            color: #777;
            margin-top: 4px;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            margin-top: 18px;
            font-size: 20px;
            font-weight: bold;
        }

        .note {
            margin-top: 14px;
            color: #777;
            font-size: 13px;
        }

        .back-link {
            display: inline-block;
            margin-top: 18px;
            color: #333;
            font-size: 14px;
        }

        @media (max-width: 760px) {
            .layout {
                grid-template-columns: 1fr;
            }
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
        <h1>Checkout</h1>

        <div class="layout">

            <div class="box">
                <h2>Delivery Details</h2>

                @if ($errors->any())
                    <div class="error-box">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="/checkout" method="POST">
                    @csrf

                    <label for="customer_name">Full Name</label>
                    <input
                        type="text"
                        id="customer_name"
                        name="customer_name"
                        value="{{ old('customer_name') }}"
                        required
                    >

                    <label for="phone">Phone Number</label>
                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        value="{{ old('phone') }}"
                        required
                    >

                    <label for="address">Delivery Address</label>
                    <textarea
                        id="address"
                        name="address"
                        required
                    >{{ old('address') }}</textarea>

                    <button type="submit" class="place-order">
                        Place Order
                    </button>
                </form>

                <a href="/cart" class="back-link">&larr; Back to Cart</a>
            </div>

            <div class="box">
                <h2>Order Summary</h2>

                @foreach ($cart as $item)
                    <div class="summary-item">
                        <div>
                            {{ $item['name'] }}
                            <small>
                                {{ $item['quantity'] }} &times;
                                ৳{{ number_format($item['price'], 2) }}
                            </small>
                        </div>

                        <div>
                            ৳{{ number_format($item['price'] * $item['quantity'], 2) }}
                        </div>
                    </div>
                @endforeach

                <div class="summary-total">
                    <span>Total</span>
                    <span>৳{{ number_format($total, 2) }}</span>
                </div>

                <p class="note">Payment: Cash on delivery.</p>
            </div>

        </div>
    </main>
</body>
</html>