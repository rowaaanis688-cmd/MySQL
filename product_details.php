<?php
require "dbc.php";
session_start();
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $query1 = "SELECT
                (SELECT SUM(quantity)
                 FROM order_products
                 WHERE product_id = '$product_id') AS times_sold";

    $result1 = mysqli_query($connection, $query1);

    $row1 = mysqli_fetch_assoc($result1);

    $query2 = "SELECT order_id
             FROM order_products
             WHERE product_id = '$product_id'";

    $result2 = mysqli_query($connection, $query2);
    $query3 = "SELECT DISTINCT customers.name,
                    customers.salary
             FROM customers
             JOIN orders
             ON customers.customer_id = orders.customer_id
             JOIN order_products
             ON orders.order_id = order_products.order_id
             WHERE order_products.product_id= '$product_id'
             ORDER BY customers.salary DESC";

    $result3 = mysqli_query($connection, $query3);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Information</title>
    <style>

         {
            font-family: Arial;
            background-color: #f3e8ff;
            padding: 40px;
        }

        .container {
            width: 550px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
        }

        h2 {
            text-align: center;
            color: #e520aa;
        }

        form {
            text-align: center;
        }

        input {
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #e00db9;
            color: white;
            border: none;
            padding: 10px 20px;
        }

        .box {
            margin-top: 20px;
            padding: 15px;
            background-color: #f5f5f5;
            border-radius: 8px;
        }

    </style>

</head>

<body>

<div class="container">

    <h2>Product Information</h2>

    <form method="post">

        <input type="text"
               name="product_id"
               placeholder="Enter Product ID"
               required>

        <input type="submit" value="Submit">

    </form>


    <?php

    if (isset($result1)) {

        echo "<div class='box'>";

        echo "<b>Number of times sold:</b> ";
        echo $row1['times_sold'];
        echo "</div>";
        echo "<div class='box'>";
        echo "<b>Order Numbers:</b><br>";
        while ($row = mysqli_fetch_assoc($result2)) {

            echo $row['order_id'] . "<br>";

        }
        echo "</div>";
        echo "<div class='box'>";
        echo "<b>Customers:</b><br>";

        while ($row = mysqli_fetch_assoc($result3)) {

            echo $row['name'];
            echo " - ";
            echo $row['salary'];
            echo "<br>";

        }
        echo "</div>";
    }
    ?>
</div>
</body>
</html>