<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="./dashboard.css">
    <title>Patient Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<?php include './sidebar.html'; ?>

<div class="main">
<?php
include '../config.php';

$sql = "SELECT * FROM patient";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Patient Information</h2>";
    echo "<table><tr><th>PatientID</th><th>Name</th><th>SSN</th><th>Age</th><th>Gender</th><th>Race</th><th>Occupation</th><th>Medical History</th><th>Phone</th><th>Address</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["SSN"]."</td>
        <td>".$row["FName"]." ".$row["MI"]." ".$row["LName"]."</td>
        <td>".$row["SSN"]."</td>
        <td>".$row["Age"]."</td>
        <td>".$row["Gender"]."</td>
        <td>".$row["Race"]."</td>
        <td>".$row["OccupationClass"]."</td>
        <td>".$row["MedicalHistoryDescription"]."</td>
        <td>".$row["Phone"]."</td>
        <td>".$row["Address"]."</td></tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

// Fetch Vaccination Scheduling information
$sql = "SELECT * FROM vaccinationschedule";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Vaccination Schedule</h2>";
    echo "<table><tr><th>ScheduleID</th><th>PatientID</th><th>TimeSlotID</th><th>VaccineID</th><th>DoseNumber</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["V_Schedule_ID"]."</td><td>".$row["SSN"]."</td><td>".$row["SlotID"]."</td><td>".$row["VaccineID"]."</td><td>".$row["DoseNo"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Fetch Vaccination Record information
$sql = "SELECT * FROM vaccinerecord";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Vaccination History</h2>";
    echo "<table><tr><th>RecordID</th><th>PatientID</th><th>TimeSlotID</th><th>NurseID</th><th>VaccineID</th><th>DoseNumber</th><th>Vaccinedate</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["RecordNo"]."</td><td>".$row["SSN"]."</td><td>".$row["SlotID"]."</td><td>".$row["EmployeeID"]."</td><td>".$row["VaccineID"]."</td><td>".$row["Dose"]."</td><td>".$row["Date"]."</td></tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
</div>

</body>
</html>