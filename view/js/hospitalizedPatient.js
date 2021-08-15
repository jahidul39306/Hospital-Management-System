function showHospitalizedPatient()
{
    var XML = new XMLHttpRequest();
        XML.onload = function()
        {
            if(XML.status === 200)
            {
                document.getElementById("hospitalPatientTable").innerHTML = XML.responseText;
            }
        }
        XML.open("POST", "../controller/showHospitalized.php", true);
        XML.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        XML.send();
}