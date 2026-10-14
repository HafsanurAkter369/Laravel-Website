<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minimalist | Home</title>

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

        .hero {
            margin: 30px auto;
            width: 90%;
            padding: 80px 30px;
            background: #e9e3d9;
            text-align: center;
            border-radius: 12px;
        }

        .hero p {
            color: #666;
            margin-bottom: 12px;
            letter-spacing: 2px;
            font-size: 13px;
        }

        .hero h1 {
            font-size: clamp(30px, 5vw, 52px);
            margin-bottom: 15px;
        }

        .hero .subtitle {
            margin-bottom: 28px;
            letter-spacing: normal;
            font-size: 16px;
        }

        .shop-button {
            display: inline-block;
            padding: 14px 32px;
            background: #222;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .shop-button:hover {
            background: #a16b45;
        }

        .section {
            width: 90%;
            margin: 50px auto;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .section-heading h2 {
            font-size: 27px;
        }

        .section-heading a {
            color: #98765b;
            text-decoration: none;
            font-size: 14px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .product {
            background: white;
            padding: 16px;
            border-radius: 10px;
            border: 1px solid #eee;
            transition: transform 0.2s;
        }

        .product:hover {
            transform: translateY(-4px);
        }

        .product-link {
            display: block;
            color: inherit;
            text-decoration: none;
        }

        .product-link img {
            display: block;
            width: 100%;
            height: 230px;
            object-fit: cover;
            border-radius: 7px;
            margin-bottom: 15px;
            background: #f1f1f1;
        }

        .no-image {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 230px;
            margin-bottom: 15px;
            border-radius: 7px;
            background: #e9e3d9;
            color: #98765b;
            font-size: 56px;
            font-weight: bold;
        }

        .category {
            color: #777;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .product h3 {
            font-size: 19px;
            margin-bottom: 10px;
        }

        .product-link:hover h3 {
            color: #a16b45;
        }

        .price {
            font-size: 19px;
            font-weight: bold;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .feature {
            background: white;
            padding: 28px 22px;
            border-radius: 10px;
            border: 1px solid #eee;
            text-align: center;
        }

        .feature h3 {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .feature p {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
        }

        .empty {
            background: white;
            padding: 30px;
            border-radius: 8px;
        }

        footer {
            margin-top: 60px;
            padding: 28px;
            text-align: center;
            background: #222;
            color: white;
        }

        @media (max-width: 800px) {
            .products,
            .features {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 520px) {
            header {
                padding: 20px 5%;
            }

            nav {
                gap: 14px;
            }

            .products,
            .features {
                grid-template-columns: 1fr;
            }

            .hero {
                padding: 50px 20px;
            }

            .product-link img,
            .no-image {
                height: 260px;
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
        </nav>
    </header>

    <section class="hero">
        <p>WELCOME TO MINIMALIST</p>

        <h1>Find Your Everyday Essentials</h1>

        <p class="subtitle">
            Discover products selected for your everyday lifestyle.
        </p>

        <a href="/products" class="shop-button">Shop Now</a>
    </section>

    <main class="section">
        <div class="section-heading">
            <h2>Featured Products</h2>
            <a href="/products">View all products &rarr;</a>
        </div>

        @if ($featured->count() > 0)
            <div class="products">
                @foreach ($featured as $product)
                    <article class="product">
                        <a
                            href="{{ url('/products/' . $product->id) }}"
                            class="product-link"
                        >
                            @if ($product->image)
                                <img
                                    src="{{ asset('images/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                >
                            @else
                                <div class="no-image">
                                    {{ strtoupper(substr($product->name, 0, 1)) }}
                                </div>
                            @endif

                            <p class="category">
                                {{ $product->category }}
                            </p>

                            <h3>{{ $product->name }}</h3>

                            <p class="price">
                                ৳{{ number_format($product->price, 2) }}
                            </p>
                        </a>
                    </article>
                @endforeach
            </div>
        @else
            <p class="empty">
                No products available yet. Please check back soon.
            </p>
        @endif
    </main>

    <section class="section">
        <div class="features">
            <div class="feature">
                <h3>Quality Products</h3>
                <p>Every item is selected with care for everyday use.</p>
            </div>

            <div class="feature">
                <h3>Simple Shopping</h3>
                <p>Browse, add to cart and update your order with ease.</p>
            </div>

            <div class="feature">
                <h3>Fair Prices</h3>
                <p>Clear prices in Taka with no hidden surprises.</p>
            </div>
        </div>
    </section>

    <footer>
        <p>MINIMALIST — Your everyday shopping destination.</p>

        <p style="margin-top: 10px;">
            © {{ date('Y') }} Minimalist. All rights reserved.
        </p>
    </footer>
</body>
</html>