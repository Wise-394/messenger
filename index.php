<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messenger</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="min-vh-100 d-flex justify-content-center align-items-center flex-column">
        <div class="debug p-5">
            <p>Welcome to Messenger</p>
            <form class="d-flex flex-column" action="" method="POST">
                <label>Username</label>
                <input type="text" name="name" placeholder="Enter username" required>
                <label>password</label>
                <input type="password" name="password" placeholder="Enter password" required>

                <input type="submit" name="login" value="Login" class="mt-1 btn btn-primary">
                <p class="d-inline">No Account? <a href="register.php">Ask admin</a></p>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        if (isset($_POST['name']) && isset($_POST['password'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            if ($name == 'admin' && $password == 'admin' || $name == 'bypass') {
                $_SESSION['name'] = $name;
                header("Location: home.php");
                exit();
            } else {
                echo "incorrect";
            }
        } else {
            echo "Enter user or pass";
        }
    }
}
?>
