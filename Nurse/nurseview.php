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
    <div class='main' id="main-content">
        <h2>Nurse Lists</h2>
        <?php
        include '../config.php';
        $sql = "SELECT * FROM nurse ";
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
        <td><?php echo $row['EmployeeID']; ?></td>
        <td><?php echo $row['FirstName'].''.$row['MiddleInitial'].''.$row['LastName']; ?></td>
        <td><?php echo $row['Phone']; ?></td>
        <td class="links">
        <a href='./updateNurse.php?update_no=<?php echo $row['EmployeeID']; ?>' class="edit">Update</a>
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
</body>
</html>