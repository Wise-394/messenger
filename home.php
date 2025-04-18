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
    <div class="d-flex flex-row min-vh-100 justify-content-center">
        <div class="debug col-lg-4 min-vh-100">
        <a class = "m-1 btn btn-primary" href = "logout.php">Logout</a>
        <?php
            session_start();
            if (isset($_SESSION['name']) && $_SESSION['name'] === 'admin') {
                echo '<a class="m-1 btn btn-primary" href="register.php">Register</a>';
            }
            ?>
        </div>
        <div class="debug col-lg-4 min-vh-100">

        </div>
        <div class="debug col-lg-4 min-vh-100">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu"
        crossorigin="anonymous"></script>
</body>

</html>