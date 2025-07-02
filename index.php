<!DOCTYPE html>
<html>
<head>
    <title>Food Ordering</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Food Menu</h1>
    <div id="menu-container">
        <?php include 'db.php'; 
        $result = $conn->query("SELECT * FROM menu");
        while ($row = $result->fetch_assoc()) {
            echo "<div class='item'>
                    <img src='images/{$row['image']}' alt='{$row['name']}' />
                    <h2>{$row['name']}</h2>
                    <p>\${$row['price']}</p>
                    <button onclick='addToCart(\"{$row['name']}\", {$row['price']})'>Add to Cart</button>
                  </div>";
        }
        ?>
    </div>

    <h2>Cart</h2>
    <ul id="cart-list"></ul>
    <div style="text-align:center; font-size: 20px; margin: 20px 0;">
    <strong>Total: $</strong><span id="total" style="color:#e67e22; font-weight: bold;">0.00</span>
</div>
    <form action="order.php" method="POST" onsubmit="return submitOrder()">
        <input type="hidden" name="orderData" id="orderData">
        <button type="submit">Submit Order</button>
    </form>

    <script src="script.js"></script>
</body>
</html>
