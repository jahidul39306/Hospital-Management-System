<?php
    session_start();
    include "../model/DBquery.php";
    $valid = true;
    $startTime = $_POST["startTime"];
    $endTime = $_POST["endTime"];
    $activity = $_POST["activity"];
    $doctorId = $_SESSION["doctor_id"];
    $timeSchedule = getTimeSchedule($doctorId);

    foreach($timeSchedule as $time)
    {
        if($startTime > $time["doctor_timeStart"] && $startTime < $time["doctor_timeEnd"])
        {
            $valid = false;
        }

        if($endTime > $time["doctor_timeStart"] && $endTime < $time["doctor_timeEnd"])
        {
            $valid = false;
        }

        if($startTime < $time["doctor_timeStart"] && $endTime > $time["doctor_timeEnd"])
        {
            $valid = false;
        }
    }

    if($valid)
    {
        $result = addTimeSchedule($doctorId, $activity, $startTime, $endTime);
        If($result)
        {
            echo "Time added successfully";
        }
        else{
            echo "Time added failed";
        }
    }
    else{
        echo "Time clash, change or delete time";
    }
?>
