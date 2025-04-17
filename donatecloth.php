<?php
$servername = "localhost";
$username = "root";
$password = "root"; // Change if your DB uses a password
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
    $cloth_type = $_POST['cloth_type'];
    $quantity = $_POST['quantity'];
    $donation_time = $_POST['donation_time'];

    $sql = "INSERT INTO cloth_donations (name, mno, email, cloth_type, quantity, donation_time)
            VALUES ('$name', '$mno', '$email', '$cloth_type', '$quantity', '$donation_time')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cloth donation submitted successfully!'); window.location.href='donatecloth.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
