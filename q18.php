<?php
$reversedWords = []; // Initialize the result array

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values from the form
    $wordsInput = $_POST['words'];

    // Convert the input string to an array of words
    $wordsArray = array_map('trim', explode(',', $wordsInput));

    // Function to filter out words containing vowels
    function filterWordsWithVowels($words) {
        return array_filter($words, function($word) {
            return !preg_match('/[aeiouAEIOU]/', $word);
        });
    }

    // Function to reverse each word in the array
    function reverseWords($words) {
        return array_map('strrev', $words);
    }

    // Step 1: Filter words with vowels
    $filteredWords = filterWordsWithVowels($wordsArray);

    // Step 2: Reverse the filtered words
    $reversedWords = reverseWords($filteredWords);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Filter and Reverser</title>
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
    <h1>Filter and Reverse Words</h1>
    <form method="post" action="">
        <label for="words">Enter Words (comma-separated):</label><br>
        <input type="text" id="words" name="words" required><br>
        <button type="submit">Process Words</button>
    </form>

    <?php if (!empty($reversedWords)): ?>
        <h2>Reversed Words (without vowels):</h2>
        <p><?= implode(', ', $reversedWords) ?></p>
    <?php endif; ?>
</body>
</html>
