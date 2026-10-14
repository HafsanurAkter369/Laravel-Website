<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Minimalist</title>

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
            padding: 60px 30px;
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
            margin-bottom: 12px;
        }

        .page-hero .subtitle {
            letter-spacing: normal;
            font-size: 16px;
            margin-bottom: 0;
        }

        .section {
            width: 90%;
            max-width: 900px;
            margin: 45px auto;
        }

        .section h2 {
            font-size: 26px;
            margin-bottom: 14px;
        }

        .section p {
            color: #555;
            line-height: 1.8;
            font-size: 16px;
        }

        .values {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
            width: 90%;
            margin: 45px auto;
        }

        .value {
            background: white;
            padding: 28px 22px;
            border-radius: 10px;
            border: 1px solid #eee;
            text-align: center;
        }

        .value h3 {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .value p {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
        }

        .shop-button {
            display: inline-block;
            margin-top: 10px;
            padding: 13px 28px;
            background: #222;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .shop-button:hover {
            background: #a16b45;
        }

        .center {
            text-align: center;
        }

        footer {
            margin-top: 60px;
            padding: 28px;
            text-align: center;
            background: #222;
            color: white;
        }

        @media (max-width: 800px) {
            .values {
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

            .page-hero {
                padding: 40px 20px;
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
        <p>ABOUT US</p>

        <h1>Simple Products, Honest Prices</h1>

        <p class="subtitle">
            Learn a little about who we are and what we believe in.
        </p>
    </section>

    <section class="section">
        <h2>Our Story</h2>

        <p>
            Minimalist started in Dhaka with a simple idea: everyday products
            should be well made, easy to choose and fairly priced. We pick a
            small collection of items you can really use, so you spend less
            time searching and more time enjoying what you buy.
        </p>
    </section>

    <section class="section">
        <h2>Our Mission</h2>

        <p>
            We want shopping to feel calm and clear. No clutter, no confusing
            choices, only useful products with honest descriptions and clear
            prices in Taka.
        </p>
    </section>

    <section class="values">
        <div class="value">
            <h3>Quality First</h3>
            <p>Every product is chosen with care for everyday use.</p>
        </div>

        <div class="value">
            <h3>Keep It Simple</h3>
            <p>A clean store that makes browsing and buying easy.</p>
        </div>

        <div class="value">
            <h3>Fair Prices</h3>
            <p>Clear prices with no hidden surprises.</p>
        </div>
    </section>

    <section class="section center">
        <a href="/products" class="shop-button">Start Shopping</a>
    </section>

    <footer>
        <p>MINIMALIST — Your everyday shopping destination.</p>

        <p style="margin-top: 10px;">
            © {{ date('Y') }} Minimalist. All rights reserved.
        </p>
    </footer>
</body>
</html>