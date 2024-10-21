<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci Sequence Generator</title>
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
    <h1>Fibonacci Sequence Generator</h1>
    <form action="13.php" method="post">
        <label for="limit">Enter the limit:</label>
        <input type="number" id="limit" name="limit" required min="0">
        <button type="submit">Generate Fibonacci</button>
    </form>
</body>
</html>
<?php

function generateFibonacci($limit) {
    $fibonacci = [];
    
    // Starting values
    $a = 0;
    $b = 1;

    // Generate Fibonacci sequence using a while loop
    while ($a <= $limit) {
        $fibonacci[] = $a;
        $temp = $a;
        $a = $b;
        $b = $temp + $b;
    }

    return $fibonacci;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $limit = intval($_POST['limit']);
    
    if ($limit >= 0) {
        $fibonacciSequence = generateFibonacci($limit);
        echo "<h2>Fibonacci Sequence up to $limit:</h2>";
        echo implode(", ", $fibonacciSequence);
    } else {
        echo "<h2>Error: Please enter a non-negative integer.</h2>";
    }
} else {
    echo "<h2>Error: Invalid request method.</h2>";
}
?>
