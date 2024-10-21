<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>
    <h1>Simple Calculator</h1>
    <form action="q10.php" method="post">
        <label for="input">Enter calculation (e.g., "5 + 2"):</label>
        <input type="text" id="input" name="input" required>
        <button type="submit">Calculate</button>
    </form>

    <?php if (isset($_GET['result'])): ?>
        <h2>Result: <?php echo htmlspecialchars($_GET['result']); ?></h2>
    <?php endif; ?>
</body>
</html>
<?php

function calculate($input) {
    if (preg_match('/^\s*(\d+)\s*([\+\-\*\/])\s*(\d+)\s*$/', $input, $matches)) {
        $num1 = (float)$matches[1];
        $operator = $matches[2];
        $num2 = (float)$matches[3];

        switch ($operator) {
            case '+':
                return $num1 + $num2;
            case '-':
                return $num1 - $num2;
            case '*':
                return $num1 * $num2;
            case '/':
                if ($num2 == 0) {
                    return "Error: Division by zero.";
                }
                return $num1 / $num2;
            default:
                return "Error: Unsupported operation.";
        }
    } else {
        return "Error: Invalid input format.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST['input'];
    $result = calculate($input);
    header("Location: index.html?result=" . urlencode($result));
    exit();
}
?>
