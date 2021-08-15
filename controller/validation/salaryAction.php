<?php 
    include "../model/DBquery.php";
    $category =  $amount = $accountNumber = "";
    $categoryErr = $accountNumberErr = $amountErr = $errMsg = "";
    $msg = "";
    $hasErr = false;

    $doctorId = $_SESSION["doctor_id"];
    $data = getSalary($doctorId);
    $salary = $data[0]["doctor_salary"];

    $phonePattern = "/^0{1}[0-9]{10}|^(\+880){1}[0-9]{10}/";

    if($_SERVER["REQUEST_METHOD"] !== "POST")
    {
       
    }

    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        if($_POST["category"] === "select")
        {
            $categoryErr = "Category field is empty";
            $errMsg = "Money withdraw failed";
            $hasErr = true;
        }
        if(empty($_POST["accountNumber"]) || !(preg_match($phonePattern, $_POST["accountNumber"])))
        {
            $accountNumberErr = "Invalid account number";
            $errMsg = "Money withdraw failed";
            $hasErr = true;
        }

        if(empty($_POST["amount"]) || $_POST["amount"] < 1)
        {
            $amountErr = "Invalid amount";
            $errMsg = "Money withdraw failed";
            $hasErr = true;
        }
        else{
            if($_POST["amount"] > $salary)
            {
                $amountErr = "Amount exceed the current salary balance";
                $errMsg = "Money withdraw failed";
                $hasErr = true;
            }
        }

        if(!$hasErr)
        {
            $category = $_POST["category"];
            $accountNumber = $_POST["accountNumber"];
            $amount = $_POST["amount"];
            $doctorId = $_SESSION["doctor_id"];
            $salary = $salary - $amount;
            updateSalary($doctorId, $salary);
            addSalaryHistory($category, $amount, $doctorId, $accountNumber);
            $msg = "Money withdrawn successful";
        }
    }
?>