<?php

$name = $_POST["name"];
$age = $_POST["age"];
if (!is_string($name) || empty(trim($name))) {
    echo "Invalid name.";
    exit;
}

if (strlen($name) > 50) {
    echo "Name must not exceed 50 characters.";
    exit;
}

if (!is_numeric($age)) {
    echo "Age must be a number.";
    exit;
}

if ($age < 0 || $age > 120) {
    echo "Invalid age.";
    exit;
}

echo "Data is valid and ready to be inserted into the database.";

?>