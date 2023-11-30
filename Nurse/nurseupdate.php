<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE FORM</title>
    <link rel="stylesheet" href="./dashboard.css">
</head>
<body>
<div class="main">
        <div class="updateform">
            <h1>Nurse Information Update</h1>
                <div class="nurse-forms">
                    <form class="register-forms" action="nurseupdate.php" method="POST">
                <?php
if(isset($_POST['update']))
{
    $Employee_ID = $_POST['EmployeeID'];
    $First_Name = $_POST['fname'];
    $Middle_Name = $_POST['mi'];
    $Last_Name = $_POST['lname'];
    $Age = $_POST['age'];
    $Gender = $_POST['gender'];
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    include '../config.php';
    $sql = "UPDATE nurse SET
    FirstName = '$First_Name',
    MiddleInitial = '$Middle_Name',
    LastName = '$Last_Name',
    Age = '$Age',
    Gender = '$Gender',
    UserName = '$uname',
    Pass = '$pass'
    WHERE EmployeeID = '$Employee_ID'";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: nursedashboard.php");
    mysqli_close($conn);
}
?>
<?php
include '../config.php';
$update=$_GET['emp_no'];
$sql="SELECT * FROM nurse WHERE EmployeeID = '$update'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
if(mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)){
?> 
        <div class="input-element nameInput">
                    <div class="input-1">
                        <label for="fname">First Name : </label>
                        <span><?php echo $row['FirstName']; ?></span>
                    </div>
                    <div class="input-2">
                        <label for="mi">Middle Name : </label>
                        <span><?php echo $row['MiddleInitial']; ?></span>
                    </div>
                    <div class="input-2">
                        <label for="lname">Last Name : </label>
                        <span><?php echo $row['LastName']; ?></span>
                    </div>
                </div>

                <div class="input-element">
                    <label for="employeeID">Employee ID : </label>
                    <span><?php echo $row['EmployeeID']; ?></span>
                </div>

                <div class="input-element">
                    <label for="age">Age : </label>
                    <span><?php echo $row['Age']; ?></span>
                </div>

                <div class="input-element">
                    <label for="gender">Gender</label>
                    <br /><select id="gender" name="gender" value="<?php echo $row['Gender']; ?>" required>
                        <option value="select">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="input-element">
                    <label for="phone">Phone Number : </label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" value="<?php echo $row['Phone']; ?>" required>
                </div>

                <div class="input-element addressInput">
                    <div class="input-1">
                        <label for="SAdd1">Street Address 1 : </label>
                        <input class="SAdd1" type="text" id="SAdd1" name="SAdd1" value="<?php echo $row['Street Address 1']; ?>" />
                    </div>
                    <div class="input-2">
                        <label for="SAdd2">Street Address 2 : </label>
                        <input class="SAdd2" type="text" id="SAdd2" name="Add2" value="<?php echo $row['Street Address 2']; ?>">
                    </div>
                </div>
                <div class="input-element addressInput2">
                    <div class="input-1">
                        <label for="city">City : </label>
                        <br /><input type="text" id="city" value="<?php echo $row['City']; ?>" name="city"/>
                    </div>
                    <div class="input-1">
                        <label for="state">State : </label>
                        <br /><input type="text" id="state" name="state" value="<?php echo $row['State']; ?>"/>
                    </div>
                    <div class="input-3">
                        <label for="zipCode">Zip Code : </label>
                        <br /><input type="number" id="zipCode" name="zipCode" value="<?php echo $row['Zip Code']; ?>" />
                    </div>
                </div>

                <div class = "submit-btn" style="margin-top: 10px;">
                    <input type="submit" class="submit" name="update" value="Update"/>
                </div>
            <?php
            }
            }
            ?>
                </form>  
            </div>
        </div>
</div>    
</body>
</html>