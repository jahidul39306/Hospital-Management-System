<?php 
    // $username = $_SESSION["username"];
    // $password = $_SESSION["password"];
    // define("TIMEBANK", "time-schedule.json");
    // $timeBank = json_decode(file_get_contents(TIMEBANK));
    $timeClash = false;
    
    

    $activity = $time = $scheduleType = "";
    $activityErr = $timeErr = $scheduleTypeErr = "";
    $hasErr = false; 
    $errMsg = "";
    $msg = "";


    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        if(isset($_POST["scheduleType"]) && $_POST["scheduleType"] == "select")
        {
            $scheduleTypeErr = "Choose a schedule type";
            $hasErr = true;
        }

        if(isset($_POST["activity"]) && $_POST["activity"] == "select")
        {
            $activityErr = "Choose a activity type";
            $hasErr = true;
        }

        if(isset($_POST["time"]) && $_POST["time"] == "select")
        {
            $timeErr = "Choose a time";
            $hasErr = true;
        }

        if(!$hasErr && $_POST["scheduleType"] == "add")
        {
            $activity = $_POST["activity"];
            $scheduleType = $_POST["scheduleType"];
            $time = $_POST["time"];

            if(!clash($time))
            {
                $timeActivity = array("activity" => $activity, "time" => $time);
                $timeBank[] = array("username" => $_SESSION["username"], "password" => $_SESSION["password"],
                                     "scheduleTime" => $timeActivity);
                
                $timeBank = json_encode($timeBank, JSON_PRETTY_PRINT);
                file_put_contents(TIMEBANK, $timeBank);
                $timeBank = json_decode(file_get_contents(TIMEBANK));
                $msg = "Time added successfully";
            }

            else{
                $errMsg = "Time adding failed. Time Clash";
            }
        }

        if(!$hasErr && $_POST["scheduleType"] == "update")
        {
            $activity = $_POST["activity"];
            $scheduleType = $_POST["scheduleType"];
            $time = $_POST["time"];
            $result = schedule_update($timeBank, $activity, $time);
            if($result)
            {
    
                $msg = "Time updated successfully";
            }
            else{
                $errMsg = "You have not added any activity in this time period";
            }

        }
    }


    function clash($time)
    {
        $data = json_decode(file_get_contents(TIMEBANK));
        if(!empty($data))
        {
            foreach($data as $obj)
            {
                if($obj -> username === $_SESSION["username"] && $obj -> password === $_SESSION["password"])
                {
                    if($obj -> scheduleTime -> time === $time)
                    {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    function schedule_update($data, $activity, $time)
    {
        if(!empty($data))
        {
            foreach($data as $obj)
            {
                if($obj -> username === $_SESSION["username"] && $obj -> password === $_SESSION["password"])
                {
                    if($obj -> scheduleTime -> time === $time)
                    {
                        $obj -> scheduleTime -> activity = $activity;
                        $data = json_encode($data, JSON_PRETTY_PRINT);
                        file_put_contents(TIMEBANK, $data);
                        return true;
                    }
                }
            }
        }
        return false;
    }
?>