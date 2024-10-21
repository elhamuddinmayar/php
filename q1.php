<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Handler Form</title>
</head>
<body>
    <h1>Input Handler Q1</h1>
    <form action="q1.php" method="post">
        <label for="input1">Enter the first value:</label>
        <input type="text" id="input1" name="input1" required><br><br>

        <label for="input2">Enter the second value:</label>
        <input type="text" id="input2" name="input2" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php

function handleInput($input1, $input2) {
    if (is_numeric($input1) && is_numeric($input2)) {
        $result = $input1 * $input2;
        return "Result of multiplication: " . $result;
    } 
    elseif (is_string($input1) && is_string($input2)) {
        $sorted = [$input1, $input2];
        sort($sorted);
        return "Sorted strings: " . implode(", ", $sorted);
    } 
    else {
        $result = (string)$input1 . (string)$input2;
        return "Concatenated result: " . $result;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input1 = $_POST['input1'];
    $input2 = $_POST['input2'];

    echo handleInput($input1, $input2);
} else {
    echo "Erro happen bro !!!.";
}
?>

