<?php
// Enforce JSON/HTML partial response via POST only
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP/1.1 403 Forbidden');
    echo '<div class="alert error">Invalid request method.</div>';
    exit;
}

// 1. Data Sanitization & Extraction
$rawNumbers  = isset($_POST['numbers']) ? trim($_POST['numbers']) : '';
$rangeStart  = isset($_POST['rangeStart']) ? filter_var($_POST['rangeStart'], FILTER_VALIDATE_INT) : false;
$rangeEnd    = isset($_POST['rangeEnd']) ? filter_var($_POST['rangeEnd'], FILTER_VALIDATE_INT) : false;

$errors = [];

// 2. Rigid Server-Side Validation
if (empty($rawNumbers)) {
    $errors[] = "Target numbers field cannot be empty.";
} else {
    // Parse comma-separated list and convert to clean integer array
    $numbersArray = array_filter(array_map('intval', explode(',', $rawNumbers)));
    if (empty($numbersArray)) {
        $errors[] = "Please provide at least one valid target number.";
    }
}

if ($rangeStart === false || $rangeStart < 1) {
    $errors[] = "Start range must be a positive integer greater than 0.";
}
if ($rangeEnd === false || $rangeEnd > 100) {
    $errors[] = "End range cannot exceed 100 for performance limits.";
}
if ($rangeStart > $rangeEnd) {
    $errors[] = "Start range cannot be greater than the end range.";
}

// Fallback error renderer
if (!empty($errors)) {
    header('HTTP/1.1 422 Unprocessable Entity');
    echo '<div class="alert-box error">';
    foreach ($errors as $error) {
        echo '<p>⚠️ ' . htmlspecialchars($error) . '</p>';
    }
    echo '</div>';
    exit;
}

// 3. Execution & Core Output Generation
foreach ($numbersArray as $num) {
    $num = htmlspecialchars($num); // Prevent any potential XSS reflections
    echo '<div class="matrix-table-container">';
    echo '<h3>Multiplication Table of ' . $num . '</h3>';
    echo '<table class="matrix-table">';
    echo '<thead><tr><th>Expression</th><th>Result</th></tr></thead>';
    echo '<tbody>';
    
    for ($i = $rangeStart; $i <= $rangeEnd; $i++) {
        $result = $num * $i;
        echo '<tr>';
        echo '<td>' . $num . ' &times; ' . $i . '</td>';
        echo '<td>' . $result . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}