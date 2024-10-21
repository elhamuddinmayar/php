<?php
$isPalindrome = false; // Initialize result variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input string from the form
    $inputString = $_POST['inputString'];

    // Function to check if a string is a palindrome
    function isPalindrome($str) {
        // Normalize the string by removing non-alphanumeric characters and converting to lowercase
        $str = preg_replace("/[^A-Za-z0-9]/", '', $str);
        $str = strtolower($str);

        // Base case: If the string is empty or has one character, it is a palindrome
        if (strlen($str) <= 1) {
            return true;
        }

        // Check the first and last characters
        if ($str[0] !== $str[-1]) {
            return false; // Not a palindrome
        }

        // Recursively check the substring without the first and last characters
        return isPalindrome(substr($str, 1, -1));
    }

    // Check if the input string is a palindrome
    $isPalindrome = isPalindrome($inputString);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrome Checker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        input[type="text"] {
            width: 300px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Palindrome Checker</h1>
    <form method="post" action="">
        <label for="inputString">Enter a String:</label><br>
        <input type="text" id="inputString" name="inputString" required><br>
        <button type="submit">Check</button>
    </form>

    <?php if (isset($inputString)): ?>
        <h2>Result:</h2>
        <p>"<?= htmlspecialchars($inputString) ?>" is <?= $isPalindrome ? 'a palindrome.' : 'not a palindrome.' ?></p>
    <?php endif; ?>
</body>
</html>
