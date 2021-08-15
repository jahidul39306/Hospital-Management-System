function isValid()
{
    var valid = true;
    var firstName = document.forms["registrationForm"]["fname"].value;
    var lastName = document.forms["registrationForm"]["lname"].value;
    var gender = document.forms["registrationForm"]["gender"].value;
    var specialist = document.forms["registrationForm"]["specialist"].value;
    var username = document.forms["registrationForm"]["username"].value;
    var password = document.forms["registrationForm"]["password"].value;
    var confirmPassword = document.forms["registrationForm"]["confirmPassword"].value;

    document.getElementById("fnameErr").innerHTML = "";
    document.getElementById("lnameErr").innerHTML = "";
    document.getElementById("genderErr").innerHTML = "";
    document.getElementById("specialistErr").innerHTML = "";
    document.getElementById("usernameErr").innerHTML = "";
    document.getElementById("passwordErr").innerHTML = "";
    document.getElementById("confirmPasswordErr").innerHTML = "";

    var namePattern =  /^[A-Za-z ]+$/;

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
    if(specialist === "select")
    {
        valid = false;
        document.getElementById("specialistErr").innerHTML = " Please select a speciality JS";
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

    if(password === "")
    {
        valid = false;
        document.getElementById("passwordErr").innerHTML = " Password field is empty JS";
    }
    if(!(password === "") && password.length < 5)
    {
        valid = false;
        document.getElementById("passwordErr").innerHTML = " Password must be minimum 5 characters JS";
    }

    if(confirmPassword != password)
    {
        valid = false;
        document.getElementById("confirmPasswordErr").innerHTML = " Password does not match JS";
    }

    // if(valid)
    // {
    //     addDoctor(firstName, lastName, gender, specialist, username, password, confirmPassword);
    // }
    return valid;
}


function addDoctor(fname, lname, gender, specialist, username, password, confirmPassword)
{
    console.log("i am from is addDoctor()");

    var XML = new XMLHttpRequest();
    // XML.onload = function()
    // {
    //     if(XML.status === 200)
    //     {
    //         document.getElementById("check").innerHTML = XML.responseText;
    //     }
    // }
    XML.open("POST", "../controller/validation/registrationAction.php", true);
    XML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    XML.send("fname=" +fname + "&lname=" +lname + "&gender=" +gender + "&specialist=" +specialist
                + "&username=" +username + "&password=" +password + "&confirmPassword=" +confirmPassword);

}