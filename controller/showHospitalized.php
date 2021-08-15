<?php
    session_start();
    include "../model/DBquery.php";
    $doctorId = $_SESSION["doctor_id"];
    $hospitalizedPatient = showHospitalizedPatient($doctorId);

    if($hospitalizedPatient != null)
    {
        echo "<table>
        <tr>
            <th>Cabin number</th>
            <th>Patient ID</th>
            <th>Cabin type</th>
            
        </tr>";
        foreach($hospitalizedPatient as $patient)
        {
            echo "<tr>";
            echo "<td>";  
            echo $patient["cabin_no"];
            echo "</td>";
            echo "<td>"; 
            echo $patient["cabin_bookingBy"];
            echo "</td>";
            echo "<td>"; 
            echo $patient["cabin_type"];
            echo "</td>";
            echo "</tr>";  
        }
                
        echo "</table>";
    }
    else{
        echo "No hospitalized patient";
    }
?>