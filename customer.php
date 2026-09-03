<?php
require "dbc.php";
session_start();
if (isset($_POST['customer_id'])) {
    $customer_id = $_POST['customer_id'];
    $query = "SELECT * FROM customers WHERE customer_id = $customer_id";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $customer = mysqli_fetch_assoc($result);
    } else {
        echo "Customer doesn't exist";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Customer</title>
    <style>
        *{
            text-align:center;
            font-family: Arial, sans-serif;
            background-color: #e19ad9;
            padding: 30px;
        }
        h1, h2 {
            color: #b41b90;
        }
        form {
            margin-bottom: 20px;
        }
        button {
            padding: 8px 16px;
            background-color: #c51389;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 15px;
        }
    </style>
</head>
<body>

<h1>Search Customer</h1>
<form method="POST">
    <input
        type="number"
        name="customer_id"
        placeholder="Enter Customer ID"
        required
    >
    <button type="submit">Search</button>
</form>
<?php
if (isset($customer)) {
    echo "<h2>Customer Information</h2>";
    echo "ID: " . $customer['customer_id'] . "<br>";
    echo "Name: " . $customer['name'] . "<br>";
    echo "City: " . $customer['city'] . "<br>";
    echo "Salary: " . $customer['salary'] . "<br>";
}
?>
</body>
</html>