<?php
    include "header.php";
    include "navigation.php";
    define("DOCTOR_INFO", "doctor-info.json");
    $doctorInfo = json_decode(file_get_contents(DOCTOR_INFO));

    $doctorName = $specialist = $doctorEmail = $doctorPhone = "";
    $doctor = searchDoctor($doctorInfo, $_SESSION["username"], $_SESSION["password"]);
    $doctorName = $doctor->fname . "&nbsp;" . $doctor->lname;
    $specialist = $doctor->specialist;
    $doctorEmail = $doctor->email;
    $doctorPhone = $doctor->phone;

    $patientName = "Jamal hasan";
    $patientAge = 45;
    $patientGender = "male";
    $patientID = 1258963; 

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
    <title>prescription</title>
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
    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <hr style="background-color:blue; height:2px">
        <fieldset>
        <legend>Doctor Information: </legend>
        <label for = "doctorName">Doctor Name: </label>
        <input type = "text" id = "doctorName" name = "doctorName" readonly value = <?php echo $doctorName?>>
        <br><br>
        <label for = "specialist">Specialist In: </label>
        <input type = "text" id = "specialist" name = "specialist" readonly value = <?php echo $specialist?>>
        <br><br>
        <label for = "doctorEmail">Email: </label>
        <input type = "text" id = "doctorEmail" name = "doctorEmail" readonly value = <?php echo $doctorEmail?>>
        <br><br>
        <label for = "doctorPhone">Phone: </label>
        <input type = "text" id = "doctorPhone" name = "doctorPhone" readonly value = <?php echo $doctorPhone?>>
        </fieldset>
        <br>

        <fieldset>
        <legend>Patient Information: </legend>
        <label for = "patientName">Patient Name: </label>
        <input type = "text" id = "patientName" name = "patientName" readonly value = <?php echo $patientName?>>
        &nbsp;&nbsp;
        <label for = "patientAge">Patient Age: </label>
        <input type = "text" id = "patientAge" name = "patientAge" readonly value = <?php echo $patientAge?>>
        &nbsp;&nbsp;
        <label for = "patientGender">Gender: </label>
        <input type = "text" id = "patientGender" name = "patientGender" readonly value = <?php echo $patientGender?>>
        &nbsp;&nbsp;
        <label for = "patientID">ID: </label>
        <input type = "text" id = "patientID" name = "patientID" readonly value = <?php echo $patientID?>>
        </fieldset>
        <hr style="background-color:blue; height:2px">
        <br>
        <fieldset>
        <legend>Medicine and Tests:</legend>
        <table border="1">
        <th>&nbsp;Medicine&nbsp;</th>
        <th>&nbsp;Tests&nbsp;</th>
        <tr>
            <td>
            <br>
            &nbsp;&nbsp;
            <label>Medicine: </label>
            <input list = "medicines" placeholder="none">&nbsp;&nbsp;
            <select>
                <option value = "before">Before</option>
                <option value = "after">After</option>
            </select>
            <label>meal</label>
            &nbsp;&nbsp;
            <label>Quantity: </label>
            <select name = "quantity" id = "quantity">
                <option value = "0+0+1">0+0+1</option>
                <option value = "0+1+1">0+1+1</option>
                <option value = "1+0+1">1+0+1</option>
                <option value = "0+1+0">0+1+0</option>
                <option value = "1+1+0">1+1+0</option>
                <option value = "1+0+0">1+0+0</option>
                <option value = "1+1+1">1+1+1</option>
            </select>
            &nbsp;&nbsp;
            <br><br>
            
            &nbsp;&nbsp;
            <label>Medicine: </label>
            <input list = "medicines" placeholder="none">&nbsp;&nbsp;
            <select>
                <option value = "before">Before</option>
                <option value = "after">After</option>
            </select>
            <label>meal</label>
            &nbsp;&nbsp;
            <label>Quantity: </label>
            <select name = "quantity" id = "quantity">
                <option value = "0+0+1">0+0+1</option>
                <option value = "0+1+1">0+1+1</option>
                <option value = "1+0+1">1+0+1</option>
                <option value = "0+1+0">0+1+0</option>
                <option value = "1+1+0">1+1+0</option>
                <option value = "1+0+0">1+0+0</option>
                <option value = "1+1+1">1+1+1</option>
            </select>
            &nbsp;&nbsp;
            <br><br>
        
            &nbsp;&nbsp;
            <label>Medicine: </label>
            <input list = "medicines" placeholder="none">&nbsp;&nbsp;
            <select>
                <option value = "before">Before</option>
                <option value = "after">After</option>
            </select>
            <label>meal</label>
            &nbsp;&nbsp;
            <label>Quantity: </label>
            <select name = "quantity" id = "quantity">
                <option value = "0+0+1">0+0+1</option>
                <option value = "0+1+1">0+1+1</option>
                <option value = "1+0+1">1+0+1</option>
                <option value = "0+1+0">0+1+0</option>
                <option value = "1+1+0">1+1+0</option>
                <option value = "1+0+0">1+0+0</option>
                <option value = "1+1+1">1+1+1</option>
            </select>
            &nbsp;&nbsp;
            <br><br>
            
            <button onclick = "">Add more medicines</button>
            
            <datalist id = "medicines">
                <option value="Flexi">
                <option value="Tylace">
                <option value="Virux">
                <option value="Virux Tablet">
                <option value="Virux Injection">
                <option value="Fona">
                <option value="Geston">
                <option value="Entacyd">
                <option value="Napa">
                <option value="Entacyd Plus">
            </td>


            <td>
            &nbsp;&nbsp;
            <label>Test: </label>
            <input list = "tests" placeholder="none">&nbsp;&nbsp;
            <br><br>

            &nbsp;&nbsp;
            <label>Test: </label>
            <input list = "tests" placeholder="none">&nbsp;&nbsp;
            <br><br>

            &nbsp;&nbsp;
            <label>Test: </label>
            <input list = "tests" placeholder="none">&nbsp;&nbsp;
            <br><br>

            <button onclick = "">Add more tests</button>

            <datalist id = "tests">
                <option value="Blood count">
                <option value="Blood typing">
                <option value="Bone marrow aspiration">
                <option value="Enzyme analysis">
                <option value="Glucose tolerance test">
                <option value="Thymol turbidity">
                <option value="Pregnancy test">
                <option value="Cholecystography">
                <option value="Complementation test">
                <option value="Autopsy"> 
            </td>
        </tr>
        </table>
        </fieldset>
        <br>
        <fieldset>
        <legend>Doctor advice:</legend>
        <br>
        <textarea rows="15" cols="200"></textarea>
        <br><br>
        </fieldset>
        <br><br>
        <button onclick="window.print('fieldset');">Print</button>
    </form>
</body>
</html>

<?php
    function addMedicineRow()
    {
        echo '<br><br>
        
        &nbsp;&nbsp;
        <label>Medicine: </label>
        <input list = "medicines" placeholder="none">&nbsp;&nbsp;
        <select>
            <option value = "before">Before</option>
            <option value = "after">After</option>
        </select>
        <label>meal</label>
        &nbsp;&nbsp;
        <label>Quantity: </label>
        <select name = "quantity" id = "quantity">
            <option value = "0+0+1">0+0+1</option>
            <option value = "0+1+1">0+1+1</option>
            <option value = "1+0+1">1+0+1</option>
            <option value = "0+1+0">0+1+0</option>
            <option value = "1+1+0">1+1+0</option>
            <option value = "1+0+0">1+0+0</option>
            <option value = "1+1+1">1+1+1</option>
        </select>
        &nbsp;&nbsp;
        <br><br>';
    }
    include "footer.php";

?>