<?php
session_start();

if(isset($_SESSION['Name']) && isset($_SESSION['UserName'])){
include '../config.php';

$bookingDate = '';
$employeeID = '';
$selectedSlots = [];
$availableSlots = [];
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookingDate = $_POST['bookingDate'];
    $employeeID = $_SESSION['EmployeeID'];                                                                                  
    $selectedSlots = isset($_POST['selectedSlots']) ? $_POST['selectedSlots'] : [];

    $availableSlotsSql = "SELECT ts.SlotID, ts.Starttime, ts.Endtime
                            FROM timeslot ts
                            LEFT JOIN nursescheduling ns ON ts.SlotID = ns.SlotID And ts.Date = ? AND ns.EmployeeID = ?
                            WHERE ts.Date = ? AND ns.EmployeeID IS NULL
                            GROUP BY ts.SlotID
                            HAVING  COUNT(ns.EmployeeID) < 12";
    

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
    <title>Slot Booking</title>
    <link rel="stylesheet" href="schedule.css">
</head>
<body>
    <div class="slot-booking-container">
        <h2>Slot Booking</h2>
        <form action="slotbooking.php" method="post">
            <div class="form-group">
                <label for="bookingDate">Booking Date:</label>
                <input type="date" id="bookingDate" name="bookingDate" value="<?php echo $bookingDate; ?>" required>
            </div>
            <button type="submit">Check Available Slots</button>

            <div class="available-slots-container">
                <h2>Available Slots</h2>
                <?php if (!empty($availableSlots) || !empty($selectedSlots)): ?>
                    <?php foreach ($availableSlots as $slot): ?>
                        <label>
                            <input type="checkbox" name="selectedSlots[]" value="<?php echo $slot['SlotID']; ?>" <?php echo in_array($slot['SlotID'], $selectedSlots) ? 'checked' : ''; ?>>
                            <?php echo $bookingDate . " " . $slot['Starttime']." ". $slot['Endtime']; ?>
                        </label><br>
                    <?php endforeach; ?>
                    <?php if (!empty($error)): ?>
                        <p>Error: <?php echo $error; ?></p>
                    <?php endif; ?>
                    <button type="submit">Book Selected Slots</button>
                <?php else: ?>
                    <?php if (!empty($error)): ?>
                        <p>Error: <?php echo $error; ?></p>
                    <?php else: ?>
                        <p>No slots selected for booking.</p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </form>
    </div>
</body>
</html>
<?php
}
else{
    header("Location: nurselogin.php");
    exit();
}
?>
