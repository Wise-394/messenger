<?php
session_start();
include 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['message']) && !empty($_POST['message'])) {
        $message = $_POST['message'];
        $user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest';

        // Insert message into the database
        $sql = "INSERT INTO messages (user_name, message) VALUES ('$user_name', '$message')";
        $conn->query($sql);
    }
}

$sql = "SELECT * FROM messages ORDER BY timestamp DESC";
$result = $conn->query($sql);
$messages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messenger</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .chat-box {
            border: 1px solid #ccc;
            padding: 20px;
            max-height: 400px;
            overflow-y: scroll;
        }

        .message {
            margin-bottom: 15px;
        }

        .message .user {
            font-weight: bold;
        }

        .message .text {
            margin-top: 5px;
        }

        .chat-container {
            max-width: 600px;
            margin: 50px auto;
        }

        .input-container {
            display: flex;
            margin-top: 20px;
        }

        .input-container input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .input-container button {
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="chat-container">
        <div class="chat-box">
            <?php foreach (array_reverse($messages) as $msg) : ?>
                <div class="message">
                    <div class="user"><?php echo $msg['user_name']; ?>:</div>
                    <div class="text"><?php echo nl2br(htmlspecialchars($msg['message'])); ?></div>
                    <div class="timestamp text-muted"><?php echo $msg['timestamp']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="input-container">
            <form method="POST">
                <input type="text" name="message" placeholder="Type your message" required>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>

    <script>
        const chatBox = document.querySelector('.chat-box');
        chatBox.scrollTop = chatBox.scrollHeight;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
