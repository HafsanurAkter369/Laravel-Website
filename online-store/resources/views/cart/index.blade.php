<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shopping Cart | Minimalist</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px 20px;
            font-family: Arial, sans-serif;
            background: #f8f7f4;
            color: #222;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .back-link {
            color: #333;
            text-decoration: none;
        }

        h1 {
            margin: 25px 0;
        }

        .cart-box {
            padding: 25px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .success {
            padding: 14px;
            margin-bottom: 20px;
            background: #e5f5e8;
            color: #246b35;
            border-radius: 6px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }

        .cart-item h3 {
            margin-top: 0;
        }

        .item-details {
            color: #666;
            line-height: 1.7;
        }

        .item-details p {
            margin: 6px 0;
        }

        .item-right {
            text-align: right;
        }

        .item-total {
            font-size: 18px;
            font-weight: bold;
            white-space: nowrap;
        }

        .quantity-form {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
        }

        .quantity-form input[type="number"] {
            width: 80px;
            padding: 9px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
        }

        .update-button {
            padding: 9px 14px;
            border: none;
            border-radius: 6px;
            background: #222;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        .update-button:hover {
            background: #98765b;
        }

        .remove-form {
            margin-top: 10px;
        }

        .remove-button {
            padding: 0;
            border: none;
            background: none;
            color: #b42318;
            font-size: 14px;
            text-decoration: underline;
            cursor: pointer;
        }

        .error-box {
            padding: 14px;
            margin-bottom: 20px;
            background: #fde8e6;
            color: #b42318;
            border-radius: 6px;
        }

        .error-box p {
            margin: 4px 0;
        }

        .grand-total {
            margin-top: 25px;
            text-align: right;
            font-size: 24px;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 13px 22px;
            background: #222;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .button:hover {
            background: #98765b;
        }

        .empty-cart {
            padding: 25px 0;
            color: #666;
        }

        @media (max-width: 600px) {
            .cart-box {
                padding: 18px;
            }

            .cart-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .item-right {
                text-align: left;
            }

            .quantity-form {
                flex-wrap: wrap;
            }

            .grand-total {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <a href="/products" class="back-link">
            &larr; Continue Shopping
        </a>

        <h1>Shopping Cart</h1>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-box">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="cart-box">

            @forelse ($cart as $item)
                <div class="cart-item">

                    <div>
                        <h3>{{ $item['name'] }}</h3>

                        <div class="item-details">
                            <p>
                                Unit Price:
                                ৳{{ number_format($item['price'], 2) }}
                            </p>
                        </div>

                        <form
                            class="quantity-form"
                            action="/cart/update/{{ $item['id'] }}"
                            method="POST"
                        >
                            @csrf

                            <label for="quantity-{{ $item['id'] }}">Quantity:</label>

                            <input
                                type="number"
                                id="quantity-{{ $item['id'] }}"
                                name="quantity"
                                value="{{ $item['quantity'] }}"
                                min="1"
                                required
                            >

                            <button type="submit" class="update-button">
                                Update
                            </button>
                        </form>
                    </div>

                    <div class="item-right">
                        <div class="item-total">
                            ৳{{ number_format($item['price'] * $item['quantity'], 2) }}
                        </div>

                        <form
                            class="remove-form"
                            action="/cart/remove/{{ $item['id'] }}"
                            method="POST"
                        >
                            @csrf

                            <button type="submit" class="remove-button">
                                Remove
                            </button>
                        </form>
                    </div>

                </div>
            @empty
                <div class="empty-cart">
                    <h3>Your cart is empty.</h3>
                    <p>Add some products to your shopping cart.</p>
                </div>
            @endforelse

            @if (count($cart) > 0)
                <div class="grand-total">
                    Total: ৳{{ number_format($total, 2) }}
                </div>
            @endif

            <a href="/products" class="button">
                Continue Shopping
            </a>

        </div>
    </div>
</body>
</html>