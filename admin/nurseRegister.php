<?php 
session_start();
include  '../config.php';

if(isset($_POST['submit']))
{
    
    $First_Name = $_POST['fname'];
    $Middle_Name = $_POST['mi'];
    $Last_Name = $_POST['lname'];
    $Employee_ID = $_POST['employeeID'];
    $Age = $_POST['age'];
    $Gender = $_POST['gender'];
    $Phone_Number = $_POST['phone'];
    $Sadd1 = $_POST['SAdd1'];
    $Sadd2 = $_POST['SAdd2'];
    $City = $_POST['city'];
    $State = $_POST['state'];
    $zip = $_POST['zipCode'];
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    $query = "INSERT INTO nurse VALUES('$Employee_ID','$First_Name','$Middle_Name','$Last_Name','$Age','$Gender','$Phone_Number','$Sadd1', '$Sadd2', '$City', '$State', '$zip', '$uname', '$pass')";
    $query_run = mysqli_query($conn, $query);
     

    if($query_run)
    {
        $_SESSION['success'] = "Nurse registered successfully!";
        header("Location: nurseview.php");
    }
    else
    {
        $_SESSION['error'] = "There was an issue in registering the nurse. Please try again.";
        header("Location: nurseRegister.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="./dashboard.css">
    <title>Register Nurse</title>
</head>
<body>
    <?php include './sidebar.html'; ?>
    <div class="main">
        <h1>Nurse Registration</h1>
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
            <form action="nurseRegister.php" class="register-forms" method="POST" onsubmit="return clearForm()">
                <div class="input-element nameInput">
                    <div class="input-1">
                        <label for="fname">First Name</label>
                        <br /><input type="text" id="fname" name="fname" required>
                    </div>
                    <div class="input-2">
                        <label for="mi">Middle Name</label>
                        <br/><input type="text" id="mi" name="mi">
                    </div>
                    <div class="input-2">
                        <label for="lname">Last Name</label>
                        <br/><input type="text" id="lname" name="lname" required>
                    </div>
                </div>

                <div class="input-element">
                    <label for="employeeID">Employee ID</label>
                    <br /><input type="text" id="employeeID" name="employeeID" required>
                </div>

                <div class="input-element">
                    <label for="age">Age</label>
                    <br /><input type="number" id="age" name="age" required>
                </div>

                <div class="input-element">
                    <label for="gender">Gender</label>
                    <br /><select id="gender" name="gender" required>
                        <option value="select">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="input-element">
                    <label for="phone">Phone Number</label>
                    <br /><input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required>
                </div>

                <div class="input-element addressInput">
                    <div class="input-1">
                        <label for="SAdd1">Street Address 1</label>
                        <br /><input class="SAdd1" type="text" id="SAdd1" name="SAdd1" required>
                    </div>
                    <div class="input-2">
                        <label for="SAdd2">Street Address 2</label>
                        <br /><input class="SAdd2" type="text" id="SAdd2" name="Add2" required>
                    </div>
                </div>
                <div class="input-element addressInput2">
                    <div class="input-1">
                        <label for="city">City</label>
                        <br /><input type="text" id="city" name="city" required>
                    </div>
                    <div class="input-1">
                        <label for="state">State</label>
                        <br /><input type="text" id="state" name="state" required>
                    </div>
                    <div class="input-3">
                        <label for="zipCode">Zip Code</label>
                        <br /><input type="number" id="zipCode" name="zipCode" required>
                    </div>
                </div>

                <div class="input-element user-details">
                    <div class="input-1">
                        <label for="username">Username</label>
                        <br /><input class="username" type="text" id="username" name="username" required>
                    </div>
                    <div class="input-2">
                        <label for="password">Password</label>
                        <br /><input class="password" type="text" id="password" name="password" required>
                    </div>
                </div>

                <div class = "submit-btn">
                    <input type="submit" class="submit" name="submit"/>
                </div>
            </form>
        </div>
    </div>
    <script>
        function clearForm() {
            document.getElementById('fname').value = '';
            document.getElementById('mi').value = '';
            document.getElementById('lname').value = '';
            document.getElementById('employeeID').value = '';
            document.getElementById('age').value = '';
            document.getElementById('gender').value = 'select';
            document.getElementById('phone').value = '';
            document.getElementById('SAdd1').value = '';
            document.getElementById('SAdd2').value = '';
            document.getElementById('city').value = '';
            document.getElementById('state').value = '';
            document.getElementById('zipCode').value = '';
            document.getElementById('username').value = '';
            document.getElementById('password').value = '';
            return true; 
        }
    </script>
</body>
</html>