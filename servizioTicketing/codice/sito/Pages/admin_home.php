<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] !== true) {
    header("Location: ./login.php");
    exit();
}

if ($_SESSION["role"] !== "admin") {
    header("Location: ./login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>
    <script src="../Js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="../Cdn/bootstrap/bootstrap.min.css">
</head>

<body>

    <div class="container">

        <form action="" method="POST">

        </form>

    </div>

</body>

</html>