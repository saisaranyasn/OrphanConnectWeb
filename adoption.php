<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "root";
$database = "oms"; // your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get and sanitize form inputs
$child_name = $conn->real_escape_string($_POST['child_name']);
$adopter_name = $conn->real_escape_string($_POST['adopter_name']);
$adopter_email = $conn->real_escape_string($_POST['adopter_email']);
$adopter_phone = $conn->real_escape_string($_POST['adopter_phone']);
$reason = $conn->real_escape_string($_POST['reason']);

// Insert query
$sql = "INSERT INTO adoption_requests (child_name, adopter_name, adopter_email, adopter_phone, reason)
        VALUES ('$child_name', '$adopter_name', '$adopter_email', '$adopter_phone', '$reason')";

if ($conn->query($sql) === TRUE) {
  echo "Adoption request submitted successfully!";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
