<?php
session_start();

// Restrict access to logged-in admin only
if (!isset($_SESSION['admin_email'])) {
    header("Location: alogin.html");
    exit();
}

// Connect to DB
$conn = new mysqli("localhost", "root", "root", "oms");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all donation records
$food_result = $conn->query("SELECT * FROM food_donations ORDER BY donation_time DESC");
$cloth_result = $conn->query("SELECT * FROM cloth_donations ORDER BY donation_time DESC");
$money_result = $conn->query("SELECT * FROM money_donations ORDER BY donation_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Donations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1, h2 {
            margin-top: 30px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .section {
            margin-bottom: 50px;
        }
    </style>
</head>
<body>

<h1>Donation Records</h1>

<!-- Food Donations -->
<div class="section">
    <h2>Food Donations</h2>
    <?php if ($food_result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Donor Name</th>
                <th>Mobile No</th>
                <th>Email</th>
                <th>Address</th>
                <th>Food Type</th>
                <th>Quantity</th>
                <th>Donation Time</th>
            </tr>
            <?php while ($row = $food_result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['fname']) ?></td>
                <td><?= htmlspecialchars($row['mno']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['addr']) ?></td>
                <td><?= htmlspecialchars($row['food_type']) ?></td>
                <td><?= htmlspecialchars($row['quantity']) ?></td>
                <td><?= htmlspecialchars($row['donation_time']) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No food donations yet.</p>
    <?php endif; ?>
</div>

<!-- Cloth Donations -->
<div class="section">
    <h2>Cloth Donations</h2>
    <?php if ($cloth_result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Donor Name</th>
                <th>Mobile No</th>
                <th>Email</th>
                <th>Cloth Type</th>
                <th>Quantity</th>
                <th>Donation Time</th>
            </tr>
            <?php while ($row = $cloth_result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['mno']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['cloth_type']) ?></td>
                <td><?= htmlspecialchars($row['quantity']) ?></td>
                <td><?= htmlspecialchars($row['donation_time']) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No cloth donations yet.</p>
    <?php endif; ?>
</div>

<!-- Money Donations -->
<div class="section">
    <h2>Money Donations</h2>
    <?php if ($money_result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Donor Name</th>
                <th>Mobile No</th>
                <th>Email</th>
                <th>Amount (₹)</th>
                <th>Payment Method</th>
                <th>Donation Date</th>
            </tr>
            <?php while ($row = $money_result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['mno']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['amount']) ?></td>
                <td><?= htmlspecialchars($row['payment_method']) ?></td>
                <td><?= htmlspecialchars($row['donation_date']) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No money donations yet.</p>
    <?php endif; ?>
</div>

</body>
</html>

<?php
$conn->close();
?>
