<?php
$servername = "localhost";
$username = "root";
$password = "root"; // Change this if your database has a password
$dbname = "oms";

// Create DB connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $mno = $_POST['mno'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];

    $sql = "INSERT INTO money_donations (name, mno, email, amount, payment_method)
            VALUES ('$name', '$mno', '$email', '$amount', '$payment_method')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Thank you for your donation!'); window.location.href='donatemoney.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
