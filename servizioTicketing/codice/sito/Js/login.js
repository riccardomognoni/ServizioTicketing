$(document).ready(function () {
    $("form").submit(async function (e) {
        e.preventDefault();

        let username = $("#username").val();
        let password = calc($("#password").val());

        //console.log(password);

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
                    window.location.href = "./Employees/areaEmployee.php";
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
