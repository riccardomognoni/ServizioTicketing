<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] !== true) {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION["role"] !== "admin") {
    header("Location: ../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>
    <script src="../../Js/jquery-3.7.1.min.js"></script>
    <script src="../../Js/request.js" defer></script>
    <script src="../../Js/register.js" defer></script>
    <script src="../../Js/Secure/crypto.js" defer></script>
    <link rel="stylesheet" href="../../Cdn/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../Css/home.css">
</head>

<body>

    <div class="container">

        <div class='form border border-black'>
            <div class="row justify-content-between">
                <div class="col col-4">
                    <button class="btn btn-primary" id="btnCheckTickets"
                        onclick="window.location.href='./logTickets.php'">Controlla stato tickets</button>
                </div>
                <div class="col col-4">
                    <button class="btn btn-primary" onclick="window.location.href='./addDipendente.php'">Aggiungi
                        Dipendente</button>
                </div>
                <div class="col col-4 text-right">
                    <button class="btn btn-danger" onclick="window.location.href='../logout.php'">Logout</button>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
