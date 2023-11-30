<?php 
session_start();

if(isset($_SESSION['Name']) && isset($_SESSION['UserName'])){
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <title>Nurse</title>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" text="text/css" href="dashboard.css">

        <!-- funtion for wokring of dropdown menu -->
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
                                <li><a href="#" class="active">Home</a></li>
                                <li><a href="./slots.php">Schedule</a></li>
                                <li><a href="#">View</a></li>
                            </ul>
                        </div>
                        <div class="user" onclick="menuToggle();">
                            <img src="profileicon.png" id="photo">
                        </div>

                        <!-- dropdown menu displayed when clicked on profileicon -->
                        <div class="menu">
                            <p>Signed in as<br>
                                <a href="#">
                                    <span><?php echo $_SESSION['Name']; ?></span>
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
            <h2>My Schedule</h2>
            <div id="main-content">
                
                <?php
                include '../config.php';
                $empID = $_SESSION['EmployeeID'];
                $sql = "SELECT `Date`, `Starttime`, `Endtime` FROM timeslot, nursescheduling WHERE timeslot.SlotID = nursescheduling.SlotID AND EmployeeID = '$empID'";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                if(mysqli_num_rows($result) > 0){
                ?>
                <table cellpadding="5px" style="width: 35%; float: middle;">
                    <thead>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                    </thead>
                    <tbody>
                    <?php
                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                    <td><?php echo $row['Date']; ?></td>
                    <td><?php echo $row['Starttime']; ?></td>
                    <td><?php echo $row['Endtime']; ?></td>
                    <td class="links" style="width: 15%;">
                    <a href='delete.php?employee_id=<?php echo $row['EmployeeID']; ?>' class="delete">Delete</a>
                    </td>
                    </tr>
                    <?php } ?>
                 </tbody>
            </table>
            <?php }else{
            echo "<h2>No Record Found</h2>";
            }
            mysqli_close($conn);
            ?>
            </div>
            </div>    
                </div>
        </div>
    </body>
</html>
<?php
}
else{
    header("Location: nurselogin.php");
    exit();
}
?>