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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").submit(function(e) {
                e.preventDefault();

                let username = $("#username").val();
                let password = $("#password").val();

                $.ajax({
                    url: "../Ajax/checkLogin.php",
                    type: "POST",
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(response) {
                        // response = JSON.parse(response);
                        if (response.status == "success") {
                            window.location.href = "./areaPersonale.php";
                        } else {
                            alert("Invalid credentials");
                        }
                    },
                    error: function(response) {
                        console.log(response);
                        alert("Error");
                    }
                });

                return false;
            });
        });
    </script>
</head>

<body>

    <form action="./login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="codice_identificativo">Codice identificativo:</label>
        <input type="password" id="password" name="password" style="display:block;" required>
        <br>
        Chi sei?<br>
        <input type="radio" id="customers" name="remember">Cliente<br>
        <input type="radio" id="employees" name="remember">Impiegato<br>
        <input type="submit" value="Login">
    </form>

</body>

</html>