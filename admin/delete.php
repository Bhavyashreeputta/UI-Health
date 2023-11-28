<?php
    include '../config.php';
    if(isset($_GET['employee_id'])){
        $id = $_GET['employee_id'];

        $deleteSchedulingQuery = "DELETE FROM nursescheduling WHERE EmployeeID=$id";
        $resultScheduling = mysqli_query($conn, $deleteSchedulingQuery);

        if ($resultScheduling) {
            $deleteNurseQuery = "DELETE FROM nurse WHERE EmployeeID=$id";
            $resultNurse = mysqli_query($conn, $deleteNurseQuery);

            if($resultNurse){
                header("Location: nurseview.php");
                exit();
            } else {
                die(mysqli_error($conn));
            }
        } else {
            die(mysqli_error($conn));
        }
    }
    mysqli_close($conn);
?>