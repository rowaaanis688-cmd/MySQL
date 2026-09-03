<?php
session_start();
require "dbc.php";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $password = trim($_POST["password"]);
    if ($name == "" || $password == "") {
        $error = "Please enter name and password.";
    } else {

        $query = "SELECT * FROM customers 
                WHERE name = '$name' AND password = '$password'";

        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) == 1) {

            $_SESSION["logged_in"] = true;
            $_SESSION["name"] = $name;

            header("Location: index.php");
            exit();

        } else {
            $error = "Wrong name or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>
       * {
            background-color: #f1bcea;
            font-family: Arial;
            text-align: center;
        }

        form {
            background-color: white;
            width: 300px;
            margin: 100px auto;
            padding: 30px;
            border-radius: 10px;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 10px;
        }

        button {
            background-color: #e327bd;
            color: white;
            border: none;
            padding: 10px 30px;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

<form method="POST">

    <h1>Login</h1>
    <input type="text" name="name" placeholder="Customer Name">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>

    <?php
    if ($error != "") {
        echo "<p class='error'>$error</p>";
    }
    ?>

</form>

</body>
</html>