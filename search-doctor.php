<?php
    include "header.php";
    include "navigation.php";

    define("DOCTOR_INFO", "doctor-info.json");
    $doctorInfo = json_decode(file_get_contents(DOCTOR_INFO));
    $search;


    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search-doctor</title>
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
    <h1>Search Doctor</h1>
    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
        <br>
        <label for = "searchDoctor">Search Doctor: </label>
            <select name = "searchDoctor" id = "searchDoctor">
                <option value = "allergy_and_immunology" <?php if(isset($_POST["searchDoctor"]) && $_POST["searchDoctor"] == "allergy_and_immunology") {echo "selected";}?>>Allergy and immunology</option>
                <option value = "dermatology" <?php if(isset($_POST["searchDoctor"]) && $_POST["searchDoctor"] == "dermatology") {echo "selected";}?>>Dermatology</option>
                <option value = "emergency_medicine" <?php if(isset($_POST["searchDoctor"]) && $_POST["searchDoctor"] == "emergency_medicine") {echo "selected";}?>>Emergency medicine</option>
                <option value = "family_medicine" <?php if(isset($_POST["searchDoctor"]) && $_POST["searchDoctor"] == "family_medicine") {echo "selected";}?>>Family medicine</option>
                <option value = "neurology" <?php if(isset($_POST["searchDoctor"]) && $_POST["searchDoctor"] == "neurology") {echo "selected";}?>>Neurology</option>
                <option value = "pathology" <?php if(isset($_POST["searchDoctor"]) && $_POST["searchDoctor"] == "pathology") {echo "selected";}?>>Pathology</option>
                <option value = "psychiatry" <?php if(isset($_POST["searchDoctor"]) && $_POST["searchDoctor"] == "psychiatry") {echo "selected";}?>>Psychiatry</option>
                <option value = "urology" <?php if(isset($_POST["searchDoctor"]) && $_POST["searchDoctor"] == "urology") {echo "selected";}?>>Urology</option>
            </select>
        &nbsp;&nbsp;
        <input type = "submit" value = "Search">

        <br><br><br>

        <?php
            if($_SERVER["REQUEST_METHOD"] === "POST")
            {
                $search = test_input($_POST["searchDoctor"]);
                echo "<table border = '1' style=\"width:30%\">
                <tr>
                    <th>Doctor name</th>
                    <th>Specialist in</th>
                    <th>Contact</th>
                </tr>";
                if(!empty($doctorInfo))
                {
                    foreach($doctorInfo as $data)
                    {
                        if($data->specialist == $search)
                        {
                            echo "<tr>";
                            echo "<td>";  
                            echo $data -> fname . "&nbsp" . $data -> lname;
                            echo "</td>";
                            echo "<td>"; 
                            echo $data -> specialist;
                            "</td>";
                            echo "<td>"; 
                            echo $data -> phone . "<br>" . $data -> email;
                            "</td>";
                            echo "</tr>";
                        }
                    
                    }
                }
            echo "</table>"; 
            }
            
        ?>

    </form>
</body>
</html>
<?php
include "footer.php";
?>