<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DailyNeeds | All Products</title>
    <style>
        /* Simplified Styling */
        body {
            margin: 0;
            font-family: sans-serif;
            background: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar */
        nav {
            background: #fff;
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .logo { font-size: 24px; font-weight: bold; color: #27ae60; text-decoration: none; }
        
        .nav-links { list-style: none; display: flex; gap: 20px; }
        
        .nav-links a { text-decoration: none; color: #333; font-weight: 600; }

        /* Search Area */
        .search-box {
            background: #27ae60;
            padding: 30px;
            text-align: center;
        }

        #productSearch {
            padding: 12px;
            width: 80%;
            max-width: 500px;
            border-radius: 25px;
            border: none;
            font-size: 16px;
        }

        /* Product Grid */
        .content {
            padding: 20px 5%;
            flex: 1;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        /* Placeholder for images to ensure they show up */
        .img-placeholder {
            width: 100%;
            height: 150px;
            background: #eee;
            margin-bottom: 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #999;
        }

        .price { color: #27ae60; font-weight: bold; display: block; margin: 10px 0; }

        .btn {
            background: #27ae60;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <nav>
        <a href="index.html" class="logo">DailyNeeds</a>
        <div class="nav-links">
            <a href="products.html">Products</a>
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </nav>

    <div class="search-box">
        <input type="text" id="productSearch" placeholder="Search products..." onkeyup="filterProducts()">
    </div>

    <div class="content">
        <div class="product-grid" id="productGrid">
            
            <div class="card" data-name="orange fruit">
                <div class="img-placeholder">Orange</div>
                <h3>Organic Oranges</h3>
                <span class="price">$4.00</span>
                <button class="btn">Add to Cart</button>
            </div>

            <div class="card" data-name="milk dairy">
                <div class="img-placeholder">Milk</div>
                <h3>Fresh Milk</h3>
                <span class="price">$3.00</span>
                <button class="btn">Add to Cart</button>
            </div>

            <div class="card" data-name="bread bakery">
                <div class="img-placeholder">Bread</div>
                <h3>Brown Bread</h3>
                <span class="price">$2.00</span>
                <button class="btn">Add to Cart</button>
            </div>

            
            <div class="card" data-name="apple fruit">
                <div class="img-placeholder">Apple</div>
                <h3>Red Apple</h3>
                <span class="price">$3.50</span>
                <button class="btn">Add to Cart</button>
            </div>
            <div class="card" data-name="apple fruit">
                <div class="img-placeholder">Apple</div>
                <h3>Red Apple</h3>
                <span class="price">$3.50</span>
                <button class="btn">Add to Cart</button>
            </div>
            <div class="card" data-name="apple fruit">
                <div class="img-placeholder">Apple</div>
                <h3>Red Apple</h3>
                <span class="price">$3.50</span>
                <button class="btn">Add to Cart</button>
            </div>
            <div class="card" data-name="apple fruit">
                <div class="img-placeholder">Apple</div>
                <h3>Red Apple</h3>
                <span class="price">$3.50</span>
                <button class="btn">Add to Cart</button>
            </div>
            <div class="card" data-name="apple fruit">
                <div class="img-placeholder">Apple</div>
                <h3>Red Apple</h3>
                <span class="price">$3.50</span>
                <button class="btn">Add to Cart</button>
            </div>
            <div class="card" data-name="apple fruit">
                <div class="img-placeholder">Apple</div>
                <h3>Red Apple</h3>
                <span class="price">$3.50</span>
                <button class="btn">Add to Cart</button>
            </div>
            <div class="card" data-name="apple fruit">
                <div class="img-placeholder">Apple</div>
                <h3>Red Apple</h3>
                <span class="price">$3.50</span>
                <button class="btn">Add to Cart</button>
            </div>
            <div class="card" data-name="apple fruit">
                <div class="img-placeholder">Apple</div>
                <h3>Red Apple</h3>
                <span class="price">$3.50</span>
                <button class="btn">Add to Cart</button>
            </div>
            
        </div>
    </div>

    <footer>
        &copy; 2026 DailyNeeds Store
    </footer>

    <script>
        function filterProducts() {
            let input = document.getElementById('productSearch').value.toLowerCase();
            let cards = document.getElementsByClassName('card');

            for (let i = 0; i < cards.length; i++) {
                let name = cards[i].getAttribute('data-name');
                if (name.includes(input)) {
                    cards[i].style.display = "";
                } else {
                    cards[i].style.display = "none";
                }
            }
        }
    </script>

</body>
</html>