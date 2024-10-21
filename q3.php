<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sentence Reverser</title>
</head>
<body>
    <h1>Sentence Reverser</h1>
    <form action="q3.php" method="post">
        <label for="paragraph">Enter your paragraph:</label><br>
        <textarea id="paragraph" name="paragraph" rows="10" cols="50" required></textarea><br><br>
        <input type="submit" value="Reverse Sentences">
    </form>
</body>
</html>
<?php

function reverseWordsInSentences($paragraph) {
    $sentences = preg_split('/(?<=[.!?])\s+/', $paragraph);
    $reversedSentences = [];
    
    foreach ($sentences as $sentence) {
        $words = explode(' ', $sentence);
        $reversedWords = array_reverse($words);
        $reversedSentence = implode(' ', $reversedWords);
        $reversedSentences[] = $reversedSentence;
    }
    
    return implode(' ', $reversedSentences);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['paragraph'])) {
    $inputParagraph = trim($_POST['paragraph']);
    $result = reverseWordsInSentences($inputParagraph);
    echo "<h1>Reversed Sentences</h1>";
    echo "<p>" . htmlspecialchars($result) . "</p>";
    echo '<a href="index.html">Go Back</a>';
} else {
    echo "Invalid request.";
}
?>
