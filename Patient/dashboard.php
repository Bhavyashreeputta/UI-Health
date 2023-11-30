<?php 
session_start();

if(isset($_SESSION['SSN']) && isset($_SESSION['UserName'])){
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <title>Patient</title>
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
                                <li><a href="#" class="active">Home</a></li>
                                <li><a href="./patientschedule.php">Schedule</a></li>
                                <li><a href="./patientview.php">View</a></li>
                            </ul>
                        </div>
                        <div class="user" onclick="menuToggle();">
                            <img src="profileicon.png" id="photo">
                        </div>

                        <div class="menu">
                            <p>Signed in as<br>
                                <a href="#">
                                    <span><?php echo $_SESSION['UserName']; ?></span>
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

            <section>
                <div class="content">
                    <h2 class="dash-title">Overview</h2>
                    <div class="dashboard-cards">
                        <div class="card-single">
                            <div class="card-body">
                                <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                <div>
                                    <h5>Total Appointments</h5>
                                    <h4>18</h4>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="">View all</a>
                            </div>
                        </div>
                        <div class="card-single">
                            <div class="card-body">
                                <span><i class="fa fa-book" aria-hidden="true"></i></span>
                                <div>
                                    <h5>Pending Appointments</h5>
                                    <h4>3</h4>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="">View all</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
<?php
}
else{
    header("Location: patientlogin.php");
    exit();
}
?>