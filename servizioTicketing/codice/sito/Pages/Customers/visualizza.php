<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] !== true) {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION["role"] === "admin") {
    header("Location: ../Admin/admin_home.php");
    exit();
}

if ($_SESSION["role"] === "employee") {
    header("Location: ../Employees/areaEmployee.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>visualizza Ticket</title>
    <script src="../../Js/jquery-3.7.1.min.js"></script>
    <script src="../../Cdn/bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../Cdn/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../Css/find.css">
</head>
<body>
    <div>
        
    </div>
</body>
</html>