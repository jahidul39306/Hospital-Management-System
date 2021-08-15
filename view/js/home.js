function showTimeSchedule()
{
    var XML = new XMLHttpRequest();
    XML.onload = function()
    {
        if(XML.status === 200)
        {
            document.getElementById("showTimeSche").innerHTML = XML.responseText;
        }
    }
    XML.open("POST", "../controller/home-time-schedule.php", true);
    XML.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    XML.send();
}