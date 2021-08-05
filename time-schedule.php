<?php


    include "header.php";
    include "navigation.php";

    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    define("TIMEBANK", "time-schedule.json");
    $timeBank = json_decode(file_get_contents(TIMEBANK));
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Schedule</title>
    <style>
        table {
        border-collapse: collapse;
}
th {
  height: 70px;
}

</style>
</head>
<body>
    <h1>Time Schedule</h1>         

    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <label for = "scheduleType">Schedule Type: </label>
            <select name = "scheduleType" id = "scheduleType">
                <option value = "select" <?php if(isset($_POST["scheduleType"]) && $_POST["scheduleType"] == "select") {echo "selected";}?>>--Select--</option>
                <option value = "add"  <?php if(isset($_POST["scheduleType"]) && $_POST["scheduleType"] == "add") {echo "selected";}?>>Add</option>
                <option value = "update"  <?php if(isset($_POST["scheduleType"]) && $_POST["scheduleType"] == "update") {echo "selected";}?>>Update</option>              
            </select>
            <span class = "error" style = "color:red">&nbsp; *<?php echo $scheduleTypeErr; ?></span>

        &nbsp;&nbsp;&nbsp;

        <label for = "activity">Activity: </label>
            <select name = "activity" id = "activity">
                <option value = "select" <?php if(isset($_POST["activity"]) && $_POST["activity"] == "select") {echo "selected";}?>>--Select--</option>
                <option value = "surgery"  <?php if(isset($_POST["activity"]) && $_POST["activity"] == "surgery") {echo "selected";}?>>Surgery</option>
                <option value = "checkUp"  <?php if(isset($_POST["activity"]) && $_POST["activity"] == "checkUp") {echo "selected";}?>>Check Up</option>
                <option value = "round" <?php if(isset($_POST["activity"]) && $_POST["activity"] == "round") {echo "selected";}?>>Round</option>
                <option value = "rest" <?php if(isset($_POST["activity"]) && $_POST["activity"] == "rest") {echo "selected";}?>>Rest</option>
            </select>
            <span class = "error" style = "color:red">&nbsp; *<?php echo $activityErr; ?></span>
            
        &nbsp;&nbsp;&nbsp;

        <label for = "time">Time: </label>
            <select name = "time" id = "time">
                <option value = "select" <?php if(isset($_POST["time"]) && $_POST["time"] == "selest") {echo "selected";}?>>--Select--</option>
                <option value = "10:00am - 12:00pm" <?php if(isset($_POST["time"]) && $_POST["time"] == "10:00am - 12:00pm") {echo "selected";}?>>10:00am - 12:00pm</option>
                <option value = "12:00pm - 2:00pm" <?php if(isset($_POST["time"]) && $_POST["time"] == "12:00pm - 2:00pm") {echo "selected";}?>>12:00pm - 2:00pm</option>
                <option value = "2:00pm - 4:00pm" <?php if(isset($_POST["time"]) && $_POST["time"] == "2:00pm - 4:00pm") {echo "selected";}?>>2:00pm - 4:00pm</option>
                <option value = "4:00pm - 6:00pm" <?php if(isset($_POST["time"]) && $_POST["time"] == "4:00pm - 6:00pm") {echo "selected";}?>>4:00pm - 6:00pm</option>
                <option value = "6:00pm - 8:00pm" <?php if(isset($_POST["time"]) && $_POST["time"] == "6:00pm - 8:00pm") {echo "selected";}?>>6:00pm - 8:00pm</option>
                <option value = "8:00pm - 10:00pm" <?php if(isset($_POST["time"]) && $_POST["time"] == "8:00pm - 10:00pm") {echo "selected";}?>>8:00pm - 10:00pm</option>
            </select>
            <span class = "error" style = "color:red">&nbsp; *<?php echo $timeErr; ?></span>
        <br><br>
        <input type = "submit" value = "Add/Update">
    </form>
    <br>
    <p style="color:red"><?php echo $errMsg;?></p>
    <p style="color:green"><?php echo $msg;?></p>

    <br><br>

</body>
</html>

<?php
    echo "<table border = '1' style=\"width:30%\">
    <tr>
        <th>Activity</th>
        <th>Time</th>
    </tr>";
    if(!empty($timeBank))
    {
        foreach($timeBank as $data)
        {
            if($data -> username === $_SESSION["username"] && $data -> password === $_SESSION["password"])
            {
                echo "<tr>";
                echo "<td>";  
                echo $data -> scheduleTime -> activity;
                echo "</td>";
                echo "<td>"; 
                echo $data -> scheduleTime -> time;
                "</td>";
                echo "</tr>";
            }
            
        
        }
    }
    echo "</table>";           

?>
<?php
    include "footer.php";
?>