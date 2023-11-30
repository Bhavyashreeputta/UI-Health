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
                                <li><a href="nursedashboard.php" class="active">Home</a></li>
                                <li><a href="slots.php">Schedule</a></li>
                                <li><a href="scheduleList.php">View</a></li>
                                <li><a href="vaccine.php">Update Vaccine</a></li>
                            </ul>
                        </div>
                        <div class="user" onclick="menuToggle();">
                            <img src="profileicon.png" id="photo">
                        </div>

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
                                        <span class="li-text">New Slot</span>
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
            <h2>Vaccine Lists</h2>
            <div class='main' id="main-content">
                
                <?php
                include '../config.php';
                $sql = "SELECT FName, MI, LName, nurse.FirstName, nurse.MiddleInitial, nurse.LastName, vaccine.Name, vaccinerecord.Dose, vaccinerecord.Date 
                FROM vaccine, nurse, patient, vaccinerecord Where vaccine.VaccineID = vaccinerecord.VaccineID AND vaccinerecord.SSN = patient.SSN AND 
                vaccinerecord.EmployeeID = nurse.EmployeeID";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                if(mysqli_num_rows($result) > 0){
                ?>
                <table cellpadding="5px">
                <thead>
                <th>Name</th>
                <th>Nurse</th>
                <th>Vaccine</th>
                <th>Dose</th>
                <th>Date</th>
                </thead>
                <tbody>
                <?php
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                <td><?php echo $row['FName'].' '.$row['MI'].' '.$row['LName']; ?></td>
                <td><?php echo $row['FirstName'].' '.$row['MiddleInitial'].' '.$row['LastName']; ?></td>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['Dose']; ?></td>
                <td><?php echo $row['Date']; ?></td>
                <td class="links">
                <a href='./updateVaccine.php?update_no=<?php echo $_SESSION['EmployeeID']; ?>' class="edit">Update</a>
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