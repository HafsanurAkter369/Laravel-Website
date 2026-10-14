<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->name }} | Minimalist</title>

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
            max-width: 1000px;
            margin: 0 auto;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #333;
            text-decoration: none;
        }

        .product {
            display: flex;
            align-items: center;
            gap: 40px;
            padding: 35px;
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06);
        }

        .product-image {
            width: 45%;
            max-height: 450px;
            object-fit: cover;
            border-radius: 10px;
        }

        .no-image {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45%;
            height: 350px;
            border-radius: 10px;
            background: #e9e3d9;
            color: #98765b;
            font-size: 90px;
            font-weight: bold;
        }

        .product-info {
            flex: 1;
        }

        .category {
            color: #98765b;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 13px;
        }

        h1 {
            margin: 12px 0;
            font-size: 32px;
        }

        .description {
            color: #666;
            line-height: 1.8;
        }

        .price {
            margin: 20px 0;
            font-size: 27px;
            font-weight: bold;
        }

        .stock {
            color: #47744c;
        }

        .cart-form {
            margin-top: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="number"] {
            width: 100px;
            padding: 11px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }

        .cart-button {
            display: block;
            width: 100%;
            max-width: 260px;
            margin-top: 18px;
            padding: 14px 20px;
            border: none;
            border-radius: 6px;
            background: #222;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .cart-button:hover {
            background: #98765b;
        }

        .cart-button:disabled {
            background: #999;
            cursor: not-allowed;
        }

        .view-cart {
            display: inline-block;
            margin-top: 18px;
            color: #333;
        }

        .error {
            color: #b42318;
            margin-top: 10px;
        }

        @media (max-width: 650px) {
            body {
                padding: 20px 12px;
            }

            .product {
                flex-direction: column;
                padding: 20px;
                gap: 20px;
            }

            .product-image {
                width: 100%;
                max-height: 350px;
            }

            .no-image {
                width: 100%;
                height: 260px;
            }

            h1 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <a href="{{ url('/products') }}" class="back-link">
            &larr; Back to Products
        </a>

        <div class="product">

            @if ($product->image)
                <img
                    class="product-image"
                    src="{{ asset('images/' . $product->image) }}"
                    alt="{{ $product->name }}"
                >
            @else
                <div class="no-image">
                    {{ strtoupper(substr($product->name, 0, 1)) }}
                </div>
            @endif

            <div class="product-info">

                <p class="category">
                    {{ $product->category }}
                </p>

                <h1>{{ $product->name }}</h1>

                <p class="description">
                    {{ $product->description }}
                </p>

                <p class="price">
                    ৳{{ number_format($product->price, 2) }}
                </p>

                <p class="stock">
                    @if ($product->stock > 0)
                        In Stock: {{ $product->stock }}
                    @else
                        Out of Stock
                    @endif
                </p>

                @if ($errors->any())
                    <div class="error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                @if ($product->stock > 0)
                    <form
                        class="cart-form"
                        action="/cart/add/{{ $product->id }}"
                        method="POST"
                    >
                        @csrf

                        <label for="quantity">Quantity:</label>

                        <input
                            type="number"
                            id="quantity"
                            name="quantity"
                            value="1"
                            min="1"
                            max="{{ $product->stock }}"
                            required
                        >

                        <button type="submit" class="cart-button">
                            Add to Cart
                        </button>
                    </form>
                @else
                    <button class="cart-button" disabled>
                        Out of Stock
                    </button>
                @endif

                <a href="{{ url('/cart') }}" class="view-cart">
                    View Shopping Cart
                </a>

            </div>
        </div>
    </div>
</body>
</html>