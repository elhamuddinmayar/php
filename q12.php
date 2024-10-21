<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Number Sum Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            margin-right: 10px;
        }
        input[type="number"] {
            width: 60px;
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
    <h1>Random Number Sum Calculator</h1>
    <form action="12.php" method="post">
        <label for="size">Enter the number of random integers to generate:</label>
        <input type="number" id="size" name="size" required min="1">
        <button type="submit">Generate and Calculate</button>
    </form>

    <?php if (isset($_GET['result'])): ?>
        <h2>Result: <?php echo htmlspecialchars($_GET['result']); ?></h2>
    <?php endif; ?>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the size from the user input
    $size = intval($_POST['size']);

    // Generate an array of random integers between 1 and 100
    $randomNumbers = [];
    for ($i = 0; $i < $size; $i++) {
        $randomNumbers[] = rand(1, 100);
    }

    // Calculate the sum, skipping every second number
    $sum = 0;
    for ($i = 0; $i < $size; $i++) {
        // Skip every second number
        if ($i % 2 != 0) {
            continue;
        }
        $sum += $randomNumbers[$i];
    }

    // Output the result
    echo "<h2>Generated Numbers:</h2>";
    echo implode(", ", $randomNumbers) . "<br>";
    echo "<h2>Sum of numbers (skipping every second): $sum</h2>";
} else {
    echo "<h2>Error: Invalid request method.</h2>";
}
?>
