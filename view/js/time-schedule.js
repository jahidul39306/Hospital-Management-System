function addTime()
{
    var valid = true;
    var activity = document.forms["timeScheduleForm"]["activity"].value;
    var startTime = document.forms["timeScheduleForm"]["startTime"].value;
    var endTime = document.forms["timeScheduleForm"]["endTime"].value;

    document.getElementById("activityTimeErr").innerHTML = "";
    document.getElementById("startTimeErr").innerHTML = "";
    document.getElementById("endTimeErr").innerHTML = "";

    if(activity === "select")
    {
        valid = false;
        document.getElementById("activityTimeErr").innerHTML = "Select a activity time";
    }
    if(startTime === "")
    {
        valid = false;
        document.getElementById("startTimeErr").innerHTML = "Select a start time";
    }
    if(endTime === "")
    {
        valid = false;
        document.getElementById("endTimeErr").innerHTML = "Select a end time";
    }

    if(startTime >= endTime && valid)
    {
        valid = false;
        document.getElementById("msg").innerHTML = "Invalid time input. Start time is greater than end time";
    }
    
    if(valid)
    {
        var XML = new XMLHttpRequest();
        XML.onload = function()
        {
            if(XML.status === 200)
            {
                document.getElementById("msg").innerHTML = XML.responseText;
            }
        }
        XML.open("POST", "../controller/timeScheduleAdd.php", true);
        XML.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        XML.send("activity=" +activity + "&startTime=" +startTime + "&endTime=" +endTime);
        showTimeSchedule();
    }
    

}

function showTimeSchedule()
{
    var XML = new XMLHttpRequest();
    XML.onload = function()
    {
        if(XML.status === 200)
        {
            document.getElementById("timeScheduleTable").innerHTML = XML.responseText;
        }
    }
    XML.open("POST", "../controller/timeScheduleShow.php", true);
    XML.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    XML.send();
}

function deleteTimeSchedule(scheduleId)
{
    var XML = new XMLHttpRequest();
    XML.onload = function()
    {
        if(XML.status === 200)
        {
            document.getElementById("msg").innerHTML = XML.responseText;
        }
    }
    XML.open("POST", "../controller/timeScheduleDelete.php", true);
    XML.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    XML.send("scheduleId=" +scheduleId);
    showTimeSchedule();
}