$(document).ready(function () {
    $("form").submit(async function (e) {
        e.preventDefault();

        let title = $("#title").val();
        let description = $("#description").val();
        let email = $("#email").val();

        $.ajax({
            type: "POST",
            url: "../../Ajax/addTicket.php",
            data: {
                title: title,
                description: description,
                email: email
            },
            success: function (response) {
                response = JSON.parse(response);
                if (response.status == "success") {
                    alert("Ticket creato correttamente");
                    window.location.href = "./areaPersonale.php";
                } else {
                    alert("Errore nella creazione del ticket");
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
