<?php
// Database connection
$conn = new mysqli("localhost", "root", "root", "oms"); // Replace with your credentials if different

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// When the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['recover'])) {
    $email = $_POST['email'];
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if new password and confirm password match
    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
        exit();
    }

    // Check if the email exists in the user table
    $checkQuery = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        // Email found - proceed to update password
        $updateQuery = "UPDATE user SET pswd = '$newPassword' WHERE email = '$email'";
        if ($conn->query($updateQuery) === TRUE) {
            echo "<script>alert('Password updated successfully!'); window.location.href='signIn.html';</script>";
        } else {
            echo "<script>alert('Failed to update password. Try again.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Email not found in database.'); window.history.back();</script>";
    }
}

$conn->close();
?>
