
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minimalist | Online Shopping</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            color: #252525;
            background: #faf9f6;
        }

        header {
            background: #fff;
            padding: 20px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            flex-wrap: wrap;
            box-shadow: 0 2px 12px #00000008;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
            letter-spacing: 3px;
        }

        nav {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        nav a {
            color: #333;
            text-decoration: none;
            font-size: 14px;
        }

        nav a:hover {
            color: #888;
        }

        .search {
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            font-size: 14px;
            max-width: 100%;
        }

        .search:focus {
            border-color: #777;
        }

        .cart {
            white-space: nowrap;
            font-size: 14px;
        }

        .hero {
            width: 86%;
            margin: 35px auto;
            padding: 60px 8%;
            border-radius: 8px;
            background: #eeece5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
        }

        .tag {
            font-size: 11px;
            letter-spacing: 2px;
            color: #666;
            font-weight: bold;
        }

        .hero h1 {
            font-size: clamp(34px, 5vw, 54px);
            line-height: 1.15;
            margin: 20px 0;
        }

        .hero p {
            line-height: 1.8;
            color: #666;
        }

        .hero-icon {
            font-size: 100px;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 14px 24px;
            background: #252525;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn:hover {
            background: #555;
        }

        .section {
            width: 86%;
            margin: 50px auto;
        }

        .section-title {
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
        }

        .section-title h2 {
            font-size: 25px;
        }

        .categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
            gap: 15px;
        }

        .category {
            border: 1px solid #eee;
            background: white;
            padding: 22px 12px;
            border-radius: 6px;
            text-align: center;
            cursor: pointer;
            color: #252525;
            font-size: 14px;
        }

        .category span {
            display: block;
            font-size: 32px;
            margin-bottom: 12px;
        }

        .category:hover,
        .category.active {
            border-color: #252525;
            background: #f1f0eb;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .product {
            background: white;
            border: 1px solid #eee;
            padding: 15px;
            border-radius: 6px;
            transition: transform 0.2s;
        }

        .product:hover {
            transform: translateY(-3px);
        }

        .product-image {
            height: 170px;
            background: #f3f1eb;
            display: grid;
            place-items: center;
            font-size: 65px;
            margin-bottom: 18px;
            border-radius: 4px;
        }

        .product h3 {
            font-size: 17px;
        }

        .product p {
            color: #777;
            font-size: 13px;
            line-height: 1.6;
            margin: 10px 0;
        }

        .price {
            font-weight: bold;
            font-size: 18px;
            margin-top: 12px;
        }

        .cart-btn {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            background: #252525;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .cart-btn:hover {
            background: #555;
        }

        #noResults {
            display: none;
            padding: 30px 0;
            color: #777;
        }

        footer {
            margin-top: 70px;
            background: #252525;
            color: white;
            padding: 35px 7%;
            text-align: center;
            line-height: 2;
        }

        footer .logo {
            margin-bottom: 8px;
        }

        @media (max-width: 600px) {
            header {
                padding: 20px 5%;
            }

            nav {
                width: 100%;
            }

            .search {
                width: 100%;
            }

            .hero,
            .section {
                width: 92%;
            }

            .hero {
                padding: 35px 7%;
            }

            .hero-icon {
                font-size: 70px;
            }

            .products {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .product {
                padding: 10px;
            }

            .product-image {
                height: 120px;
                font-size: 48px;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="logo">MINIMALIST.</div>

    <nav>
        <a href="#home">Home</a>
        <a href="#categories">Categories</a>
        <a href="#products">Products</a>
    </nav>

    <input
        type="search"
        id="productSearch"
        class="search"
        placeholder="Search products..."
        aria-label="Search products"
    >

    <div class="cart">
        🛒 Cart (<span id="cartCount">0</span>)
    </div>
</header>

<section class="hero" id="home">
    <div>
        <div class="tag">SIMPLE STYLE. EVERYDAY ESSENTIALS.</div>
        <h1>Less clutter.<br>More of what you love.</h1>
        <p>Discover thoughtfully selected products for your everyday life.</p>
        <a class="btn" href="#products">Explore Products →</a>
    </div>

    <div class="hero-icon">🛍️</div>
</section>

<section class="section" id="categories">
    <div class="section-title">
        <h2>Shop by Category</h2>
    </div>

    <div class="categories">
        <button class="category active" data-filter="all">
            <span>🛍️</span>
            <strong>All Products</strong>
        </button>

        <button class="category" data-filter="fashion">
            <span>👕</span>
            <strong>Fashion</strong>
        </button>

        <button class="category" data-filter="electronics">
            <span>📱</span>
            <strong>Electronics</strong>
        </button>

        <button class="category" data-filter="home">
            <span>🏠</span>
            <strong>Home & Living</strong>
        </button>

        <button class="category" data-filter="beauty">
            <span>💄</span>
            <strong>Beauty</strong>
        </button>
    </div>
</section>

<section class="section" id="products">
    <div class="section-title">
        <h2>Featured Products</h2>
        <span>Everyday favourites</span>
    </div>

    <div class="products" id="productList">

        <div class="product" data-category="electronics">
            <div class="product-image">🎧</div>
            <h3>Wireless Headphones</h3>
            <p>Comfortable everyday sound</p>
            <div class="price">৳ 1,250</div>
            <button class="cart-btn" type="button">Add to Cart</button>
        </div>

        <div class="product" data-category="electronics">
            <div class="product-image">⌚</div>
            <h3>Smart Watch</h3>
            <p>Style meets technology</p>
            <div class="price">৳ 1,850</div>
            <button class="cart-btn" type="button">Add to Cart</button>
        </div>

        <div class="product" data-category="fashion">
            <div class="product-image">🎒</div>
            <h3>Everyday Backpack</h3>
            <p>Carry your essentials</p>
            <div class="price">৳ 950</div>
            <button class="cart-btn" type="button">Add to Cart</button>
        </div>

        <div class="product" data-category="fashion">
            <div class="product-image">👟</div>
            <h3>Casual Sneakers</h3>
            <p>Comfort for every day</p>
            <div class="price">৳ 1,450</div>
            <button class="cart-btn" type="button">Add to Cart</button>
        </div>

    </div>

    <p id="noResults">No products found. Try another search or category.</p>
</section>

<footer>
    <div class="logo">MINIMALIST.</div>
    <p>Less, but better.</p>
    <p>© 2026 Minimalist. All rights reserved.</p>
</footer>

<script>
    let cartCount = 0;
    let activeCategory = 'all';

    const searchInput = document.getElementById('productSearch');
    const productCards = document.querySelectorAll('.product');
    const categoryButtons = document.querySelectorAll('.category');
    const noResults = document.getElementById('noResults');

    function updateProducts() {
        const searchText = searchInput.value.trim().toLowerCase();
        let visibleCount = 0;

        productCards.forEach(function (product) {
            const name = product.querySelector('h3').textContent.toLowerCase();
            const description = product.querySelector('p').textContent.toLowerCase();
            const category = product.dataset.category;

            const matchesSearch =
                name.includes(searchText) ||
                description.includes(searchText);

            const matchesCategory =
                activeCategory === 'all' ||
                category === activeCategory;

            const show = matchesSearch && matchesCategory;

            product.style.display = show ? '' : 'none';

            if (show) {
                visibleCount++;
            }
        });

        noResults.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    searchInput.addEventListener('input', updateProducts);

    categoryButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            activeCategory = this.dataset.filter;

            categoryButtons.forEach(function (item) {
                item.classList.remove('active');
            });

            this.classList.add('active');
            updateProducts();
        });
    });

    document.querySelectorAll('.cart-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            cartCount++;
            document.getElementById('cartCount').textContent = cartCount;
            this.textContent = 'Added ✓';

            const currentButton = this;

            setTimeout(function () {
                currentButton.textContent = 'Add to Cart';
            }, 1000);
        });
    });
</script>

</body>
</html>
