<?php
session_start();

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>Dashboard</h1>

<p align="center">
Welcome to the Smart Community Health Monitoring System
</p>

<hr>

<button onclick="window.location.href='add_report.php'">
Add Health Report
</button>

<br><br>

<button onclick="window.location.href='view_reports.php'">
View Health Reports
</button>

<br><br>

<button onclick="window.location.href='admin.php'">
Admin Panel
</button>

<br><br>

<button onclick="window.location.href='logout.php'">
Logout
</button>

</div>

</body>
</html>