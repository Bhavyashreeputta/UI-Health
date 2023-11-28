<?php
session_start();
include  '../config.php';

if (isset($_POST['submit'])) {
    $SSN = $_POST['SSN'];
    $FName = $_POST['FName'];
    $LName = $_POST['LName'];
    $MedicalHistoryDescription = $_POST['MedicalHistoryDescription'];
    $MI = $_POST['MI'];
    $Address = $_POST['Address'];
    $Phone_Number = $_POST['phone'];

    $query = "UPDATE patient SET 
                 
                Address = '$Adress', 
                City = '$City',  
                Phone_Number = '$Phone_Number' 
              WHERE SSN = '$SSN'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['success'] = "Patient information updated successfully!";
        header("Location: patientview.php"); 
    } else {
        $_SESSION['error'] = "There was an issue in updating nurse information. Please try again.";
        header("Location: patientAddressChange.php");
        exit();
    }
}

if (isset($_GET['SSN'])) {
    $Employee_ID = $_GET['SSN'];
    $query = "SELECT * FROM patient WHERE SSN = '$SSN'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['error'] = "Patient not found with the provided Employee ID.";
        header("Location: patientview.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Employee ID not provided in the URL.";
    header("Location: patientview.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="./dashboard.css">
    <title>Update Nurse Information</title>
</head>

<body>
    <?php include './sidebar.html'; ?>
    <div class="main">
        <h1>Update Nurse Information</h1>
        <?php
        if (isset($_SESSION['success'])) {
            echo '<p class="success-message">' . $_SESSION['success'] . '</p>';
            unset($_SESSION['success']);
        } elseif (isset($_SESSION['error'])) {
            echo '<p class="error-message">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
        ?>
        <div class="patient-forms">
            <form action="patient-update.php" class="register-forms" method="POST" onsubmit="return clearForm()">
                <input type="hidden" name="SSN" value="<?php echo $row['SSN']; ?>">
                <div class="input-element addressInput">
                    <div class="input-1">
                        <label for="Address">Address </label>
                        <br /><input class="Address" type="text" id="Address" name="Address" value="<?php echo $row['Address']; ?>" required>
                    </div>
        
                <div class="input-element addressInput2">
                    <div class="input-1">
                        <label for="Occupation Class">City</label>
                        <br /><input type="text" id="Occupation Class" name="Occupation Class" value="<?php echo $row['OccupationClass']; ?>" required>
                    </div>
                    <div class="input-1">
                        <label for="race">State</label>
                        <br /><input type="text" id="race" name="race" value="<?php echo $row['race']; ?>" required>
                    </div>
                    <div class="input-3">
                        <label for="Phone Number">Zip Code</label>
                        <br /><input type="number" id="Phone Number" name="Phone Number" value="<?php echo $row['Phone Number']; ?>" required>
                    </div>
                </div>
                <div class="input-element">
                    <label for="phone">Phone Number</label>
                    <br /><input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" value="<?php echo $row['Phone_Number']; ?>" required>
                </div>
                <div class="submit-btn">
                    <input type="submit" class="submit" name="submit" />
                </div>
            </form>
        </div>
    </div>
    <script>
        function clearForm() {
            document.getElementById('Address').value = '';
            document.getElementById('Phone Number').value = '';
            document.getElementById('Race').value = '';
            document.getElementById('Occupation Class').value = '';
            document.getElementById('SSN').value = '';
            return true; 
        }
    </script>
</body>

</html>
