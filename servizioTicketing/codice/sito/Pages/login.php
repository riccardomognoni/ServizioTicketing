<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] === true) {
    if ($_SESSION["role"] === "customer") {
        header("Location: ./areaPersonale.php");
    } else if ($_SESSION["role"] === "employee") {
        header("Location: ./admin_home.php");
    } else if ($_SESSION["role"] === "admin") {
        header("Location: ./admin_home.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="../Js/jquery-3.7.1.min.js"></script>
    <script src="../Cdn/bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../Cdn/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/home.css">
    <!--<link rel="stylesheet" href="../Cdn/fontawesome/all.min.css">-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <script src="../Js/login.js" defer></script>
</head>

<body style="padding-top: 10%;">

    <div class="container">
        <div class='form border border-black'>

            <form action="./login.php" method="post">

                <div class="mb-3">
                    <i class="fa-solid fa-user" style="color: white;"></i>
                    <label for="inputUtente" class="form-label">Utente</label>
                    <input type="text" name="username" class="form-control border-black input" id="inputUtente" required>
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-key" style="color: white;"></i>
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control border-black input" id="inputPassword" required>
                </div>
                <?php

                if (isset($_SESSION['mail-sent']) && $_SESSION['mail-sent'] == true) {
                    echo "<div id='error' style='color:white'>Il numero di tessera è stato inviato alla tua email</div>";
                }

                ?>
                <div class="mb-3" style="color:white">
                    <button type="submit" class="btn btn-outline-light">Login</button>
                </div>
            </form>

        </div>

    </div>



</body>

</html>