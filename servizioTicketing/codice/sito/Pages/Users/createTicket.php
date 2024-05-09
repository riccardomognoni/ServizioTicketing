<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] !== true) {
    header("Location: ../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea un nuovo Ticket</title>
    <script src="../../Js/jquery-3.7.1.min.js"></script>
    <script src="../../Js/createTicket.js"></script>
    <script src="../../Cdn/bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../Cdn/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../Css/find.css">
</head>

<body style="padding-top: 10%">
    <div class="container">
        <div class='divFind border border-black form'>\
            <div class="row">
                <div class="col col-6">
                    <label for="title" class="form-label">Titolo:</label>
                    <input type="text" class="form-control border-black input" id="title">
                </div>
            </div><br>

            <div class="row">
                <div class="col col-6">
                    <label for="description" class="form-label">Descrizione problema:</label>
                    <input type="text" class="form-control border-black input" id="description">
                </div>
            </div><br>
        </div>
    </div>

</body>

</html>