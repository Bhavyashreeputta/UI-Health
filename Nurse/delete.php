<?php
    include '../config.php';
    if(isset($_GET['slot_id'])){
        $id = $_GET['slot_id'];

        $deleteSchedulingQuery = "DELETE FROM nursescheduling WHERE SlotID=$id";
        $resultScheduling = mysqli_query($conn, $deleteSchedulingQuery);

        if ($resultScheduling) {
            $deleteNurseQuery = "DELETE FROM nursescheduling WHERE SlotID=$id";
            $resultNurse = mysqli_query($conn, $deleteNurseQuery);

            if($resultNurse){
                header("Location: scheduleList.php");
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