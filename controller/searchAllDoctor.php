<?php
    include "../model/DBquery.php";
    $doctors = searchAllDoctor();
    if($doctors != null)
    {
        echo "<table>
        <tr>
            <th>Doctor name</th>
            <th>Specialist in</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
        </tr>";
        foreach($doctors as $doctor)
        {
            echo "<tr>";
            echo "<td>";  
            echo $doctor["doctor_firstName"] . "&nbsp" . $doctor["doctor_lastName"];
            echo "</td>";
            echo "<td>"; 
            echo $doctor["doctor_speciality"];
            echo "</td>";
            echo "<td>"; 
            echo $doctor["doctor_gender"];
            echo "</td>";
            echo "<td>"; 
            echo $doctor["doctor_email"];
            echo "</td>";
            echo "<td>"; 
            echo $doctor["doctor_phone"];
            echo "</td>";
            echo "<td>"; 
            echo $doctor["doctor_website"];
            echo "</td>";
            echo "</tr>";  
        }
                
        echo "</table>";
    }
    else{
        echo "No doctor has added";
    }

?>