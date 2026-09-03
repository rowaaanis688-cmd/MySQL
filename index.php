<!DOCTYPE html>
<html>
<head>
    <title>MySQL Website</title>

    <style>
        * {
            margin: 0;
            font-family: Arial;
            background-color:#f8a9eb;
        }

        nav {
            height: 60px;
            background-color: #efafe4;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
        }

        .logo {
            color: white;
            font-size: 30px;
            font-weight: bold;
        }

        .links a {
            color:white;
            font-weight: 500px;
            margin-left: 20px;
        }
         .links a:hover{
            color:black;
            background-color: #ed1bca;
         }
        .header {
            height: 650px;
            background-image: url("mtsql.jpg");
            background-size: cover;
            background-position: center;
            background-repeat:no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header h1 {
            color: white;
            margin-bottom: 30px; 
            font-size: 60px;
        }
    </style>
</head>

<body>

    <nav>

        <div class="logo">
            MySQL Website
        </div>

        <div class="links">
            <a href="customer_up_2000.php">Customers</a>
            <a href="emp&manager.php">Employees & Manager</a>
            <a href="customer.php">Customer ID</a>
            <a href="customer_orders.php">Orders</a>
            <a href="best_products.php">Best Products</a>
            <a href="city_richest.php">The Richest</a>
            <a href="customercity.php">Customer_City</a>
            <a href="product_details.php">Product_Details</a>
            <a href="product_quantity.php">Product_Quantity</a>
            <a href="search_customer.php">Search_Customer</a>

        </div>

    </nav>
    <div class="header">
        <h1>Welcome to MySQL</h1>
    </div>
</body>
</html>