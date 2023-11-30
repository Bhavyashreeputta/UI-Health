<?php
session_start();
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['EmployeeID'])) {
        $employeeID = $_SESSION['EmployeeID'];

        if (isset($_POST['selectedSlots']) && is_array($_POST['selectedSlots']) && !empty($_POST['selectedSlots'])) {
            $selectedSlots = $_POST['selectedSlots'];

            $insertSql = "INSERT INTO nursescheduling(SlotID, EmployeeID) VALUES (?, ?)";
            if ($insertStmt = $conn->prepare($insertSql)) {
                $insertStmt->bind_param("ii", $slotID, $employeeID);

                foreach ($selectedSlots as $slotID) {
                    $insertStmt->execute();

                    if ($insertStmt->errno) {
                        echo "Error executing SQL statement: " . $insertStmt->error;
                        $insertStmt->close();
                        $conn->close();
                        exit(); 
                    }
                }

                echo '<script>alert("Booking successful!");</script>';
                $insertStmt->close();
                header("Location: nursedashboard.php");
            } else {
                echo "Error preparing SQL statement: " . $conn->error;
            }
        } else {
            echo "No slots selected for booking.";
        }
    } else {
        echo "Error: Employee ID not found in session.";
    }
}

$conn->close();
?>

