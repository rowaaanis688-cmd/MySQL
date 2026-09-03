<?php
require "dbc.php";
session_start();

$query = "SELECT products.product_name, 
                 SUM(order_products.quantity) AS total_sold, 
                 SUM(order_products.quantity * products.price) AS total_revenue
          FROM products
          JOIN order_products ON 
          products.product_id = order_products.product_id
          GROUP BY products.product_id, products.product_name
          ORDER BY total_sold DESC";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>best Selling Products</title>
    <style>
        *{
            font-family: Arial, sans-serif;
            background-color: #d8a4d4;
            padding: 30px;
            text-align: center;
        }
        h1 {
            color: #df2d9b;
            margin-bottom: 20px;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border:5px solid white;
            background: white;
            border-radius: 8px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid white;
        }
        th {
            background-color: #c025a1;
            color: white;
        }
    </style>
</head>
<body>
    <h1>best Selling Products</h1>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity Sold</th>
                <th>Total Revenue</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['total_sold'] . "</td>";
                echo "<td>" . $row['total_revenue'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>