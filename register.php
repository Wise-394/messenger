<!DOCTYPE html>
<html lang="en">
<?php
include './php_functions/database.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messenger</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
</head>

<body>
    <div class = "min-vh-100 d-flex flex-row justify-content-center align-items-center">
        <div class = "debug">
                <a href ="home.php">Go back to home</a>
            <form class = "d-flex flex-column" method = "POST" action = "">
                <label>Username</label>
                <input type = "text" name = "name" placeholder = "Enter username" required>

                <label>Password</label>
                <input type = "password" name = "password" placeholder = "Enter password" required>
                <input type = "submit" name = "register" value = "Register" class = "btn btn-primary">
            </form>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
</body>
</html>
<?php

session_start();
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        if (isset($_POST['name']) && isset($_POST['password'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];


            $check_sql = "SELECT * FROM users WHERE name = '$name'";
            $check_result = $conn->query($check_sql);

            if ($check_result && $check_result->num_rows > 0) {

                echo "Username already taken. Please choose another.";
            } else {
                $sql = "INSERT INTO users(name, password) VALUES('$name', '$password')";
                if ($conn->query($sql) === TRUE) {
                    echo "Registration successful!";
                } else {
                    echo "Error: " . $conn->error;
                }
            }
        } else {
            echo "Please enter both username and password.";
        }
    }
}

$conn->close();
?>
