$(document).ready(function () {
    $("form").submit(function (e) {
        e.preventDefault();

        let username = $("#inputUtente").val();
        let password = $("#inputPassword").val();

        $.ajax({
            type: "POST",
            url: "../Ajax/checkLogin.php",
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