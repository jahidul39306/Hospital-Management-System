<?php
    include "header.php";
    include "navigation.php";

    $username = $_SESSION["username"];
    $password = $_SESSION["password"];

    define("DOCTOR_INFO", "doctor-info.json");
    $doctorInfo = json_decode(file_get_contents(DOCTOR_INFO));

    $doctor = searchDoctor($doctorInfo, $username, $password);
    $doctorName = $doctor->fname . "&nbsp;" . $doctor->lname;
    define("TIMEBANK", "time-schedule.json");
    $timeBank = json_decode(file_get_contents(TIMEBANK));



    function searchDoctor($doctorInfo, $username, $password)
    {
        foreach($doctorInfo as $obj)
        {
            if($obj->username === $username && $obj->password === $password)
            {
                return $obj;
            }
        }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <h2 style="color:green">Welcome, <?php echo $doctorName ?></h2>
    <fieldset>
    <legend>Todays time schedule:</legend>
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
    </fieldset>
    <br><br>
    <fieldset>
    <legend></legend>
    <table border = '1' style="width:30%">
    <tr style="background-color: brown;">
        <td>
            <h2>Hospitalized patient: 3</h2>
        </td>
    </tr>
    <tr style="background-color: Aquamarine;">
        <td>
            <h2>Number of surgery today: 2</h2>
        </td>
    </tr>
    <tr style="background-color: Crimson;">
        <td>
            <h2>Emergency patient: 3</h2>
        </td>
    </tr>
    <tr style="background-color: CornflowerBlue;">
        <td>
            <h2>Regular patient: 2</h2>
        </td>
    </tr>
    </table>
    </fieldset>

</body>
</html>
<?php
    include "footer.php";
?>