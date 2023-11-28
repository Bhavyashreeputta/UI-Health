<?php 
session_start();
include  '../config.php';

if(isset($_POST['submit']))
{
    
    $Name = $_POST['vaccine_name'];
    $C_Name = $_POST['company_name'];
    $description = $_POST['description'];
    $doses = $_POST['doses_required'];
    $available = $_POST['availability'];
    $hold = $_POST['hold'];

    $query = "INSERT INTO vaccine(`Name`, `Description`, `CompanyName`, `Doses`, `Availability`, `OnHold`) VALUES('$Name', '$description', '$C_Name','$doses','$available','$hold')";
    $query_run = mysqli_query($conn, $query);
     

    if($query_run)
    {
        $_SESSION['success'] = "Nurse registered successfully!";
        header("Location: vaccineList.php");
    }
    else
    {
        $_SESSION['error'] = "There was an issue in registering the nurse. Please try again.";
        header("Location: vaccine.php");
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
    <title>Admin</title>
</head>
<body>
    <?php include './sidebar.html'; ?>
    <div class="main">
        <div class="Vaccination-forms">
        <h1>Vaccine Details</h1>
        <?php
        if (isset($_SESSION['success'])) {
            echo '<p class="success-message">' . $_SESSION['success'] . '</p>';
            unset($_SESSION['success']);
        } elseif (isset($_SESSION['error'])) {
            echo '<p class="error-message">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
        ?>
        <form action="vaccine.php" method="post" class="vaccine-form">
                <div class="input-element">
                    <label for="vaccine-name">Vaccine Name</label>
                    <input type="text" id="vaccine-name" name="vaccine_name" required>
                </div>
                <div  class="input-element">
                    <label for="company-name">Company Name</label>
                    <input type="text" id="company-name" name="company_name" required>
                </div>
                <div class="input-element">
                    <label for="doses-required">Doses Required</label>
                    <input type="number" id="doses-required" name="doses_required" min="1" required>
                </div>
                <div class="input-element">
                    <label for="description">Description (optional)</label>
                    <textarea id="description" name="description" rows="1" column="1"></textarea>
                </div>
                <div class="input-element">
                    <label for="availability">Number of Doses Available</label>
                    <input type="number" id="availability" name="availability" min="1" required>
                </div>
                <div class="input-element">
                    <label for="hold">Number of Doses on Hold</label>
                    <input type="number" id="hold" name="hold" min="1" required>
                </div>
                <div class="add-btn">
                    <input type="submit" value="Add Vaccine" class="submit" name="submit">
                </div>
        </form>
        </div>
    </div>
</body>
</html>