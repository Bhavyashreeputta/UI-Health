<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nurse</title>
    <link rel="stylesheet" href="schedule.css">
</head>

<body>
    <?php
        include 'topbar.php';
    ?>
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
