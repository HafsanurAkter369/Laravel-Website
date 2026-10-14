<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Minimalist</title>

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
            margin: 45px auto;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .card {
            background: white;
            padding: 30px 22px;
            border-radius: 10px;
            border: 1px solid #eee;
            text-align: center;
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .card p {
            color: #666;
            font-size: 15px;
            line-height: 1.6;
        }

        .back-button {
            display: inline-block;
            margin-top: 30px;
            padding: 13px 28px;
            background: #222;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .back-button:hover {
            background: #a16b45;
        }

        footer {
            margin-top: 60px;
            padding: 28px;
            text-align: center;
            background: #222;
            color: white;
        }

        @media (max-width: 800px) {
            .cards {
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
        <p>GET IN TOUCH</p>

        <h1>Contact Us</h1>

        <p class="subtitle">
            Have a question about an order or a product? We would love to help.
        </p>
    </section>

    <main class="section">
        <div class="cards">
            <div class="card">
                <h3>Email</h3>
                <p>hello@minimalist.example</p>
            </div>

            <div class="card">
                <h3>Phone</h3>
                <p>+880 1XXX-XXXXXX</p>
            </div>

            <div class="card">
                <h3>Address</h3>
                <p>Your store address here</p>
            </div>
        </div>

        <a href="/products" class="back-button">Continue Shopping</a>
    </main>

    <footer>
        <p>MINIMALIST — Your everyday shopping destination.</p>

        <p style="margin-top: 10px;">
            © {{ date('Y') }} Minimalist. All rights reserved.
        </p>
    </footer>
</body>
</html>