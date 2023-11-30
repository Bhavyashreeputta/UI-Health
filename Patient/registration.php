<?php 
session_start();
include  '../config.php';

if(isset($_POST['submit']))
{
    
    $First_Name = $_POST['fname'];
    $Middle_Name = $_POST['mi'];
    $Last_Name = $_POST['lname'];
    $SSN = $_POST['SSN'];
    $Age = $_POST['age'];
    $Gender = $_POST['gender'];
    $race = $_POST['race'];
    $OClass = $_POST['occupationClass'];
    $Phone_Number = $_POST['phone'];
    $description = $_POST['description'];
    $Sadd1 = $_POST['SAdd1'];
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    $query = "INSERT INTO patient(FName, MI, LName, SSN, Age, Gender, Race, OccupationClass, MedicalHistoryDescription, Phone, Address, UserName, Passw) VALUES('$First_Name','$Middle_Name', '$Last_Name', '$SSN', '$Age', '$Gender', '$race', '$OClass', '$description', '$Phone_Number','$Sadd1','$uname', '$pass')";
    $query_run = mysqli_query($conn, $query);
     

    if($query_run)
    {
        $_SESSION['success'] = "Patient registered successfully!";
        $_SESSION['Name'] = $_POST['fname'].''.$_POST['mi'].''.$_POST['lname'];
        $_SESSION['SSN'] = $_POST['SSN'];
        $_SESSION['UserName'] = $_POST['username'];
        header("Location: dashboard.php");
    }
    else
    {
        $_SESSION['error'] = "There was an issue in registering the nurse. Please try again.";
        header("Location: registration.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="register-box">
            <h1>Registration Forms</h1>
            <form action="registration.php" method="POST">
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
                <div class="input-element elements-info">
                    <div class="input-1">
                        <label for="SSN">SSN</label>
                        <br /><input type="text" id="SSN" name="SSN" required>
                    </div>
                    <div class="input-2">
                        <label for="age">Age</label>
                        <br/><input type="text" id="age" name="age">
                    </div>
                    <div class="input-3">
                        <label for="Gender">Gender</label>
                        <br /><select id="gender" name="gender" required>
                            <option value="select">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
            <div class="input-element elements-info">
                <div class="input-1">
                    <label for="race">Race</label>
                    <br /><select id="race" name="race" required>
                        <option value="select">Select</option>
                        <option value="Black or African American">Black or African American</option>
                        <option value="Hispanic or LATINO">Hispanic or Latino</option>
                        <option value=" American Indian">American Indian</option>
                        <option value=" Caucasian">Caucasian</option>
                        <option value=" Asian">Asian</option>
                        <option value="Other">Other</option>
                        <option value="Do not wish to specify">Do not wish to specify</option>
                    </select>
                </div>
                <div class="input-2">
                    <label for="occupationClass">Occupation Class</label>
                    <br/><input type="text" id="occupationClass" name="occupationClass">
                </div>
                <div class="input-3">
                    <label for="description">Medical History Description</label>
                    <br/><input type="text" id="description" name="description">
                </div>
            </div>
            <div class="input-element elements-info">
                <div class="input-1">
                    <label for="phone">Phone Number</label>
                    <br /><input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required>
                </div>
            </div>
            <div class="input-element addressInput">
                <div class="input-1">
                    <label for="SAdd1">Address</label>
                    <br /><input class="SAdd1" type="text" id="SAdd1" name="SAdd1" required>
                </div>
            </div>
            <!-- <div class="input-element addressInput2">
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
            </div> -->

            <div class="input-element user-details">
                <div class="input-1">
                    <label for="username">Username</label>
                    <br /><input class="username" type="text" id="username" name="username" required>
                </div>
                <div class="input-2">
                    <label for="password">Password</label>
                    <br /><input class="password" type="text" id="password" name="password" required>
                </div>
                <div class="input-3">
                    <label for="Confirmpassword">Confirm Password</label>
                    <br /><input class="Confirmpassword" type="text" id="Confirmpassword" name="Confirmpassword" required>
                </div>

            </div>
            
            <div class = "submit-btn">
                <input type="submit" class="submit" style="background-color: black; color:white;" name="submit"/>
            </div>
        </form>
            
        </div>
    </div>
</body>
</html>