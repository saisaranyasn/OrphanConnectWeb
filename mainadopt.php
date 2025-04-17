<?php
session_start();

// Allow access only if admin is logged in
if (!isset($_SESSION['admin_email'])) {
    header("Location: admin_login.html");
    exit();
}

// Connect to DB
$conn = new mysqli("localhost", "root", "root", "oms");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch adoption requests
$result = $conn->query("SELECT * FROM adoption_requests ORDER BY request_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adoption Requests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 25px;
        }
        h1 {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #bbb;
            padding: 10px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

<h1>Adoption Requests</h1>

<?php if ($result->num_rows > 0): ?>
<table>
    <tr>
        <th>ID</th>
        <th>Child Name</th>
        <th>Adopter Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Reason for Adoption</th>
        <th>Request Date</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['id']) ?></td>
        <td><?= htmlspecialchars($row['child_name']) ?></td>
        <td><?= htmlspecialchars($row['adopter_name']) ?></td>
        <td><?= htmlspecialchars($row['adopter_email']) ?></td>
        <td><?= htmlspecialchars($row['adopter_phone']) ?></td>
        <td><?= nl2br(htmlspecialchars($row['reason'])) ?></td>
        <td><?= htmlspecialchars($row['request_date']) ?></td>
    </tr>
    <?php endwhile; ?>
</table>
<?php else: ?>
<p>No adoption requests submitted yet.</p>
<?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>
