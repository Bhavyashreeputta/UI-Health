<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="./dashboard.css">
    <title>Admin</title>
</head>
<body>
    <?php include './sidebar.html'; ?>
    <div class='main' id="main-content">
        <h2>Vaccine Lists</h2>
        <?php
        include '../config.php';
        $sql = "SELECT * FROM vaccine ";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
        if(mysqli_num_rows($result) > 0){
        ?>
        <table cellpadding="5px">
        <thead>
        <th>Vaccine ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Company Name</th>
        <th>Doses</th>
        <th>Availability</th>
        <th>Hold</th>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
        <td class="vaccineID"><?php echo $row['VaccineID']; ?></td>
        <td><?php echo $row['Name']; ?></td>
        <td><?php echo $row['Description']; ?></td>
        <td><?php echo $row['CompanyName']; ?></td>
        <td><?php echo $row['Doses']; ?></td>
        <td><?php echo $row['Availability']; ?></td>
        <td><?php echo $row['OnHold']; ?></td>
        <td class="links">
        <a href='./updateVaccine.php?update_no=<?php echo $row['VaccineID']; ?>' class="edit">Update</a>
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
</body>
</html>