<?php
session_start();
include  '../config.php';

if (isset($_POST['submit'])) {
    $Employee_ID = $_POST['employeeID'];
    $Sadd1 = $_POST['SAdd1'];
    $Sadd2 = $_POST['SAdd2'];
    $City = $_POST['city'];
    $State = $_POST['state'];
    $zip = $_POST['zipCode'];
    $Phone_Number = $_POST['phone'];

    $query = "UPDATE nurse SET 
                SAdd1 = '$Sadd1', 
                SAdd2 = '$Sadd2', 
                City = '$City', 
                State = '$State', 
                zip = '$zip', 
                Phone_Number = '$Phone_Number' 
              WHERE Employee_ID = '$Employee_ID'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['success'] = "Nurse information updated successfully!";
        header("Location: nurseview.php"); 
    } else {
        $_SESSION['error'] = "There was an issue in updating nurse information. Please try again.";
        header("Location: nurseAddressChange.php");
        exit();
    }
}

if (isset($_GET['employeeID'])) {
    $Employee_ID = $_GET['employeeID'];
    $query = "SELECT * FROM nurse WHERE Employee_ID = '$Employee_ID'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['error'] = "Nurse not found with the provided Employee ID.";
        header("Location: nurseview.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Employee ID not provided in the URL.";
    header("Location: nurseview.php");
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
        <div class="nurse-forms">
            <form action="nurse-update.php" class="register-forms" method="POST" onsubmit="return clearForm()">
                <input type="hidden" name="employeeID" value="<?php echo $row['Employee_ID']; ?>">
                <div class="input-element addressInput">
                    <div class="input-1">
                        <label for="SAdd1">Street Address 1</label>
                        <br /><input class="SAdd1" type="text" id="SAdd1" name="SAdd1" value="<?php echo $row['SAdd1']; ?>" required>
                    </div>
                    <div class="input-2">
                        <label for="SAdd2">Street Address 2</label>
                        <br /><input class="SAdd2" type="text" id="SAdd2" name="SAdd2" value="<?php echo $row['SAdd2']; ?>" required>
                    </div>
                </div>
                <div class="input-element addressInput2">
                    <div class="input-1">
                        <label for="city">City</label>
                        <br /><input type="text" id="city" name="city" value="<?php echo $row['City']; ?>" required>
                    </div>
                    <div class="input-1">
                        <label for="state">State</label>
                        <br /><input type="text" id="state" name="state" value="<?php echo $row['State']; ?>" required>
                    </div>
                    <div class="input-3">
                        <label for="zipCode">Zip Code</label>
                        <br /><input type="number" id="zipCode" name="zipCode" value="<?php echo $row['zip']; ?>" required>
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
            document.getElementById('SAdd1').value = '';
            document.getElementById('SAdd2').value = '';
            document.getElementById('city').value = '';
            document.getElementById('state').value = '';
            document.getElementById('zipCode').value = '';
            return true; 
        }
    </script>
</body>

</html>
