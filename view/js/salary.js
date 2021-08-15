function isValid()
{
    var valid = true;
    var salary = document.forms["salaryForm"]["salary"].value;
    var category = document.forms["salaryForm"]["category"].value;
    var accountNumber = document.forms["salaryForm"]["accountNumber"].value;
    var amount = document.forms["salaryForm"]["amount"].value;

    document.getElementById("categoryErr").innerHTML = "";
    document.getElementById("accountNumberErr").innerHTML = "";
    document.getElementById("amountErr").innerHTML = "";

    var phonePattern = /(^0{1}[0-9]{10}|^(\+880){1}[0-9]{10})/;

    if(category === "select")
    {
        valid = false;
        document.getElementById("categoryErr").innerHTML = "Choose a category JS";
    }

    if(accountNumber === "")
    {
        valid = false;
        document.getElementById('accountNumberErr').innerHTML = "Enter a account number JS";
    }

    if(valid && !(phonePattern.test(accountNumber)))
    {
        valid = false;
        document.getElementById('accountNumberErr').innerHTML = "Account number not valid JS";
    }

    if(amount === "")
    {
        valid = false;
        document.getElementById("amountErr").innerHTML = "Amount field is empty JS";
    }

    if(valid && (amount < 1))
    {
        valid = false;
        document.getElementById("amountErr").innerHTML = "Invalid amount JS";
    }

    return valid;
}

function showSalaryHistory()
{
    var XML = new XMLHttpRequest();
        XML.onload = function()
        {
            if(XML.status === 200)
            {
                document.getElementById("salaryHistoryTable").innerHTML = XML.responseText;
            }
        }
        XML.open("POST", "../controller/showSalaryHistory.php", true);
        XML.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        XML.send();
}