<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Number Finder</title>
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
    <h1>Prime Number Finder</h1>
    <form action="14.php" method="post">
        <label for="limit">Enter the limit:</label>
        <input type="number" id="limit" name="limit" required min="1">
        <button type="submit">Find Primes</button>
    </form>
</body>
</html>

<?php

function isPrime($num) {
    if ($num <= 1) return false; // 0 and 1 are not prime numbers
    if ($num <= 3) return true;  // 2 and 3 are prime numbers

    // Check for factors up to the square root of the number
    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i == 0) {
            return false; // Not a prime number
        }
    }
    return true; // It's a prime number
}

function getPrimesUpTo($limit) {
    $primes = [];
    for ($num = 2; $num <= $limit; $num++) {
        if (isPrime($num)) {
            $primes[] = $num;
        }
    }
    return $primes;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $limit = intval($_POST['limit']);
    
    if ($limit >= 1) {
        $primeNumbers = getPrimesUpTo($limit);
        echo "<h2>Prime Numbers up to $limit:</h2>";
        echo implode(", ", $primeNumbers);
    } else {
        echo "<h2>Error: Please enter a positive integer greater than 0.</h2>";
    }
} else {
    echo "<h2>Error: Invalid request method.</h2>";
}
?>
