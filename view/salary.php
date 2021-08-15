<?php
    include "../controller/include/header.php";
    include "../controller/include/navigation.php";
    include "../controller/validation/salaryAction.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "css/salary.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary</title>
    <script src="js/salary.js"></script>
</head>
<body>
    <h1 id = "salary-logo">Withdraw salary</h1>
    <br>
    <div id = "salary-flex">
        <div id = "salary-tool">
            <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" name = "salaryForm" onsubmit = "return isValid();">
                <label for = "salary">Salary: </label>
                <br>
                <input type = "number" id = "salary" name = "salary" readonly value = "<?php echo $salary ?? '';?>">
                <br><br>
                <label for = "category">Category: </label>
                <br>
                <select id = "category" name = "category">
                    <option value = "select" <?php //if(isset($_POST["category"]) && $_POST["category"] == "select") {echo "selected";}?>>--Select--</option>
                    <option value = "mobile_banking" <?php //if(isset($_POST["category"]) && $_POST["category"] == "mobile_banking") {echo "selected";}?>>Mobile Banking</option>
                    <option value = "internet_banking" <?php //if(isset($_POST["category"]) && $_POST["category"] == "internet_banking") {echo "selected";}?>>Internet Banking</option>
                </select>
                <span id = "categoryErr" class = "error">*<?php echo $categoryErr; ?></span>
                <br><br>
                <label for = "accountNumber">Account number: </label>
                <br>
                <input type = "tel" id = "accountNumber" name = "accountNumber" value = "<?php //echo $_POST["accountNumber"] ?? '';?>">
                <span id = "accountNumberErr" class = "error">*<?php echo $accountNumberErr; ?></span>
                <br><br>
                <label for = "amount">Amount: </label>
                <br>
                <input type = "number" id = "amount" name = "amount" value = "<?php //echo $_POST["amount"] ?? '';?>">
                <span id = "amountErr" class = "error">*<?php echo $amountErr; ?></span>
                <br><br>
                <div id = "withdrawButton">
                    <input type="submit" value = "Withdraw">
                </div>
                
            </form>
        </div>
    </div>
    <div id = "showMsg">
        <p style="color:red"><?php echo $errMsg?></p>
        <p style="color:green"><?php echo $msg?></p>
        <br><br>
    </div>
    <div id = "salaryHistoryTable">
        <script>showSalaryHistory();</script>
    </div>
</body>
</html>
<?php
    include "../controller/include/footer.php";
?>

