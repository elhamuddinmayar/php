<?php
function fibonacci($n, &$memo = []) {
    // Check if the result is already in the memo array
    if (isset($memo[$n])) {
        return $memo[$n];
    }

    // Base cases
    if ($n <= 0) {
        return 0;
    } elseif ($n == 1) {
        return 1;
    }

    // Recursive case with memoization
    $memo[$n] = fibonacci($n - 1, $memo) + fibonacci($n - 2, $memo);
    return $memo[$n];
}

// Initialize result
$result = null;

// Check if a number has been submitted
if (isset($_GET['number'])) {
    $n = intval($_GET['number']);
    $result = fibonacci($n);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        input[type="number"] {
            width: 100px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Fibonacci Calculator</h1>
    <form method="get" action="">
        <label for="number">Enter n:</label><br>
        <input type="number" id="number" name="number" min="0" required><br>
        <button type="submit">Calculate Fibonacci</button>
    </form>

    <?php if ($result !== null): ?>
        <h2>Result:</h2>
        <p>The Fibonacci number at position <?= htmlspecialchars($n) ?> is <?= htmlspecialchars($result) ?>.</p>
    <?php endif; ?>
</body>
</html>
