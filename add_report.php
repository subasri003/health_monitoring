<?php
session_start();
include("db.php");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {

    $patient_name = $_POST['patient_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $village = $_POST['village'];
    $water_source = $_POST['water_source'];
    $symptoms = $_POST['symptoms'];
    $report_date = $_POST['report_date'];

    // Early Warning Logic
    $alert_status = "Safe";

    $check = mysqli_query($conn,
    "SELECT COUNT(*) AS total
     FROM health_reports
     WHERE village='$village'
     AND symptoms='$symptoms'");

    $row = mysqli_fetch_assoc($check);

    if ($row['total'] >= 4) {
        $alert_status = "Warning";
    }

    $sql = "INSERT INTO health_reports
    (patient_name, age, gender, village, water_source, symptoms, report_date, alert_status)
    VALUES
    ('$patient_name','$age','$gender','$village','$water_source','$symptoms','$report_date','$alert_status')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
        alert('Health Report Added Successfully');
        window.location='view_reports.php';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Health Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Add Health Report</h2>

<form method="POST">

<input type="text" name="patient_name" placeholder="Patient Name" required>

<input type="number" name="age" placeholder="Age" required>

<select name="gender" required>
<option value="">Select Gender</option>
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>

<input type="text" name="village" placeholder="Village Name" required>

<input type="text" name="water_source" placeholder="Water Source" required>

<textarea name="symptoms" placeholder="Symptoms" required></textarea>

<input type="date" name="report_date" required>

<button type="submit" name="submit">Save Report</button>

</form>

</div>

</body>
</html>