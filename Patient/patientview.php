<?php
session_start();
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $scheduleID = $_POST["scheduleID"];

    $deleteSql = "DELETE FROM vaccinationschedule WHERE V_Schedule_ID = '$scheduleID'";
    if ($conn->query($deleteSql) === TRUE) {
        $slotID = $_POST["slotID"];
        $increaseSql = "UPDATE timeslot SET Capacity = Capacity + 1 WHERE SlotID = '$slotID'";
        $conn->query($increaseSql);
        $_SESSION['success'] = "Vaccination deleted successfully!";
        header("Location: patientview.php");
        exit();
    } else {
        $_SESSION['error'] = "Error cancelling vaccination. Please try again.";
        header("Location: patientview.php");
        exit();
    }
}
$ssn = $_SESSION['SSN'];
$sql = "SELECT * FROM vaccinationschedule where SSN = '$ssn'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <title>Patient</title>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" text="text/css" href="dashboard.css">

        <script>
            function menuToggle() {
                const toggleMenu = document.querySelector('.menu')
                toggleMenu.classList.toggle('active')
            }
        </script>
</head>
<body>
    <div class="main">
    <section>
        <div class="header">
            <div class="topbar">
                        <div class="logo">
                            <span class="ui-logo"><img src="logo.png" alt="Logo" width="180px"></span>
                        </div>
                        <div class="top-menu">
                            <ul>
                                <li><a href="./dashboard.php" class="active">Home</a></li>
                                <li><a href="./patientschedule.php">Schedule</a></li>
                                <li><a href="./patientview.php">View</a></li>
                            </ul>
                        </div>
                        <div class="user" onclick="menuToggle();">
                            <img src="profileicon.png" id="photo">
                        </div>

                <div class="menu">
                            <p>Signed in as<br>
                                <a href="#">
                                    <span><?php echo $_SESSION['UserName']; ?></span>
                                </a>
                            </p>
                            <ul>
                                <li>
                                    <a href="#">
                                        <span class="li-icon"><i class="fa fa-user-circle-o"
                                                aria-hidden="true"></i></span>
                                        <span class="li-title">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="li-icon"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i></span>
                                        <span class="li-title">Edit Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="li-icon"><i class="fa fa-plus-square"
                                                aria-hidden="true"></i></span>
                                        <span class="li-text">New Appointment</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="li-icon"><i class="fa fa-question-circle-o"
                                                aria-hidden="true"></i></span>
                                        <span class="li-title">Help</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="logout.php">
                                        <span class="li-icon"><i class="fa fa-sign-in" aria-hidden="true"></i></span>
                                        <span class="li-title">Logout</span>
                                    </a>
                                </li>
                            </ul>
                </div>
            </div>
        </div>
    </section>
    <h2>Vaccination Schedule</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<input type="radio" name="scheduleID" value="' . $row["V_Schedule_ID"] . '">';
                echo 'Schedule ID: ' . $row["V_Schedule_ID"] . ', Time Slot ID: ' . $row["SlotID"] . ', Dose No: ' . $row["DoseNo"] . ', Vaccine ID: ' . $row["VaccineID"] . '<br>';
                echo '<input type="hidden" name="slotID" value="' . $row["SlotID"] . '">';

            }
            echo '<br><input type="submit" value="Cancel Schedule">';
        } else {
            echo "No vaccination schedules found.";
        }
        ?>
    </form>
    </div>
</body>
</html>
