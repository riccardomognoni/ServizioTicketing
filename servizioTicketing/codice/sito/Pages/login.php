<?php

if (!isset($_SESSION)) {
    session_start();
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
    <script>
        $(document).ready(function () {
            $("form").submit(function (e) {
                e.preventDefault();

                let username = $("#inputUtente").val();
                let password = $("#inputPassword").val();

                $.ajax({
                    url: "../Ajax/checkLogin.php",
                    type: "POST",
                    data: {
                        username: username,
                        password: password
                    },
                    success: function (response) {
                        response = JSON.parse(response);
                        if (response.status == "success") {
                            window.location.href = "./areaPersonale.php";
                        } else {
                            alert("Invalid credentials");
                        }
                    },
                    error: function (response) {
                        console.log(response);
                        alert("Error");
                    }
                });

                return false;
            });
        });
    </script>
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
                <div class="mb-3" style="color:white">
                    <button type="submit" class="btn btn-outline-light">Login</button>
                </div>
            </form>
        </div>

    </div>



</body>

</html>