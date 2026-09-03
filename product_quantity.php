<?php
require "dbc.php";
session_start();
if (isset($_POST['number'])) {
    $number = $_POST['number'];
    $query = "SELECT products.product_name, SUM(order_products.quantity) AS total
            FROM products
            JOIN order_products
            ON products.product_id = order_products.product_id
            GROUP BY products.product_id, products.product_name
            HAVING SUM(order_products.quantity) > $number";
    $result = mysqli_query($connection, $query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <style>

        *{
            font-family: Arial;
            background-color: #f2d7ed;
            padding: 50px;
        }
         .all {
            width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 15px;
        }

        h2 {
            text-align: center;
            color: #d50da7;
        }

        input {
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #f040c4;
            color: white;
            border: none;
            padding: 10px 20px;
        }

        .product {
            margin-top: 15px;
            padding: 15px;
            background-color: #f2cae7;
            border-radius: 8px;
        }

    </style>
</head>
<body>
<div class="all">
    <h2>Products</h2>
    <form method="post">
        <input type="number" name="number"
               min="1000" max="5000"
               placeholder="Enter number"
               required>
        <input type="submit" value="Submit">
    </form>
    <?php
    if (isset($result)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='product'>";
                echo $row['product_name'];
                echo "</div>";
            }

        } else {
            echo "<p>No products found.</p>";
        }
    }

    ?>

</div>

</body>

</html>