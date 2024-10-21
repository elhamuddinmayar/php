<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FizzBuzz Prime Checker</title>
</head>
<body>
    <h1>FizzBuzz and Prime Checker</h1>
    <form action="q5.php" method="post">
        <label for="number">Enter a number:</label><br>
        <input type="number" id="number" name="number" required><br><br>
        <input type="submit" value="Check Number">
    </form>
</body>
</html>
<?php

function isPrime($num) {
    if ($num <= 1) return false; // 0 and 1 are not prime numbers
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i === 0) {
            return false; // Found a divisor, not prime
        }
    }
    return true; // No divisors found, it is prime
}

function fizzBuzz($number) {
    if (isPrime($number)) {
        return "Prime";
    } else {
        if ($number % 3 === 0 && $number % 5 === 0) {
            return "FizzBuzz";
        } elseif ($number % 3 === 0) {
            return "Fizz";
        } elseif ($number % 5 === 0) {
            return "Buzz";
        } else {
            return $number; // Return the number itself if it doesn't match any condition
        }
    }
}

// Process the input data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['number'])) {
    $number = (int)$_POST['number'];
    $result = fizzBuzz($number);
    echo "<h1>Result</h1>";
    echo "<p>Input Number: " . htmlspecialchars($number) . "</p>";
    echo "<p>Output: " . htmlspecialchars($result) . "</p>";
    echo '<a href="index.html">Go Back</a>';
} else {
    echo "Invalid request.";
}
?>
