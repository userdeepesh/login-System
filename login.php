<?php
$conn = new mysqli('localhost', 'root', '', 'userdb');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            echo "Login successful! Welcome " . $user['username'];
            // Redirect to user dashboard or homepage
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with this email.";
    }
}

$conn->close();
?>
