
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Minimalist</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #292929;
            background: #ffffff;
            line-height: 1.7;
        }

        .hero {
            background: #f5f0eb;
            text-align: center;
            padding: 75px 20px;
        }

        .hero p {
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 12px;
            color: #777;
        }

        .hero h1 {
            font-size: 42px;
            margin: 10px 0;
        }

        .hero .subtitle {
            text-transform: none;
            letter-spacing: normal;
            font-size: 16px;
            max-width: 600px;
            margin: 0 auto;
        }

        .container {
            max-width: 1050px;
            margin: auto;
            padding: 55px 22px;
        }

        .story {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 45px;
            align-items: center;
        }

        .story h2,
        .values h2 {
            font-size: 30px;
            margin-top: 0;
        }

        .story p {
            color: #666;
        }

        .image-placeholder {
            min-height: 300px;
            background: #f5f0eb;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 25px;
            color: #777;
            border-radius: 4px;
        }

        .values {
            background: #faf8f6;
            text-align: center;
            padding: 55px 22px;
        }

        .value-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            max-width: 1050px;
            margin: 30px auto 0;
        }

        .value-card {
            background: white;
            padding: 25px 20px;
            border: 1px solid #eee;
            border-radius: 5px;
        }

        .value-card h3 {
            margin-top: 0;
        }

        .value-card p {
            color: #666;
            font-size: 14px;
        }

        .closing {
            text-align: center;
            padding: 55px 20px;
        }

        .closing a {
            display: inline-block;
            padding: 12px 25px;
            background: #292929;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 12px;
        }

        .closing a:hover {
            background: #555;
        }

        @media (max-width: 700px) {
            .hero h1 {
                font-size: 32px;
            }

            .story,
            .value-grid {
                grid-template-columns: 1fr;
            }

            .story {
                gap: 25px;
            }
        }
    </style>
</head>

<body>

    <section class="hero">
        <p>Welcome to Minimalist</p>
        <h1>About Us</h1>
        <p class="subtitle">
            Thoughtfully selected fashion and accessories
            for your everyday style.
        </p>
    </section>

    <section class="container">
        <div class="story">
            <div>
                <h2>Our Story</h2>

                <p>
                    At Minimalist, we believe that personal style
                    should feel simple, comfortable, and uniquely yours.
                </p>

                <p>
                    Our store brings together clothing, beauty essentials,
                    and accessories to help you discover pieces that fit
                    your everyday life.
                </p>

                <p>
                    We aim to make online shopping easy, enjoyable,
                    and accessible, with a focus on thoughtful choices
                    and a pleasant shopping experience.
                </p>
            </div>

            <div class="image-placeholder">
                <p>Your brand or fashion image can go here.</p>
            </div>
        </div>
    </section>

    <section class="values">
        <h2>What Matters to Us</h2>

        <div class="value-grid">
            <div class="value-card">
                <h3>Everyday Style</h3>
                <p>
                    Discover clothing and accessories
                    for different moods and occasions.
                </p>
            </div>

            <div class="value-card">
                <h3>Simple Shopping</h3>
                <p>
                    We want browsing and discovering
                    your favorite products to feel easy.
                </p>
            </div>

            <div class="value-card">
                <h3>Customer Care</h3>
                <p>
                    We value your experience and aim
                    to make every visit pleasant.
                </p>
            </div>
        </div>
    </section>

    <section class="closing">
        <h2>Discover Your Style</h2>
        <p>Explore our collection and find something you love.</p>
        <a href="/products">Explore Our Products</a>
    </section>

</body>
</html>
