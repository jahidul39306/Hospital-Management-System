<?php
    include "../controller/include/header.php";
    include "../controller/include/navigation.php";
    include "../controller/validation/prescriptionAction.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "css/prescription.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prescription</title>
    <script src = "js/prescription.js"></script>
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
    <div id = "flex-container-prescription">
        <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 
        <div id = "middle-prescription">
            <div id = "prescription-hospital">
                <i class="fas fa-hospital"></i>&nbsp;<span>AZN Hospital</span>
                <hr style="background-color:blue; height:2px">
            </div>
            <div id = "prescription-doctorInfo">
                <fieldset>
                <legend>Doctor Information: </legend>
                <br>
                <label for = "doctorName">Doctor Name: </label>
                <input type = "text" id = "doctorName" name = "doctorName" readonly value = "<?php echo $doctorname;?>">
                <br><br>
                <label for = "specialist">Specialist In: </label>
                <input type = "text" id = "specialist" name = "specialist" readonly value = "<?php echo $doctorspec;?>">
                <br><br>
                <label for = "doctorEmail">Email: </label>
                <input type = "text" id = "doctorEmail" name = "doctorEmail" readonly value = "<?php echo $doctorEmail ?? ''?>">
                <br><br>
                <label for = "doctorPhone">Phone: </label>
                <input type = "text" id = "doctorPhone" name = "doctorPhone" readonly value = "<?php echo $doctorPhone ?? ''?>">
                </fieldset>
            </div>
       
            <br>
            <div id = "prescription-patientInfo">
                <fieldset>
                <legend>Patient Information: </legend>
                <br>
                <label for = "patientName">Patient Name: </label>
                <input type = "text" id = "patientName" name = "patientName">
                &nbsp;&nbsp;
                <label for = "patientAge">Patient Age: </label>
                <input type = "text" id = "patientAge" name = "patientAge">
                &nbsp;&nbsp;
                <label for = "patientGender">Gender: </label>
                <input type = "text" id = "patientGender" name = "patientGender">
                &nbsp;&nbsp;
                <label for = "patientID">ID: </label>
                <input type = "text" id = "patientID" name = "patientID">
                </fieldset>
            </div>
            <hr style="background-color:blue; height:2px">
            <br>

            <div id = "prescription-medicine-tests">
                <fieldset>
                <legend>Medicine and Tests:</legend>
                <table border="1">
                    <!-- <div id = "prescription-medicine">
                        <p>Medicine</p>
                    </div>
                    <div id = "prescription-tests">
                        <p>Tests</p>
                    </div> -->
                <th>&nbsp;Medicine&nbsp;</th>
                <th>&nbsp;Tests&nbsp;</th>
                <tr>
                    <td>
                    <br>
                    &nbsp;&nbsp;
                    <label>Medicine: </label>
                    <input class = "medicine" list = "medicines" placeholder="none">&nbsp;&nbsp;
                    <select class = "timing">
                        <option value = "before">Before</option>
                        <option value = "after">After</option>
                    </select>
                    <label>meal</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;
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
                    <br><br>
                    
                    &nbsp;&nbsp;
                    <label>Medicine: </label>
                    <input class = "medicine" list = "medicines" placeholder="none">&nbsp;&nbsp;
                    <select class = "timing">
                        <option value = "before">Before</option>
                        <option value = "after">After</option>
                    </select>
                    <label>meal</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;
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
                
                    <br><br>
                
                    &nbsp;&nbsp;
                    <label>Medicine: </label>
                    <input class = "medicine" list = "medicines" placeholder="none">&nbsp;&nbsp;
                    <select class = "timing">
                        <option value = "before">Before</option>
                        <option value = "after">After</option>
                    </select>
                    <label>meal</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;
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
                    
                    <br><br>
                    &nbsp;&nbsp;
                    <label>Medicine: </label>
                    <input class = "medicine" list = "medicines" placeholder="none">&nbsp;&nbsp;
                    <select class = "timing">
                        <option value = "before">Before</option>
                        <option value = "after">After</option>
                    </select>
                    <label>meal</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;
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
                    <br><br>
                    
                    &nbsp;&nbsp;
                    <label>Medicine: </label>
                    <input class = "medicine" list = "medicines" placeholder="none">&nbsp;&nbsp;
                    <select class = "timing">
                        <option value = "before">Before</option>
                        <option value = "after">After</option>
                    </select>
                    <label>meal</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;
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
                
                    <br><br>
                
                    &nbsp;&nbsp;
                    <label>Medicine: </label>
                    <input class = "medicine" list = "medicines" placeholder="none">&nbsp;&nbsp;
                    <select class = "timing">
                        <option value = "before">Before</option>
                        <option value = "after">After</option>
                    </select>
                    <label>meal</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;
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
                    
                    <br><br>
                    
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
                    <br>
                    &nbsp;&nbsp;
                    <label class = "tests">Test: </label>
                    <input list = "tests" placeholder="none">&nbsp;&nbsp;
                    <br><br>

                    &nbsp;&nbsp;
                    <label class = "tests">Test: </label>
                    <input list = "tests" placeholder="none">&nbsp;&nbsp;
                    <br><br>

                    &nbsp;&nbsp;
                    <label class = "tests">Test: </label>
                    <input list = "tests" placeholder="none">&nbsp;&nbsp;
                    <br><br>

                    &nbsp;&nbsp;
                    <label class = "tests">Test: </label>
                    <input list = "tests" placeholder="none">&nbsp;&nbsp;
                    <br><br>

                    &nbsp;&nbsp;
                    <label class = "tests">Test: </label>
                    <input list = "tests" placeholder="none">&nbsp;&nbsp;
                    <br><br>

                    &nbsp;&nbsp;
                    <label class = "tests">Test: </label>
                    <input list = "tests" placeholder="none">&nbsp;&nbsp;
                    <br><br>

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
            </div>
            <div id = "prescription-doctorAdvice">
                <fieldset>
                <legend>Doctor advice:</legend>
                <br>
                <textarea rows="12"></textarea>
                </fieldset>
            </div>         
        </div>
        </form>
        
    </div>
    <div id = "printButton">
            <button onclick="printPrescription('middle-prescription');">Print</button>
    </div>
    <br><br>
    
    
</body>
</html>

<?php
    include "../controller/include/footer.php"; 
?>