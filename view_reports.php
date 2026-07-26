<?php
session_start();
include("db.php");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM health_reports");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Health Reports</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Health Reports</h2>

<table>
<tr>
    <th>ID</th>
    <th>Patient</th>
    <th>Age</th>
    <th>Village</th>
    <th>Water Source</th>
    <th>Symptoms</th>
    <th>Date</th>
    <th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['patient_name']; ?></td>
    <td><?php echo $row['age']; ?></td>
    <td><?php echo $row['village']; ?></td>
    <td><?php echo $row['water_source']; ?></td>
    <td><?php echo $row['symptoms']; ?></td>
    <td><?php echo $row['report_date']; ?></td>
    <td><?php echo $row['alert_status']; ?></td>
</tr>

<?php } ?>

</table>

<br>

<button onclick="window.location.href='dashboard.php'">
Back to Dashboard
</button>

</div>

</body>
</html>