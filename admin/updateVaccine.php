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
<?php include './sidebar.html' ?>
<div class="main">
        <div class="updateform">
            <h1>Vaccine Update</h1>
                <div class="Vaccination-forms">
                    <form action="updateVaccine.php" method="post" class="vaccine-form" style = "padding-top: 20px;">
                <?php
if(isset($_POST['update']))
{
    $VName = $_POST['vaccine_name'];
    $VCName = $_POST['company_name'];
    $updatedDescription = $_POST['description'];
    $updatedDoses = $_POST['doses_required'];
    $updatedAvailability = $_POST['availability'];
    $updatedHold = $_POST['hold'];

    include '../config.php';
    $sql = "UPDATE vaccine SET
    Name = '$VName',
    Description = '$updatedDescription',
    CompanyName = '$VCName',
    Doses = '$updatedDoses',
    Availability = '$updatedAvailability',
    OnHold = '$updatedHold'
    WHERE VaccineID = '$_GET[update_no]'";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: vaccineList.php");
    mysqli_close($conn);
}
?>
<?php
include '../config.php';
$update=$_GET['update_no'];
$sql="SELECT * FROM vaccine WHERE VaccineID = '$update'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
if(mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)){
?> 
                <div class="input-element">
                    <label for="vaccine-name">Vaccine Name : </label>
                    <span><?php echo $row['Name']; ?></span>
                    <!-- <input type="text" id="vaccine-name" name="vaccine_name" value="<?php echo $row['Name']; ?>" required> -->
                </div>
                <div  class="input-element">
                    <label for="company-name">Company Name : </label>
                    <span><?php echo $row['CompanyName']; ?></span>
                    <!-- <input type="text" id="company-name" name="company_name" value="<?php echo $row['CompanyName']; ?>" required> -->
                </div>
                <div class="input-element">
                    <label for="doses-required">Doses Required : </label>
                    <span><?php echo $row['Doses']; ?></span>
                    <!-- <input type="number" id="doses-required" name="doses_required" value="<?php echo $row['Doses']; ?>" min="1" required> -->
                </div>
                <div class="input-element">
                    <label for="description">Description (optional) : </label>
                    <span><?php echo $row['Description']; ?></span>
                    <!-- <textarea id="description" name="description" rows="1" column="1"value="<?php echo $row['Description']; ?>"></textarea> -->
                </div>
                <div class="input-element">
                    <label for="availability">Number of Doses Available</label>
                    <input type="number" id="availability" name="availability"value="<?php echo $row['Availability']; ?>"  min="1" required>
                </div>
                <div class="input-element">
                    <label for="hold">Number of Doses on Hold</label>
                    <input type="number" id="hold" name="hold" value="<?php echo $row['OnHold']; ?>" min="1" required>
                </div>
                <div class = "submit-btn">
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