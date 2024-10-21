<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boolean Condition Evaluator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        input[type="checkbox"] {
            margin-right: 10px;
        }
        .condition {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h1>Boolean Condition Evaluator</h1>
<form action="q7.php" method="POST">
    <div id="conditions">
        <div class="condition">
            <label>
                <input type="checkbox" name="conditions[]" value="true"> Condition 1 (True)
            </label>
            <label>
                <input type="checkbox" name="conditions[]" value="false"> Condition 1 (False)
            </label>
        </div>
        <div class="condition">
            <label>
                <input type="checkbox" name="conditions[]" value="true"> Condition 2 (True)
            </label>
            <label>
                <input type="checkbox" name="conditions[]" value="false"> Condition 2 (False)
            </label>
        </div>
    </div>
    <div>
        <label for="operation">Select Logical Operation:</label>
        <select name="operation" id="operation">
            <option value="AND">AND</option>
            <option value="OR">OR</option>
        </select>
    </div>
    <button type="button" onclick="addCondition()">Add Condition</button>
    <br><br>
    <input type="submit" value="Evaluate">
</form>

<script>
function addCondition() {
    const conditionDiv = document.createElement('div');
    conditionDiv.className = 'condition';
    conditionDiv.innerHTML = `
        <label>
            <input type="checkbox" name="conditions[]" value="true"> Condition (True)
        </label>
        <label>
            <input type="checkbox" name="conditions[]" value="false"> Condition (False)
        </label>
    `;
    document.getElementById('conditions').appendChild(conditionDiv);
}
</script>

</body>
</html>
<?php

function evaluateConditions($conditions, $operation = 'AND') {
    $result = null;

    foreach ($conditions as $condition) {
        $value = filter_var($condition, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        
        if (is_null($result)) {
            $result = $value;
            continue;
        }

        if ($operation === 'AND') {
            $result = $result && $value;
        } elseif ($operation === 'OR') {
            $result = $result || $value;
        }
    }

    return $result;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conditions = $_POST['conditions'] ?? [];
    $operation = $_POST['operation'] ?? 'AND';
    
    $result = evaluateConditions($conditions, $operation);

    echo "Result of $operation operation: " . ($result ? 'true' : 'false');
}
?>
