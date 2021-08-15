function searchDoctor()
{
    var search = document.forms["searchDoctorForm"]["search"].value; 
    var XML = new XMLHttpRequest();
    XML.onload = function()
    {
        if(XML.status === 200)
        {
            document.getElementById("doctorTable").innerHTML = XML.responseText;
        }
    }
    XML.open("POST", "../controller/searchDoctorSpe.php", true);
    XML.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    XML.send("search=" +search);
}

function searchAllDoctor()
{
    var XML = new XMLHttpRequest();
    XML.onload = function()
    {
        if(XML.status === 200)
        {
            document.getElementById("doctorTable").innerHTML = XML.responseText;
        }
    }
    XML.open("POST", "../controller/searchAllDoctor.php", true);
    XML.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    XML.send();  
    

}