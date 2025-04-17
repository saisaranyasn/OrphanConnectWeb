<?php
$servername = "localhost";
$username = "root";
$password = "root";  // change if your MySQL has a password
$dbname = "oms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $mno = $_POST['mno'];
    $email = $_POST['email'];
    $addr = $_POST['addr'];
    $food_type = $_POST['food_type'];
    $quantity = $_POST['quantity'];
    $donation_time = $_POST['donation_time'];

    $sql = "INSERT INTO food_donations (fname, mno, email, addr, food_type, quantity, donation_time)
            VALUES ('$fname', '$mno', '$email', '$addr', '$food_type', '$quantity', '$donation_time')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Donation submitted successfully!'); window.location.href='donatefood.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
