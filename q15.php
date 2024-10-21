
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Price Sorter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 5px 0;
        }
        input[type="text"], input[type="number"] {
            width: 200px;
        }
        button {
            padding: 5px 10px;
        }
        h2 {
            color: #2c3e50;
        }
    </style>
</head>
<body>
    <h1>Product Price Sorter</h1>
    <form action="sort_products.php" method="post">
        <label for="product1">Product Name:</label>
        <input type="text" id="product1" name="products[]" required>
        
        <label for="price1">Price:</label>
        <input type="number" step="0.01" id="price1" name="prices[]" required>

        <label for="product2">Product Name:</label>
        <input type="text" id="product2" name="products[]" required>

        <label for="price2">Price:</label>
        <input type="number" step="0.01" id="price2" name="prices[]" required>

        <button type="submit">Sort Products</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get product names and prices from the form
        $products = array_combine($_POST['products'], $_POST['prices']);

        // Sort products by price
        $sortedProducts = sortProductsByPrice($products);

        // Output the sorted products
        echo "<h2>Products Sorted by Price (Highest to Lowest):</h2>";
        echo "<ul>";
        foreach ($sortedProducts as $product => $price) {
            echo "<li>$product: $" . number_format($price, 2) . "</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>

<?php

// Sample associative array of products and their prices
$products = [
    "Apple" => 1.50,
    "Banana" => 0.75,
    "Orange" => 1.00,
    "Mango" => 1.25,
    "Grapes" => 2.00,
];

// Function to sort products by price
function sortProductsByPrice($products) {
    // Sort the array by value (price) in descending order while maintaining key associations
    arsort($products);
    return $products;
}

// Sort the products
$sortedProducts = sortProductsByPrice($products);

// Output the sorted products
echo "<h2>Products Sorted by Price (Highest to Lowest):</h2>";
echo "<ul>";
foreach ($sortedProducts as $product => $price) {
    echo "<li>$product: $" . number_format($price, 2) . "</li>";
}
echo "</ul>";
?>
