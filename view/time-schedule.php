<?php

    include "../controller/include/header.php";
    include "../controller/include/navigation.php";
    include "../controller/validation/time-scheduleAction.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "css/time-schedule.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Schedule</title>
    <script src = "js/time-schedule.js"></script>
</head>
<body>
    <h1 id = "time-logo">Time Schedule</h1>         

    <div id = "time-flex-container">
        <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name = "timeScheduleForm">
        
            <div id = "time-fixer">
                <label for = "activity">Activity: </label>
                    <br>
                    <select name = "activity" id = "activity">
                        <option value = "select" <?php if(isset($_POST["activity"]) && $_POST["activity"] == "select") {echo "selected";}?>>--Select--</option>
                        <option value = "surgery"  <?php if(isset($_POST["activity"]) && $_POST["activity"] == "surgery") {echo "selected";}?>>Surgery</option>
                        <option value = "checkUp"  <?php if(isset($_POST["activity"]) && $_POST["activity"] == "checkUp") {echo "selected";}?>>Check Up</option>
                        <option value = "round" <?php if(isset($_POST["activity"]) && $_POST["activity"] == "round") {echo "selected";}?>>Round</option>
                        <option value = "rest" <?php if(isset($_POST["activity"]) && $_POST["activity"] == "rest") {echo "selected";}?>>Rest</option>
                    </select>
                    <span id = "activityTimeErr" class = "error" style = "color:red">&nbsp; *<?php echo $activityErr; ?></span>
                <br><br>
                <label for = "start-time:">Start Time: </label>
                <br>
                <input type = "time" id = "startTime" name = "startTime">
                <span  id = "startTimeErr" class = "error" style = "color:red">&nbsp; *<?php echo $activityErr; ?></span>
                <br><br>
                <label for = "end-time:">End Time: </label>
                <br>
                <input type = "time" id = "endTime" name = "endTime">
                <span  id = "endTimeErr" class = "error" style = "color:red">&nbsp; *<?php echo $activityErr; ?></span>
                
                <div class = "time-button">
                    <button id = "time-add" type="button" name="addButton" onclick = "addTime();">Add Time</button>
                </div>
            </div>
        </form>
    </div>
        <div class = "showMsg">
            <p style="color:red"><?php echo $errMsg;?></p>
            <p style="color:green"><?php echo $msg;?></p>
            <div id = "msg"></div>
        </div>
        <br><br><br>
        <div id = "timeScheduleTable">
            <script>showTimeSchedule();</script>
        </div>
        
</body>
</html>

<?php
    include "../controller/include/footer.php"; 
?>