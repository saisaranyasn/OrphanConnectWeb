<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "root", "oms");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['signIn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Escape inputs to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to verify admin credentials
    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = $conn->query($query);

    if ($result && $result->num_rows === 1) {
        $_SESSION['admin_email'] = $email;
        header("Location: mainadmin.php");
        exit();
    } else {
        echo "<script>alert('Invalid email or password'); window.history.back();</script>";
    }
}

$conn->close();
?>
