<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pattern Generator</title>
</head>
<body>
    <h1>Pattern Generator</h1>
    <form action="11.php" method="post">
        <label for="size">Enter size of the pattern:</label>
        <input type="number" id="size" name="size" required min="1">
        <button type="submit">Generate Pattern</button>
    </form>
</body>
</html>
<?php

function printPattern($size) {
    for ($i = 1; $i <= $size; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo "* ";
        }
        echo "<br>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $size = intval($_POST['size']);
    if ($size > 0) {
        echo "<h2>Pattern of size $size:</h2>";
        printPattern($size);
    } else {
        echo "<h2>Error: Please enter a positive integer.</h2>";
    }
} else {
    echo "<h2>Error: Invalid request method.</h2>";
}
?>
