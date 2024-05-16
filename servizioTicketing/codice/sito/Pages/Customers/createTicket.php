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
    <title>Crea un nuovo Ticket</title>
    <script src="../../Js/jquery-3.7.1.min.js"></script>
    <script src="../../Js/createTicket.js"></script>
    <script src="../../Js/template.js"></script>
    <script src="../../Cdn/bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../Cdn/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../Css/find.css">
</head>

<body>
    <nav>
        <script>
            generateNavBar('customer');
        </script>
    </nav>
    <div class="container" style="padding-top: 5%">
        <div class='divFind border border-black form'>
            <form>
                <div class="mb-3">
                    <i class="fa-solid fa-user" style="color: white;"></i>
                    <label for="title" class="form-label">Titolo:</label>
                    <input type="text" class="form-control border-black input" id="title" required />
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-user" style="color: white;"></i>
                    <label for="description" class="form-label">Descrizione problema:</label>
                    <textarea class="form-control border-black input" id="description" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-user" style="color: white;"></i>
                        <label for="email" class="form-label">Email utente:</label>
                        <input type="email" class="form-control border-black input" id="email" required/>
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-user" style="color: white;"></i>
                        <label for="allegato" class="form-label">Eventuali allegati:</label>
                        <input type="file" class="form-control border-black input" id="allegato" />
                </div>

                <div class="row">
                    <div class="col col-4">
                        <input type="submit" class="btn btn-primary" value="Crea ticket">
                    </div><br>
                </div>
            </form>
        </div>
    </div>

</body>

</html>