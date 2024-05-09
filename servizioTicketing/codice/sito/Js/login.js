$(document).ready(function () {
    $("form").submit(async function (e) {
        e.preventDefault();

        let username = $("#username").val();
        let password = calc($("#password").val());

        console.log(password);

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

function replaceAll(find, replace, str) {
    return str.replace(new RegExp(find, 'g'), replace);
}
function calc(value) {
    let password = value;
    let hashValue = "";
    if (password.length == 0) {
        return "";
    }

    if (password.search("\r") > 0) password = replaceAll("\r", "", password);
    let strHash = hex_sha256(password);
    strHash = strHash.toLowerCase();

    hashValue = strHash;

    return hashValue;
}