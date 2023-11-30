<?php
session_start();
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientID = $_SESSION['SSN'];
    $selectedTimeSlot = $_POST["selectedTimeSlot"];
    $doseNo = $_POST["doseNo"];
    $selectedVaccine = $_POST["selectedVaccine"];

    $updateSql = "UPDATE timeslot SET Capacity = Capacity - 1 WHERE SlotID = '$selectedTimeSlot'";
    if ($conn->query($updateSql) === TRUE) {
        $insertSql = "INSERT INTO vaccinationschedule(`DoseNo`, `SSN`, `SlotID`, `VaccineID`) VALUES ('$doseNo', '$patientID', '$selectedTimeSlot', '$selectedVaccine')";
        if ($conn->query($insertSql) === TRUE) {
            $_SESSION['success'] = "Vaccination scheduled successfully!";
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Error scheduling vaccination. Please try again.";
            header("Location: patientschedule.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Error updating time slot capacity. Please try again.";
        header("Location: patientschedule.php");
        exit();
    }
}

$sql = "SELECT * FROM timeslot";
$result = $conn->query($sql);

$vaccineSql = "SELECT * FROM vaccine";
$vaccineResult = $conn->query($vaccineSql);
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
            <h2>Available Time Slots</h2>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<input type="radio" name="selectedTimeSlot" value="' . $row["SlotID"] . '">';
                        echo $row["Starttime"] . ' - ' . $row["Endtime"] . ' (Capacity: ' . $row["Capacity"] . ')<br>';
                    }
                } else {
                    echo "No time slots available.";
                }
                ?>

                <br><br>
                <label for="doseNo">Dose No:</label>
                <select name="doseNo" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                <br><br>

                <label for="selectedVaccine">Select Vaccine:</label>
                <select name="selectedVaccine" required>
                    <?php
                    // Display vaccines in dropdown menu
                    if ($vaccineResult->num_rows > 0) {
                        while ($vaccineRow = $vaccineResult->fetch_assoc()) {
                            echo '<option value="' . $vaccineRow["VaccineID"] . '">' . $vaccineRow["CompanyName"] . '</option>';
                        }
                    } else {
                        echo '<option value="" disabled>No vaccines available</option>';
                    }
                    ?>
                </select>

                <br><br>

                <input type="submit" value="Schedule Appointment">
            </form>
        </div>
</body>
</html>
