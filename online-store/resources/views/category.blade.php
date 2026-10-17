<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category }} | Minimalist</title>

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

        .page-hero {
            margin: 30px auto;
            width: 90%;
            padding: 50px 30px;
            background: #e9e3d9;
            text-align: center;
            border-radius: 12px;
        }

        .page-hero p {
            color: #666;
            letter-spacing: 2px;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .page-hero h1 {
            font-size: clamp(28px, 5vw, 44px);
        }

        .section {
            width: 90%;
            margin: 40px auto;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 22px;
            color: #333;
            font-size: 14px;
            text-decoration: none;
        }

        .back-link:hover {
            color: #a16b45;
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

        .description {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 12px;
        }

        .price {
            font-size: 19px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .stock {
            color: #777;
            font-size: 13px;
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
            .products {
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

            .products {
                grid-template-columns: 1fr;
            }

            .page-hero {
                padding: 40px 20px;
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
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </nav>
    </header>

    <section class="page-hero">
        <p>CATEGORY</p>

        <h1>{{ $category }}</h1>
    </section>

    <main class="section">
        <a href="/products" class="back-link">&larr; Back to Shop</a>

        @if ($products->count() > 0)
            <div class="products">
                @foreach ($products as $product)
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
                        </a>

                        <p class="description">
                            {{ $product->description }}
                        </p>

                        <p class="price">
                            ৳{{ number_format($product->price, 2) }}
                        </p>

                        <p class="stock">
                            Stock: {{ $product->stock }}
                        </p>

                    </article>
                @endforeach
            </div>
        @else
            <p class="empty">No products found in this category yet.</p>
        @endif
    </main>

    <footer>
        <p>MINIMALIST — Your everyday shopping destination.</p>

        <p style="margin-top: 10px;">
            © {{ date('Y') }} Minimalist. All rights reserved.
        </p>
    </footer>
</body>
</html>