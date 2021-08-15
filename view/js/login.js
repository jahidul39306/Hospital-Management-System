function isValid()
{
    var valid = true;
    var username = document.forms["loginForm"]["username"].value;
    var password = document.forms["loginForm"]["password"].value;
    document.getElementById("usernameErr").innerHTML = "";
    document.getElementById("passwordErr").innerHTML = "";

    if(username === "")
    {
        valid = false;
        document.getElementById("usernameErr").innerHTML = "Username field is empty JS";
    }
    if(password === "")
    {
        valid = false;
        document.getElementById("passwordErr").innerHTML = "Password field is empty JS";
    }

    return valid;
}