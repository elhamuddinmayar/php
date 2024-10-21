<?php
function createMathFunction($operation) {
    // Define the dynamic function based on the operation
    switch (strtolower($operation)) {
        case 'add':
            return function($a, $b) {
                return $a + $b;
            };
        case 'subtract':
            return function($a, $b) {
                return $a - $b;
            };
        case 'multiply':
            return function($a, $b) {
                return $a * $b;
            };
        case 'divide':
            return function($a, $b) {
                if ($b == 0) {
                    return "Cannot divide by zero.";
                }
                return $a / $b;
            };
        default:
            return null; // Return null for unsupported operations
    }
}

$result = ""; // Initialize result variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $operation = $_POST['operation'];
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    // Create the dynamic function based on the operation
    $mathFunction = createMathFunction($operation);

    // Invoke the dynamic function if it was created successfully
    if ($mathFunction) {
        $result = $mathFunction($num1, $num2);
    } else {
        $result = "Invalid operation.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Math Function</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        input[type="text"] {
            width: 100px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Dynamic Math Function</h1>
    <form method="post" action="">
        <label for="operation">Operation (add, subtract, multiply, divide):</label><br>
        <input type="text" id="operation" name="operation" required><br>

        <label for="num1">Number 1:</label><br>
        <input type="text" id="num1" name="num1" required><br>

        <label for="num2">Number 2:</label><br>
        <input type="text" id="num2" name="num2" required><br>

        <button type="submit">Calculate</button>
    </form>

    <?php if ($result !== ""): ?>
        <h2>Result:</h2>
        <p><?= htmlspecialchars($result) ?></p>
    <?php endif; ?>
</body>
</html>
