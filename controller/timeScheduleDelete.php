<?php
    session_start();
    include "../model/DBquery.php";
    $scheduleId = $_POST["scheduleId"];
    $result = deleteTimeSchedule($scheduleId);
    if($result)
    {
        echo "Deleted successfully";
    }
    else{
        echo "Failed to delete";
    }
?>