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

$sql = "SELECT * FROM `admin` WHERE Name='$uname' AND Pass='$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['Name'] === $uname && $row['Pass'] === $pass){
        echo "Logged In";
        $_SESSION['Name'] = $row['Name'];
        $_SESSION['UserID'] = $row['UserID'];
        header("Location: dashboard.php");
    }
    else{
        header("Location: adminlogin.php?error=Incorrect Username or Password");
        exit(0);
    }
}
else{
    header("Location: adminlogin.php");
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
            <h1>Login as an Admin User</h1>
            <form action="adminlogin.php" method="post">
                <?php if(isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error'] ?></p>
                <?php } ?>
                <input type="text" name="uname" placeholder="Username" required>
        
                <input type="password" name="password" placeholder="Password" required>
        
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>