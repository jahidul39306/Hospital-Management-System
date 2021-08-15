function isValid()
{
    var valid = true;
    var firstName = document.forms["editProfileForm"]["fname"].value;
    var lastName = document.forms["editProfileForm"]["lname"].value;
    var gender = document.forms["editProfileForm"]["gender"].value;
    var dob = document.forms["editProfileForm"]["dob"].value;
    var religion = document.forms["editProfileForm"]["religion"].value;
    var specialist = document.forms["editProfileForm"]["specialist"].value;

    var presAddress = document.forms["editProfileForm"]["presAddress"].value;
    var permAddress = document.forms["editProfileForm"]["permAddress"].value;
    var phone = document.forms["editProfileForm"]["phone"].value;
    var email = document.forms["editProfileForm"]["email"].value;
    var website = document.forms["editProfileForm"]["website"].value;

    var username = document.forms["editProfileForm"]["username"].value;

    document.getElementById("fnameErr").innerHTML = "";
    document.getElementById("lnameErr").innerHTML = "";
    document.getElementById("genderErr").innerHTML = "";
    document.getElementById("dobErr").innerHTML = "";
    document.getElementById("religionErr").innerHTML = "";
    document.getElementById("specialistErr").innerHTML = "";
    document.getElementById("phoneErr").innerHTML = "";
    document.getElementById("emailErr").innerHTML = "";
    document.getElementById("usernameErr").innerHTML = "";

    var namePattern =  /^[A-Za-z ]+$/;
    var phonePattern = /(^0{1}[0-9]{10}|^(\+880){1}[0-9]{10})/;
    var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if(firstName === "")
    {
        valid = false;
        document.getElementById("fnameErr").innerHTML = " First name field is empty JS";
    }

    if(!(namePattern.test(firstName)) && !(firstName === ""))
    {
        valid = false;
        document.getElementById('fnameErr').innerHTML = " First name can only contain alphabets JS";
    }

    if(lastName === "")
    {
        valid = false;
        document.getElementById("lnameErr").innerHTML = " Last name field is empty JS";
    }

    if(!(namePattern.test(lastName)) && !(lastName === ""))
    {
        valid = false;
        document.getElementById('lnameErr').innerHTML = " Last name can only contain alphabets JS";
    }

    if(gender === "")
    {
        valid = false;
        document.getElementById("genderErr").innerHTML = " Gender field is empty JS";
    }
    if(dob === "")
    {
        valid = false;
        document.getElementById("dobErr").innerHTML = " Date of birth field is empty JS";
    }
    if(religion === "select")
    {
        valid = false;
        document.getElementById("religionErr").innerHTML = " Religion field is empty JS";
    }
    if(specialist === "select")
    {
        valid = false;
        document.getElementById("specialistErr").innerHTML = " Please select a speciality JS";
    }
    if(!(phone === "") && !(phonePattern.test(phone)))
    {
        valid = false;
        document.getElementById("phoneErr").innerHTML = "Invalid phone number JS";
    }
    if(!(email === "") && !(emailPattern.test(email)))
    {
        valid = false;
        document.getElementById("emailErr").innerHTML = "Invalid email JS";
    }
    if(username === "")
    {
        valid = false;
        document.getElementById("usernameErr").innerHTML = " User name field is empty JS";
    }

    if(!(username === "") && username.length < 6)
    {
        valid = false;
        document.getElementById("usernameErr").innerHTML = " User name must be minimum 6 characters";
    }

    return valid;
}

// function getProfileData()
// {  
//     console.log("Hello"); 
//     var doctor;
//     var XML = new XMLHttpRequest();
//     XML.onload = function()
//     {
//         if(XML.status === 200)
//         {
//             doctor = XML.responseText;
//         } 
//     }

//     XML.open("POST", "../controller/getProfileData.php", true);
//     XML.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     XML.send();






//     // var valid = true;
//     // var firstName = document.forms["editProfileForm"]["fname"].value;
//     // var lastName = document.forms["editProfileForm"]["lname"].value;
//     // var gender = document.forms["editProfileForm"]["gender"].value;
//     // var dob = document.forms["editProfileForm"]["dob"].value;
//     // var religion = document.forms["editProfileForm"]["religion"].value;
//     // var specialist = document.forms["editProfileForm"]["specialist"].value;

//     // var presAddress = document.forms["editProfileForm"]["presAddress"].value;
//     // var permAddress = document.forms["editProfileForm"]["permAddress"].value;
//     // var phone = document.forms["editProfileForm"]["phone"].value;
//     // var email = document.forms["editProfileForm"]["email"].value;
//     // var website = document.forms["editProfileForm"]["website"].value;

//     // var username = document.forms["editProfileForm"]["username"].value;
// }