<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integer Equality Checker</title>
</head>
<body>
    <h1>Check if Two Integers are Equal</h1>
    <form action="q6.php" method="post">
        <label for="num1">Enter first integer:</label>
        <input type="number" id="num1" name="num1" required><br><br>
        
        <label for="num2">Enter second integer:</label>
        <input type="number" id="num2" name="num2" required><br><br>
        
        <input type="submit" value="Check Equality">
    </form>
</body>
</html>
<?php

function areEqual($a, $b) {
    return ($a ^ $b) === 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = intval($_POST['num1']);
    $num2 = intval($_POST['num2']);

    if (areEqual($num1, $num2)) {
        echo "$num1 and $num2 are equal.";
    } else {
        echo "$num1 and $num2 are not equal.";
    }
} else {
    echo "Invalid request.";
}
?>
