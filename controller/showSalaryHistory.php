<?php
    session_start();
    include "../model/DBquery.php";
    $doctorId = $_SESSION["doctor_id"];
    $salaryHistory = showSalaryHistory($doctorId);
    if($salaryHistory != null)
    {
        echo "<table>
        <tr>
            <th>Transaction type</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Account number</th>
        </tr>";
        foreach($salaryHistory as $history)
        {
            echo "<tr>";
            echo "<td>";  
            echo $history["transactionType"];
            echo "</td>";
            echo "<td>"; 
            echo $history["amount"];
            echo "</td>";
            echo "<td>"; 
            echo $history["transactionDate"];
            echo "</td>";
            echo "<td>"; 
            echo $history["account_number"];
            echo "</td>";
            echo "</tr>";  
        }
                
        echo "</table>";
    }
    else{
        echo "No transaction happend";
    }
?>