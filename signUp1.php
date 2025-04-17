<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "oms"; // your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fName"];
    $email = $_POST["email"];
    $pass = $_POST["password"]; // plain password

    // Check if email exists
    $check = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already registered.'); window.history.back();</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO user (fname, email, pswd) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fname, $email, $pass);
        if ($stmt->execute()) {
            echo "<script>alert('Registered successfully!'); window.location.href='signIn.html';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    $check->close();
}
$conn->close();
?>
