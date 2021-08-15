<?php
    session_start();
    include "../model/DBquery.php";
    $doctorId = $_SESSION["doctor_id"];
    $timeSchedule = getTimeSchedule($doctorId);

    if($timeSchedule != null)
    {
        echo "<table>
        <tr>
            <th>Activity</th>
            <th>Time Start</th>
            <th>Time End</th>
            <th>Action</th>
        </tr>";
        foreach($timeSchedule as $time)
        {
            echo "<tr>";
            echo "<td>";  
            echo $time["doctor_activity"];
            echo "</td>";
            echo "<td>"; 
            echo date('h:i:s a', strtotime($time["doctor_timeStart"]));
            echo "</td>";
            echo "<td>"; 
            echo date('h:i:s a', strtotime($time["doctor_timeEnd"]));
            echo "</td>";
            echo "<td>"; 
            echo "<button class = 'deleteButton' type='button' name='deleteButton' onclick = 'deleteTimeSchedule(" . $time["doctor_timeSchedule_id"] . ");'>Delete</button>";
            echo "</td>";
            echo "</tr>";  
        }
                
        echo "</table>";
    }
    else{
        echo "Add time schedule";
    }
?>