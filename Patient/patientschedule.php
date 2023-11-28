<?php
session_start();
include '../config.php';

if (isset($_POST['schedule'])) {
    $patientID = $_SESSION['SSN'];
    $selectedTimeSlot = $_POST['SlotID'];

    $insertQuery = "INSERT INTO vaccinationschedule (SSN, SlotID) VALUES ('$patientID', '$selectedTimeSlot')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        $_SESSION['success'] = "Vaccination scheduled successfully!";
        header("Location: patientProfile.php");
        exit();
    } else {
        $_SESSION['error'] = "Error scheduling vaccination. Please try again.";
        header("Location: scheduleVaccination.php");
        exit();
    }
}

$selectTimeSlotsQuery = "SELECT * FROM SlotID";
$result = mysqli_query($conn, $selectTimeSlotsQuery);
$availableTimeSlots = mysqli_fetch_all($result, MYSQLI_ASSOC);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="./dashboard.css">
    <title>Schedule Vaccination</title>
</head>
<body>
    <?php include './sidebar.html'; ?>
    <div class="main">
        <h1>Schedule Vaccination</h1>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<p class="error-message">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
        ?>
        <form action="patientsschedule.php" method="post">
            <label for="time_slot">Select Time Slot:</label>
            <select id="time_slot" name="time_slot" required>
                <?php
                foreach ($availableTimeSlots as $timeSlot) {
                    echo '<option value="' . $timeSlot['slotID'] . '">' . $timeSlot['slotID'] . '</option>';
                }
                ?>
            </select>

            <input type="submit" name="schedule" value="Schedule Vaccination">
        </form>
    </div>
</body>
</html>
