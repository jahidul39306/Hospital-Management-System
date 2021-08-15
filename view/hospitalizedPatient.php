<?php
    include "../controller/include/header.php";
    include "../controller/include/navigation.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospitalized patient</title>
    <style>
        table {
        border-collapse: collapse;
}
th {
  height: 70px;
}

</style>
</head>
<body>
    <h1>Hospitalized patient</h1>
    <table border="1">
    <th>Patient ID</th>
    <th>Patient name</th>
    <th>Patient disease</th>
    <th>Admitted date</th>
    <th>Condition</th>
    </table>
</body>
</html>
<?php
    include "../controller/include/footer.php";
?>