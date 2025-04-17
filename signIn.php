<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "oms";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $stmt = $conn->prepare("SELECT fname, pswd FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($fname, $storedPass);
        $stmt->fetch();

        if ($pass === $storedPass) {  // plain text check
            $_SESSION["fname"] = $fname;
            header("Location: main.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Email not found'); window.history.back();</script>";
    }

    $stmt->close();
}
$conn->close();
?>
