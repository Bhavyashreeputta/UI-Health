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

$sql = "SELECT * FROM `nurse` WHERE UserName='$uname' AND Pass='$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['UserName'] === $uname && $row['Pass'] === $pass){
        echo "Logged In";
        $_SESSION['UserName'] = $row['UserName'];
        $_SESSION['Name'] = $row['FirstName'].' '. ' '.$row['LastName'];
        $_SESSION['EmployeeID'] = $row['EmployeeID'];
        header("Location: nursedashboard.php");
    }
    else{
        header("Location: nurselogin.php?error=IncorrectUsername or Password");
        exit(0);
    }
}
else{
    header("Location: nurselogin.php");
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
            <h1>Login as Nurse</h1>
            <?php if(isset($_GET['error'])){ ?>
                <p class="error"><?php echo $_GET['error'] ?></p>
            <?php } ?>
            <form action="nurselogin.php" method="post">
                <input type="text" name="uname" placeholder="Username" required>
        
                <input type="password" name="password" placeholder="Password" required>
        
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>