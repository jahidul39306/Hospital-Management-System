function isValid()
{
    var valid = true;
    var oldPassword = document.forms["changePasswordForm"]["oldPassword"].value;
    var newPassword = document.forms["changePasswordForm"]["newPassword"].value;
    var confirmPassword = document.forms["changePasswordForm"]["confirmNewPassword"].value;

    document.getElementById("oldPasswordErr").innerHTML = "";
    document.getElementById("newPasswordErr").innerHTML = "";
    document.getElementById("confirmNewPasswordErr").innerHTML = "";

    if(oldPassword === "")
    {
        valid = false;
        document.getElementById("oldPasswordErr").innerHTML = "Old password field is empty JS";
    }
    if(newPassword === "")
    {
        valid = false;
        document.getElementById("newPasswordErr").innerHTML = "New password field is empty JS";
    }
    if(confirmPassword != newPassword)
    {
        valid = false;
        document.getElementById("confirmNewPasswordErr").innerHTML = "Password does not match";
    }
    return valid;
}