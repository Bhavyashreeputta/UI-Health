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
            <section>
            <div class="slot-booking-container">
                <h2>Slot Booking</h2>
                    <form action="nurseSchedule.php" method="post">
                        <div class="form-group">
                            <label for="bookingDate">Booking Date:</label>
                            <input type="date" id="bookingDate" name="bookingDate" required>
                        </div>
                        <button type="submit">Check Available Slots</button>
                    </form>
            </div>
            </section>
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
