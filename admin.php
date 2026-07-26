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
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>Admin Panel</h1>

<h3>Total Health Reports</h3>

<table>

<tr>
    <th>ID</th>
    <th>Patient Name</th>
    <th>Village</th>
    <th>Symptoms</th>
    <th>Alert Status</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['patient_name']; ?></td>
    <td><?php echo $row['village']; ?></td>
    <td><?php echo $row['symptoms']; ?></td>
    <td>
        <?php
        if($row['alert_status']=="Warning")
        {
            echo "<span style='color:red;font-weight:bold;'>⚠ Warning</span>";
        }
        else
        {
            echo "<span style='color:green;'>Safe</span>";
        }
        ?>
    </td>
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