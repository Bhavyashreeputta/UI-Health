<?php 
session_start();
include  '../config.php';

if(isset($_POST['uname']) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

$uname = validate($_POST['uname']);
$pass = validate($_POST['password']);

$sql = "SELECT * FROM `patient` WHERE UserName='$uname' AND Passw='$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['UserName'] === $uname && $row['Passw'] === $pass){
        echo "Logged In";
        $_SESSION['Name'] = $row['FName'].''.$row['MI'].''.$row['LName'];
        $_SESSION['UserName'] = $row['UserName'];
        $_SESSION['SSN'] = $row['SSN'];
        header("Location: dashboard.php");
    }
    else{
        header("Location: patientlogin.php?error=Incorrect Username or Password");
        exit(0);
    }
}
else{
    header("Location: patientlogin.php");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Admin</title>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h1>Login as Patient</h1>

            <?php if(isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error'] ?></p>
                <?php } ?>

            <form action="patientlogin.php" method="post">
        
                <input type="text" name="uname" placeholder="Username" required>
        
                <input type="password" name="password" placeholder="Password" required>
        
                <button type="submit">Login</button>
            </form>
            <p class="register-user">
                New User? <a href="registration.php" class="register-link">Register</a>
            </p>
        </div>
    </div>
</body>
</html>