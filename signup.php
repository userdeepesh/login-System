<?php
$conn = new mysqli('localhost', 'root', '', 'userdb');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful!";
        header("Location: login.html");  // Redirect to login after successful signup
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
