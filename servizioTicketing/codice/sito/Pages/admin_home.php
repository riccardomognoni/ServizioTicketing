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
    <link rel="stylesheet" href="../Css/home.css">
</head>

<body>

    <div class="container">

        <div class='form border border-black'>

            <form action="./register.php" method="POST">
                <p style="color:white">Registra dipendente</p>
                <div class="mb-3">
                    <label for="inputNome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control border-black input" id="nome" required>
                </div>
                <div class="mb-3">
                    <label for="inputCognome" class="form-label">Cognome</label>
                    <input type="text" name="cognome" class="form-control border-black input" id="cognome" required>
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control border-black input" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="inputUtente" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control border-black input" id="username" required>
                </div>

                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control border-black input" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="inputPassword2" class="form-label">Conferma Password</label>
                    <input type="password" name="password2" class="form-control border-black input" id="confermaPassword" required>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-outline-light" value="Registrati">
                </div>
            </form>
            
            <div id="error" class="mt-3"></div>

        </div>

    </div>

</body>

</html>