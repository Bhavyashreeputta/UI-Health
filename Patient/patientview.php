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
        <h2>Nurse Lists</h2>
        <?php
        include '../config.php';
        $sql = "SELECT * FROM patient ";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
        if(mysqli_num_rows($result) > 0){
        ?>
        <table cellpadding="5px">
        <thead>
        <th>Employee ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Update/Delete</th>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
        <td><?php echo $row['SSN']; ?></td>
        <td><?php echo $row['FName'].''.$row['MI'].''.$row['LName']; ?></td>
        <td><?php echo $row['Phone']; ?></td>
        <td class="links">
        <a href='./updatepatient.php?update_no=<?php echo $row['SSN']; ?>' class="edit">Update</a>
        <a href='delete.php?SSN=<?php echo $row['SSN']; ?>' class="delete">Delete</a>
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