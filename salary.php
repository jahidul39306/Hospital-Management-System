<?php
    include "header.php";
    include "navigation.php";
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $category =  $amount = $accountNumber = "";
    $categoryErr = $accountNumberErr = $amountErr = $errMsg = "";
    $msg = "";
    $hasErr = false;
    $salary = 20000;
    $phonePattern = "/^0{1}[0-9]{10}|^(\+880){1}[0-9]{10}/";

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
            $salary = $salary - $amount;
            $msg = "Money withdrawn successful";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary</title>
</head>
<body>
    <h1>Withdraw salary</h1>
    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
        <label for = "salary">Salary: </label>
        <input type = "number" id = "salary" name = "salary" readonly value = "<?php echo $salary ?? '';?>">
        <br><br>
        <label for = "category">Category: </label>
        <select id = "category" name = "category">
            <option value = "select" <?php if(isset($_POST["category"]) && $_POST["category"] == "select") {echo "selected";}?>>--Select--</option>
            <option value = "mobile_banking" <?php if(isset($_POST["category"]) && $_POST["category"] == "mobile_banking") {echo "selected";}?>>Mobile Banking</option>
            <option value = "internet_banking" <?php if(isset($_POST["category"]) && $_POST["category"] == "internet_banking") {echo "selected";}?>>Internet Banking</option>
        </select>
        <span class = "error" style="color:red">*<?php echo $categoryErr; ?></span>
        &nbsp;&nbsp;&nbsp;
        <label for = "accountNumber">Account number: </label>
        <input type = "tel" id = "accountNumber" name = "accountNumber" value = "<?php echo $_POST["accountNumber"] ?? '';?>">
        <span class = "error" style="color:red">*<?php echo $accountNumberErr; ?></span>
        &nbsp;&nbsp;&nbsp;
        <label for = "amount">Amount: </label>
        <input type = "number" id = "amount" name = "amount" value = "<?php echo $_POST["amount"] ?? '';?>">
        <span class = "error" style="color:red">*<?php echo $amountErr; ?></span>
        <br><br>
        <input type="submit" value = "Withdraw">
        <br>
    </form>
    <p style="color:red"><?php echo $errMsg?></p>
    <p style="color:green"><?php echo $msg?></p>
    <br><br>
    <p>Transaction history:</p>
    <table border="1">
    <th>&nbsp;Category&nbsp;</th>
    <th>&nbsp;Account number&nbsp;</th>
    <th>&nbsp;Amount&nbsp;</th>
    <th>&nbsp;Time&nbsp;</th>
    </table>
</body>
</html>
<?php
    include "footer.php";
?>

