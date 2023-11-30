<?php
session_start();
include '../config.php'; 

$bookingDate = '';
$employeeID = '';
$selectedSlots = [];
$availableSlots = [];
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookingDate = $_POST['bookingDate'];
    $employeeID = $_SESSION['employeeID']; 
    $selectedSlots = isset($_POST['selectedSlots']) ? $_POST['selectedSlots'] : [];

    $availableSlotsSql = "SELECT ts.TimeSlotID, ts.TimeRange
                          FROM Timeslot AS ts
                          LEFT JOIN NurseSchedule AS ns ON ts.TimeSlotID = ns.TimeSlotID AND ts.Date = ? AND ns.EmployeeID = ?
                          WHERE ts.Date = ? AND ns.EmployeeID IS NULL
                          GROUP BY ts.TimeSlotID
                          HAVING COUNT(ns.EmployeeID) < 12";

    if ($availableSlotsStmt = $conn->prepare($availableSlotsSql)) {
        $availableSlotsStmt->bind_param("sss", $bookingDate, $employeeID, $bookingDate);
        $availableSlotsStmt->execute();
        $availableSlotsResult = $availableSlotsStmt->get_result();

        while ($row = $availableSlotsResult->fetch_assoc()) {
            $availableSlots[] = $row;
        }

        $availableSlotsStmt->close();
    } else {

        $error = "Error preparing the query for available slots: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nurse</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>

<body>
    <div class="slot-booking-container">
        <h2>Slot Booking</h2>
        <form action="nurseSchedule.php" method="post">
            <div class="form-group">
                <label for="bookingDate">Booking Date:</label>
                <input type="date" id="bookingDate" name="bookingDate" required>
            </div>
            <button type="submit">Check Available Slots</button>
        </form>
    </div>
</body>
</html>
